<h1 class="text-center mb-3">Editar Projeto</h1>
<section class="mb-3">
    <form method="POST" class="p-3 border rounded-3 bg-light">
        <input type="hidden" name="project-id" value="<?= $project->getId(); ?>">
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-name">Nome do Projeto</label>
            <input type="text" class="form-control" name="project-name" id="project-name" value="<?= $project->getName(); ?>" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-description">Descrição do Projeto</label>
            <input type="text" class="form-control" name="project-description" id="project-description" value="<?= $project->getDescription(); ?>" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="project-situation">Situação</label>
            <select class="form-select" name="project-situation" id="project-situation" required>
                <option value="Cancelado"<?= $project->getSituation() == "Cancelado" ? " selected" : "" ?>>Cancelado</option>
                <option value="Concluído"<?= $project->getSituation() == "Concluído" ? " selected" : "" ?>>Concluído</option>
                <option value="Em análise"<?= $project->getSituation() == "Em análise" ? " selected" : "" ?>>Em análise</option>
                <option value="Em andamento"<?= $project->getSituation() == "Em andamento" ? " selected" : "" ?>>Em andamento</option>
                <option value="Pausado"<?= $project->getSituation() == "Pausado" ? " selected" : "" ?>>Pausado</option>
                <option value="Programado"<?= $project->getSituation() == "Programado" ? " selected" : "" ?>>Programado</option>
            </select>
        </div>
        <div class="input-group">
            <label class="input-group-text" for="project-notes">Observações</label>
            <input type="text" class="form-control" name="project-notes" id="project-notes" value="<?= $project->getNotes(); ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-large btn-primary mx-2 mt-3 px-0">Confirmar Edição</button><a class="btn btn-large btn-secondary mx-2 mt-3" href="/projetos" role="button">Cancelar</a>
        </div>
    </form>
</section>