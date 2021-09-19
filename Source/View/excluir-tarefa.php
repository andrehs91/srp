<h1 class="text-center mb-3">Excluir Tarefa</h1>
<section class="mb-3">
    <form method="POST" class="p-3 border rounded-3 bg-light">
        <input type="hidden" name="task-id" value="<?= $task->getId(); ?>">
        <div class="row g-3 mb-3">
            <div class="col-12 col-lg-6">
                <div class="input-group">
                    <label class="input-group-text" for="project-id">Vinculada ao Projeto</label>
                    <input type="text" class="form-control" id="project-id" value="<?= $project->getName(); ?>" disabled>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="input-group">
                    <label class="input-group-text" for="task-situation">Situação</label>
                    <input type="text" class="form-control" id="task-situation" value="<?= $task->getSituation(); ?>" disabled>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-12 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-date">Data</label>
                    <input type="date" class="form-control" id="task-date" value=<?= $task->getDate(); ?> disabled>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-start-time">Hora do Início</label>
                    <input type="time" class="form-control" id="task-start-time" value=<?= $task->getStartTime(); ?> disabled>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="task-end-time">Hora do Fim</label>
                    <input type="time" class="form-control" id="task-end-time" value=<?= $task->getEndTime(); ?> disabled>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="task-description">Descrição</label>
            <input type="text" class="form-control" id="task-description" value="<?= $task->getDescription(); ?>" disabled>
        </div>
        <div class="input-group">
            <label class="input-group-text" for="task-notes">Observações</label>
            <input type="text" class="form-control" id="task-notes" value="<?= $task->getNotes(); ?>" disabled>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-large btn-danger mt-3 mx-2 px-0">Confirmar Exclusão</button><a class="btn btn-large btn-secondary mx-2 mt-3" href="/tarefas" role="button">Cancelar</a>
        </div>
    </form>
</section>