<h1 class="text-center mb-3">Tarefas</h1>
<section class="mb-3">
    <h2>Registrar Tarefa</h2>
    <?php if (!$projects): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Atenção:</strong> Antes de registrar uma tarefa é necessário criar um projeto para sua vinculação. <a class="link-danger" href="/projetos">Clique aqui</a> para criar um projeto.
    </div>
    <?php endif; ?>
    <form method="POST" class="p-3 border rounded-3 bg-light">
        <div class="row g-3 mb-3">
            <div class="col-12 col-lg-6">
                <div class="input-group">
                    <label class="input-group-text" for="project-id">Vinculada ao Projeto</label>
                    <select class="form-select" name="project-id" id="project-id" required>
                        <option selected></option>
                        <?php foreach ($projects as $projectId => $projectName): ?>
                        <option value="<?= $projectId; ?>"><?= $projectName; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="input-group">
                    <label class="input-group-text" for="task-situation">Situação</label>
                    <select class="form-select" name="task-situation" id="task-situation" required>
                        <option selected></option>
                        <option value="Cancelada">Cancelada</option>
                        <option value="Concluída">Concluída</option>
                        <option value="Em análise">Em análise</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Pausada">Pausada</option>
                        <option value="Programada">Programada</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-12 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-date">Data</label>
                    <input type="date" class="form-control" name="task-date" id="task-date" value=<?= date('Y-m-d'); ?> required>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-start-time">Hora do Início</label>
                    <input type="time" class="form-control" name="task-start-time" id="task-start-time" value=<?= date('H:i'); ?> required>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-end-time">Hora do Fim</label>
                    <input type="time" class="form-control" name="task-end-time" id="task-end-time" value=<?= date('H:i'); ?> required>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="task-description">Descrição</label>
            <input type="text" class="form-control" name="task-description" id="task-description" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="task-notes">Observações</label>
            <input type="text" class="form-control" name="task-notes" id="task-notes" placeholder="Opcional">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-large btn-primary"<?= $projects ? "" : " disabled" ; ?>>Registrar</button>
        </div>
    </form>
</section>
<section class="mb-3">
    <h2>Tarefas Registradas</h2>
    <form method="GET" class="mt-3 text-start text-sm-end">
        <div class="collapse <?= $_GET['project'] || $_GET['situation'] || $_GET['description'] || $_GET['notes'] ? "show" : "" ; ?>" id="inputs">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row mb-sm-3">
                        <label class="col-xl-2 col-md-3 col-sm-4 pe-sm-1 pt-0 pt-sm-2 col-form-label" for="project">Projeto:</label>
                        <div class="col-xl-10 col-md-9 col-sm-8 ps-sm-1">
                            <select class="form-select" name="project" id="project">
                                <option <?= $_GET['project'] ? "" : "selected" ; ?>></option>
                                <?php foreach ($projects as $projectId => $projectName): ?>
                                <option value="<?= $projectId; ?>" <?= isset($_GET['project']) && $_GET['project'] == $projectId ? "selected" : "" ; ?>><?= $projectName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row mb-sm-3">
                        <label class="col-xl-2 col-md-3 col-sm-4 pe-sm-1 col-form-label" for="situation">Situação:</label>
                        <div class="col-xl-10 col-md-9 col-sm-8 ps-sm-1">
                            <select class="form-select " name="situation" id="situation">
                                <option <?= $_GET['situation'] ? "" : "selected" ; ?>></option>
                                <option value="Cancelada" <?= isset($_GET['situation']) && $_GET['situation'] == "Cancelada" ? "selected" : "" ; ?>>Cancelada</option>
                                <option value="Concluída" <?= isset($_GET['situation']) && $_GET['situation'] == "Concluída" ? "selected" : "" ; ?>>Concluída</option>
                                <option value="Em análise" <?= isset($_GET['situation']) && $_GET['situation'] == "Em análise" ? "selected" : "" ; ?>>Em análise</option>
                                <option value="Em andamento" <?= isset($_GET['situation']) && $_GET['situation'] == "Em andamento" ? "selected" : "" ; ?>>Em andamento</option>
                                <option value="Pausada" <?= isset($_GET['situation']) && $_GET['situation'] == "Pausada" ? "selected" : "" ; ?>>Pausada</option>
                                <option value="Programada" <?= isset($_GET['situation']) && $_GET['situation'] == "Programada" ? "selected" : "" ; ?>>Programada</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3 mb-sm-0">
                <div class="col-12 col-lg-6">
                    <div class="row mb-sm-3">
                        <label class="col-xl-2 col-md-3 col-sm-4 pe-sm-1 col-form-label" for="description">Descrição:</label>
                        <div class="col-xl-10 col-md-9 col-sm-8 ps-sm-1">
                            <input type="text" class="form-control" name="description" id="description"<?= isset($_GET['description']) ? "value=\"{$_GET['description']}\"" : "" ; ?>>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row mb-sm-3">
                        <label class="col-xl-2 col-md-3 col-sm-4 pe-sm-1 col-form-label" for="notes">Observações:</label>
                        <div class="col-xl-10 col-md-9 col-sm-8 ps-sm-1">
                            <input type="text" class="form-control" name="notes" id="notes"<?= isset($_GET['notes']) ? "value=\"{$_GET['notes']}\"" : "" ; ?>>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mb-2">
            <a class="filter me-3 <?= $_GET['project'] || $_GET['situation'] || $_GET['description'] || $_GET['notes'] ? "": "collapsed" ; ?>" data-bs-toggle="collapse" href="#inputs" role="button" aria-expanded="false" aria-controls="inputs">Filtros disponíveis</a>
            <hr class="d-inline-flex w-100">
            <div class="d-inline-flex"><button type="submit" class="btn btn-medium btn-outline-primary ms-3">Filtrar</button><a class="btn btn-medium btn-outline-secondary ms-3" href="/tarefas" role="button">Limpar</a></div>
        </div>
    </form>
    <table class="d-none d-md-table table table-striped" id="table">
        <thead>
            <tr>
                <th scope="col" onclick="sortTable(0)" style="cursor:pointer">Projeto&uarr;&darr;</th>
                <th scope="col" onclick="sortTable(1)" style="cursor:pointer">Descrição&uarr;&darr;</th>
                <th scope="col" onclick="sortTable(2)" style="cursor:pointer">Situação&uarr;&darr;</th>
                <th scope="col" onclick="sortTable(3)" style="cursor:pointer">Observações&uarr;&darr;</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td class="align-middle"><?= $projects[$task->getProjectId()]; ?></td>
                <td class="align-middle"><?= $task->getDescription(); ?></td>
                <td class="align-middle"><?= $task->getSituation(); ?></td>
                <td class="align-middle"><?= $task->getNotes(); ?></td>
                <td class="align-middle"><?= $task->getDate("d/m/Y"); ?></td>
                <td class="actions">
                    <a class="actions-btn btn btn-secondary" href="/editar-tarefa?id=<?= $task->getId(); ?>" role="button">Editar</a><a class="actions-btn btn btn-danger" href="/excluir-tarefa?id=<?= $task->getId(); ?>" role="button">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-md-none row row-cols-1 row-cols-sm-2 px-1">
        <?php foreach ($tasks as $task): ?>
            <div class="col p-2">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title"><?= $projects[$task->getProjectId()]; ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text py-0">
                            <strong>Descrição: </strong><?= $task->getDescription(); ?>
                            <strong>Situação: </strong><?= $task->getSituation(); ?><br>
                            <strong>Observações: </strong><?= $task->getNotes(); ?><br>
                            <strong>Data: </strong><?= $task->getDate("d/m/Y"); ?><br>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                            <a class="actions-btn btn btn-secondary" href="/editar-tarefa?id=<?= $task->getId(); ?>" role="button">Editar</a><a class="actions-btn btn btn-danger" href="/excluir-tarefa?id=<?= $task->getId(); ?>" role="button">Excluir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script src="js/sort-table.js"></script>