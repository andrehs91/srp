<h1 class="text-center mb-3">Projetos</h1>
<section class="mb-3">
    <h2>Criar Projeto</h2>
    <form method="POST" class="p-3 border rounded-3 bg-light">
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-name">Nome do Projeto</label>
            <input type="text" class="form-control" name="project-name" id="project-name" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-description">Descrição do Projeto</label>
            <input type="text" class="form-control" name="project-description" id="project-description" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-situation">Situação</label>
            <select class="form-select" name="project-situation" id="project-situation" required>
                <option selected></option>
                <option value="Cancelado">Cancelado</option>
                <option value="Concluído">Concluído</option>
                <option value="Em análise">Em análise</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Pausado">Pausado</option>
                <option value="Programado">Programado</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-notes">Observações</label>
            <input type="text" class="form-control" name="project-notes" id="project-notes" placeholder="Opcional">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-large btn-primary">Criar</button>
        </div>
    </form>
</section>
<?php if (isset($projects)): ?>
<section class="mb-3">
    <h2>Lista de Projetos</h2>
    <form method="GET" class="mt-3 text-start text-sm-end">
        <div class="collapse <?= $_GET['situation'] || $_GET['description'] || $_GET['notes'] ? "show" : "" ; ?>" id="inputs">
            <div class="row mb-sm-3">
                <label class="col-xl-2 col-md-3 col-sm-4 pe-sm-1 pt-0 pt-sm-2 col-form-label" for="situation">Situação:</label>
                <div class="col-xl-10 col-md-9 col-sm-8 ps-sm-1">
                    <select class="form-select" name="situation" id="situation">
                        <option <?= $_GET['situation'] ? "" : "selected" ; ?>></option>
                        <option value="Cancelado" <?= isset($_GET['situation']) && $_GET['situation'] == "Cancelado" ? "selected" : "" ; ?>>Cancelado</option>
                        <option value="Concluído" <?= isset($_GET['situation']) && $_GET['situation'] == "Concluído" ? "selected" : "" ; ?>>Concluído</option>
                        <option value="Em análise" <?= isset($_GET['situation']) && $_GET['situation'] == "Em análise" ? "selected" : "" ; ?>>Em análise</option>
                        <option value="Em andamento" <?= isset($_GET['situation']) && $_GET['situation'] == "Em andamento" ? "selected" : "" ; ?>>Em andamento</option>
                        <option value="Pausado" <?= isset($_GET['situation']) && $_GET['situation'] == "Pausado" ? "selected" : "" ; ?>>Pausado</option>
                        <option value="Programado" <?= isset($_GET['situation']) && $_GET['situation'] == "Programado" ? "selected" : "" ; ?>>Programado</option>
                    </select>
                </div>
            </div>
            <div class="row mb-sm-3">
                <label class="col-xl-2 col-md-3 col-sm-4 pe-sm-1 col-form-label" for="description">Descrição:</label>
                <div class="col-xl-10 col-md-9 col-sm-8 ps-sm-1">
                    <input type="text" class="form-control" name="description" id="description"<?= isset($_GET['description']) ? "value=\"{$_GET['description']}\"" : "" ; ?>>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-xl-2 col-md-3 col-sm-4 pe-sm-1 col-form-label" for="notes">Observações:</label>
                <div class="col-xl-10 col-md-9 col-sm-8 ps-sm-1">
                    <input type="text" class="form-control" name="notes" id="notes"<?= isset($_GET['notes']) ? "value=\"{$_GET['notes']}\"" : "" ; ?>>
                </div>
            </div>
        </div>
        <div class="d-flex mb-2">
            <a class="filter me-3 <?= $_GET['situation'] || $_GET['description'] || $_GET['notes'] ? "": "collapsed" ; ?>" data-bs-toggle="collapse" href="#inputs" role="button" aria-expanded="false" aria-controls="inputs">Filtros disponíveis</a>
            <hr class="d-inline-flex w-100">
            <div class="d-inline-flex"><button type="submit" class="btn btn-medium btn-outline-primary ms-3">Filtrar</button><a class="btn btn-medium btn-outline-secondary ms-3" href="/projetos" role="button">Limpar</a></div>
        </div>
    </form>
    <table class="d-none d-md-table table table-striped" id="table">
        <thead>
            <tr>
                <th scope="col" onclick="sortTable(0)" style="cursor:pointer">Nome&uarr;&darr;</th>
                <th scope="col" onclick="sortTable(1)" style="cursor:pointer">Descrição&uarr;&darr;</th>
                <th scope="col" onclick="sortTable(2)" style="cursor:pointer">Situação&uarr;&darr;</th>
                <th scope="col" onclick="sortTable(3)" style="cursor:pointer">Observações&uarr;&darr;</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td class="align-middle"><?= $project->getName(); ?></th>
                <td class="align-middle"><?= $project->getDescription(); ?></td>
                <td class="align-middle"><?= $project->getSituation(); ?></td>
                <td class="align-middle"><?= $project->getNotes(); ?></td>
                <td class="actions text-center"><a class="actions-btn btn btn-secondary" href="/editar-projeto?id=<?= $project->getId(); ?>" role="button">Editar</a><a class="actions-btn btn btn-danger" href="/excluir-projeto?id=<?= $project->getId(); ?>" role="button">Excluir</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-md-none row row-cols-1 row-cols-sm-2 px-1">
        <?php foreach ($projects as $project): ?>
        <div class="col p-2">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title"><?= $project->getName(); ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text py-0">
                        <strong>Descrição: </strong><?= $project->getDescription(); ?><br>
                        <strong>Situação: </strong><?= $project->getSituation(); ?><br>
                        <strong>Observações: </strong><?= $project->getNotes(); ?>
                    </p>
                </div>
                <div class="card-footer text-center"><a class="actions-btn btn btn-secondary" href="/editar-projeto?id=<?= $project->getId(); ?>" role="button">Editar</a><a class="actions-btn btn btn-danger" href="/excluir-projeto?id=<?= $project->getId(); ?>" role="button">Excluir</a></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<script src="js/sort-table.js"></script>
<?php endif; ?>