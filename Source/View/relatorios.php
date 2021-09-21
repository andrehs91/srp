<h1 class="text-center mb-3 donotprint">Relatórios</h1>
<section class="mb-3 donotprint">
    <form method="GET" class="mt-3">
        <div class="row g-3 mb-3">
            <div class="col col-12 col-sm-4">
                <p class="mb-0">Escolha um projeto para gerar o relatório.</p>
                <p class="mb-0">Se desejar calcular o custo do projeto, informe o valor da hora trabalhada.</p>
            </div>
            <div class="col col-12 col-sm-8 mt-0 mx-0 px-0 row g-3">
                <div class="col col-12 input-group">
                    <label class="input-group-text text-nowrap" for="project_id">Projeto: </label>
                    <select class="form-select" name="project_id" id="project_id" required>
                        <option selected></option>
                        <?php if ($projects): ?>
                        <?php foreach ($projects as $project): ?>
                        <option value="<?= $project->getId(); ?>"><?= $project->getName(); ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col col-12 input-group">
                    <label class="input-group-text text-nowrap" for="hourly_rate">Hora trabalhada (R$): </label>
                    <input type="text" class="form-control" name="hourly_rate" id="hourly_rate">
                </div>
                <div class="col col-12 text-center">
                    <button type="submit" class="btn btn-primary text-nowrap me-2">Gerar Relatório</button><a class="btn btn-secondary text-nowrap ms-2" href='/relatorios'>Limpar</a>
                </div>
            </div>
        </div>
    </form>
</section>
<?php if (isset($report)): ?>
<section class="mb-3 printarea">
    <h2 class="d-inline-block">Relatório do Projeto</h2>
    <a href="#" role="button" class="text-dark donotprint" onclick="window.print()"><svg class="icon">
        <use xlink:href="img/icons.svg#report-print"></use>
    </svg></a>
    <p class="mb-0"><Strong>Nome do Projeto: </Strong><?= $report->project->getName(); ?></p>
    <p class="mb-0"><Strong>Descrição: </Strong><?= $report->project->getDescription(); ?></p>
    <p class="mb-0"><Strong>Situação: </Strong><?= $report->project->getSituation(); ?></p>
    <p class="mb-0"><Strong>Observações: </Strong><?= $report->project->getNotes(); ?></p>
    <p class="mb-0"><Strong>Quantidade de tarefas: </Strong><?= $report->tasks ? count($report->tasks) : "0" ; ?></p>
    <?php
        $tempo = 0;
        if ($report->tasks) {
            foreach ($report->tasks as $task) {
                $tempo += $task->getDiffTime();
            }
        }
    ?>
    <p class="mb-0"><Strong>Tempo despendido: </Strong><?= $tempo ?? "0" ; ?> min</p>
    <?php if ($tempo && $report->hourlyRate): ?>
    <p><Strong>Custo Total: </Strong>R$ <?= number_format($tempo * $report->hourlyRate / 60, 2, ",", ".") ?></p>
    <?php endif; ?>
    <?php if ($report->tasks): ?>
    <h3 class="mt-3">Tarefas Executadas</h3>
    <div class="overflow-auto">
        <table class="d-table table table-striped" id="table">
            <thead>
                <tr>
                    <th scope="col" onclick="sortTable(0)" style="cursor:pointer">Descrição&uarr;&darr;</th>
                    <th scope="col" onclick="sortTable(1)" style="cursor:pointer">Situação&uarr;&darr;</th>
                    <th scope="col" onclick="sortTable(2)" style="cursor:pointer">Observações&uarr;&darr;</th>
                    <th scope="col" onclick="sortTable(3)" style="cursor:pointer" class="text-center">Data&uarr;&darr;</th>
                    <th scope="col" onclick="sortTable(4)" style="cursor:pointer" class="text-center">Hora do Início&uarr;&darr;</th>
                    <th scope="col" onclick="sortTable(5)" style="cursor:pointer" class="text-center">Hora do Fim&uarr;&darr;</th>
                    <th scope="col" class="text-center">Duração</th>
                    <?php if ($tempo && $report->hourlyRate): ?>
                    <th scope="col" class="text-center">Custo</th>
                    <th scope="col" id="donotprint-th">Fatura</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report->tasks as $task): ?>
                <tr>
                    <td class="align-middle"><?= $task->getDescription(); ?></td>
                    <td class="align-middle text-nowrap"><?= $task->getSituation(); ?></td>
                    <td class="align-middle"><?= $task->getNotes(); ?></td>
                    <td class="align-middle text-center text-nowrap"><?= $task->getDate("d/m/Y"); ?></td>
                    <td class="align-middle text-center text-nowrap"><?= $task->getStartTime(); ?></td>
                    <td class="align-middle text-center text-nowrap"><?= $task->getEndTime(); ?></td>
                    <td class="align-middle text-center text-nowrap"><?= $task->getDiffTime(); ?> min</td>
                    <?php if ($tempo && $report->hourlyRate): ?>
                    <td class="align-middle text-center text-nowrap">R$ <?= number_format($task->getDiffTime() * $report->hourlyRate / 60, 2, ",", ".") ?></td>
                    <td class="align-middle text-center text-nowrap donotprint">
                        <a href="/imprimir-tarefa?project_id=<?= $_GET['project_id'] ?>&id=<?= $task->getId(); ?>&hourly_rate=<?= $report->hourlyRate; ?>" role="button" class="text-dark"><svg class="icon">
                            <use xlink:href="img/icons.svg#report-print"></use>
                        </svg></a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="js/sort-table.js"></script>
    <?php endif; ?>
</section>
<?php endif; ?>