<?php

$connection->query('DELETE FROM tasks;');
$connection->query('ALTER TABLE tasks AUTO_INCREMENT = 1;');
$connection->query('DELETE FROM projects;');
$connection->query('ALTER TABLE projects AUTO_INCREMENT = 1;');

if (isset($_GET['popular'])) {
    $connection->exec("
        INSERT INTO `srpdb`.`projects` (`name`, `description`, `situation`, `notes`) VALUES ('SRP', 'Sistema para Registro de Produção	', 'Em andamento', 'Projeto desenvolvido para particição de PSI');
        INSERT INTO `srpdb`.`projects` (`name`, `description`, `situation`, `notes`) VALUES ('Planner', 'Planejador com interface simplificada', 'Em análise', 'Verificando forma de monetização');
        INSERT INTO `srpdb`.`projects` (`name`, `description`, `situation`) VALUES ('To-Do List', 'Lista de tarefas rotineiras', 'Concluído');
        INSERT INTO `srpdb`.`projects` (`name`, `description`, `situation`, `notes`) VALUES ('Desenvolvimento Profissional', 'Desenvolvimento de soft skills', 'Em andamento', 'Foco em comunicação');
        INSERT INTO `srpdb`.`projects` (`name`, `description`, `situation`, `notes`) VALUES ('Horta no Apê', 'Horta comunitária automatizada em condomínios residenciais', 'Cancelado', 'Preço elevado dos microcontroladores');
        INSERT INTO `srpdb`.`projects` (`name`, `description`, `situation`) VALUES ('Feria Web', 'E-commerce para integrar o pequeno produtor aos consumidores finais', 'Programado');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `project_id`) VALUES ('2021-09-20', '17:20', '20:00', 'Concluída', 'Implementação dos relatórios', '1');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `project_id`) VALUES ('2021-09-20', '20:20', '20:30', 'Concluída', 'Teste dos relatórios', '1');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `notes`, `project_id`) VALUES ('2021-09-21', '16:30', '18:00', 'Concluída', 'Alteração do banco de dados para MySQL', 'SQLite continua funcionando', '1');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `notes`, `project_id`) VALUES ('2021-09-19', '18:30', '21:40', 'Cancelada', 'Criação de situações personalizadas', 'Aumento desnecessário de complexidade', '1');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `project_id`) VALUES ('2021-09-22', '21:30', '22:00', 'Em Andamento', 'Testes em ambiente de produção', '1');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `notes`, `project_id`) VALUES ('2021-09-23', '18:00', '18:00', 'Programada', 'Geração dos realtórios em PDF', 'Adequar projeto para utilizar composer', '1');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `notes`, `project_id`) VALUES ('2021-09-23', '20:00', '20:00', 'Programada', 'Conversão do custo para USD e EUR', 'Utilizar API https://dados.gov.br/', '1');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `notes`, `project_id`) VALUES ('2021-08-10', '10:20', '12:00', 'Concluída', 'Definição do escopo', 'Reunião com o cliente disponível no drive', '2');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `project_id`) VALUES ('2021-08-10', '12:00', '12:00', 'Em análise', 'Definição do layout', '2');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `project_id`) VALUES ('2021-08-01', '18:00', '20:00', 'Concluída', '4 módulo do curso de oratória', '4');
        INSERT INTO `srpdb`.`tasks` (`date`, `start_time`, `end_time`, `situation`, `description`, `notes`, `project_id`) VALUES ('2021-10-01', '10:00', '10:00', 'Em análise', 'Visitar produtores para análise de viabilidade', 'Identificando produtores', '6');
    ");
}

header('Location: /');
