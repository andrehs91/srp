<h1 class="text-center mb-3">Editar Tarefa</h1>
<section class="mb-3">
    <form method="POST" class="p-3 border rounded-3 bg-light">
        <input type="hidden" name="task-id" value="<?= $task->getId(); ?>">
        <div class="row g-3 mb-3">
            <div class="col-12 col-lg-6">
                <div class="input-group">
                    <label class="input-group-text" for="project-id">Vinculada ao Projeto</label>
                    <select class="form-select" name="project-id" id="project-id" required>
                        <option selected></option>
                        <?php foreach ($projects as $projectId => $projectName): ?>
                        <option value="<?= $projectId; ?>"<?= $projectId == $task->getProjectId() ? " selected" : "" ?>><?= $projectName; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="input-group">
                    <label class="input-group-text" for="task-situation">Situação</label>
                    <select class="form-select" name="task-situation" id="task-situation" required>
                        <option selected></option>
                        <option value="Cancelada"<?= $task->getSituation() == "Cancelada" ? " selected" : "" ?>>Cancelada</option>
                        <option value="Concluída"<?= $task->getSituation() == "Concluída" ? " selected" : "" ?>>Concluída</option>
                        <option value="Em análise"<?= $task->getSituation() == "Em análise" ? " selected" : "" ?>>Em análise</option>
                        <option value="Em andamento"<?= $task->getSituation() == "Em andamento" ? " selected" : "" ?>>Em andamento</option>
                        <option value="Pausada"<?= $task->getSituation() == "Pausada" ? " selected" : "" ?>>Pausada</option>
                        <option value="Programada"<?= $task->getSituation() == "Programada" ? " selected" : "" ?>>Programada</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-12 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-date">Data</label>
                    <input type="date" class="form-control" name="task-date" id="task-date" value=<?= $task->getDate(); ?> required>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-start-time">Hora do Início</label>
                    <input type="time" class="form-control" name="task-start-time" id="task-start-time" value=<?= $task->getStartTime(); ?> required>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-end-time">Hora do Fim</label>
                    <input type="time" class="form-control" name="task-end-time" id="task-end-time" value=<?= $task->getEndTime(); ?> required>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="task-description">Descrição</label>
            <input type="text" class="form-control" name="task-description" id="task-description" value="<?= $task->getDescription(); ?>" required>
        </div>
        <div class="input-group">
            <label class="input-group-text" for="task-notes">Observações</label>
            <input type="text" class="form-control" name="task-notes" id="task-notes" value="<?= $task->getNotes(); ?>" placeholder="Opcional">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-large btn-primary mx-2 mt-3 px-0">Confirmar Edição</button><a class="btn btn-large btn-secondary mx-2 mt-3" href="/tarefas" role="button">Cancelar</a>
        </div>
    </form>
</section>