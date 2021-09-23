<?php

namespace Controller;

use PDO;

class SQLiteConnection
{
    public static function createConnection(): PDO
    {
        $path = str_replace('Public', '', getcwd());
        $connection = new PDO('sqlite:' . $path . 'db.sqlite');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connection->exec('
            PRAGMA foreign_keys = ON;
            CREATE TABLE IF NOT EXISTS projects (
                id          INTEGER PRIMARY KEY,
                name        TEXT,
                description TEXT,
                situation   TEXT,
                notes       TEXT
            );

            CREATE TABLE IF NOT EXISTS tasks (
                id          INTEGER PRIMARY KEY,
                date        TEXT,
                start_time  TEXT,
                end_time    TEXT,
                situation   TEXT,
                description TEXT,
                notes       TEXT,
                project_id  INTEGER,
                FOREIGN KEY(project_id) REFERENCES projects(id)
            );

            CREATE VIEW IF NOT EXISTS tasks_with_projectname AS
            SELECT tasks.*, projects.name AS project_name
            FROM tasks INNER JOIN projects ON tasks.project_id = projects.id;

            CREATE TRIGGER IF NOT EXISTS insert_projects_tasks
            BEFORE INSERT ON tasks
                FOR EACH ROW BEGIN
                    SELECT CASE
                        WHEN ((SELECT id FROM projects WHERE id = NEW.project_id) IS NULL)
                        THEN RAISE (ABORT, \'INSERT on table "tasks" violates foreign key\')
                    END;
                END;

            CREATE TRIGGER IF NOT EXISTS update_projects_tasks
            BEFORE UPDATE ON tasks
                FOR EACH ROW BEGIN
                    SELECT CASE
                        WHEN ((SELECT id FROM projects WHERE id = NEW.project_id) IS NULL)
                        THEN RAISE(ABORT, \'UPDATE on table "tasks" violates foreign key\')
                    END;
                END;

            CREATE TRIGGER IF NOT EXISTS delete_projects_tasks
            BEFORE DELETE ON projects
                FOR EACH ROW BEGIN
                    DELETE FROM tasks WHERE project_id = OLD.id;
                END;
        ');
        return $connection;
    }
}
