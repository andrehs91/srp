<h1 class="text-center mb-3">Excluir Projeto</h1>
<section class="mb-3">
    <div class="alert alert-danger" role="alert">
        <strong>Atenção:</strong> Ao excluir um projeto, todas as tarefas vinculadas a ele também serão excluídas.
    </div>
    <form method="POST" class="p-3 border rounded-3 bg-light">
        <input type="hidden" name="project-id" value="<?= $project->getId(); ?>">
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-name">Nome do Projeto</label>
            <input type="text" class="form-control" id="project-name" value="<?= $project->getName(); ?>" disabled>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-description">Descrição do Projeto</label>
            <input type="text" class="form-control" id="project-description" value="<?= $project->getDescription(); ?>" disabled>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-situation">Situação</label>
            <input type="text" class="form-control" id="project-situation" value="<?= $project->getSituation(); ?>" disabled>
        </div>
        <div class="input-group">
            <label class="input-group-text" for="project-notes">Observações</label>
            <input type="text" class="form-control" id="project-notes" value="<?= $project->getNotes(); ?>" disabled>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-large btn-danger mt-3 mx-2 px-0">Confirmar Exclusão</button><a class="btn btn-large btn-secondary mx-2 mt-3" href="/projetos" role="button">Cancelar</a>
        </div>
    </form>
</section>