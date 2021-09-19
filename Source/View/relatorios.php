<h1 class="text-center mb-3">Relatórios</h1>
<section class="mb-3">
    <form method="GET" class="mt-3">
        <div class="d-block d-md-flex mb-3 text-center">
            <div class="input-group flex-wrap">
                <label class="input-group-text text-nowrap" for="project-id">Escolha um Projeto: </label>
                <select class="form-select" name="project-id" id="project-id" required>
                    <option selected></option>
                    <?php foreach ($projects as $projectId => $projectName): ?>
                    <option value="<?= $projectId; ?>"><?= $projectName; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary text-nowrap mt-3 mt-md-0 mx-2 me-md-0 ms-md-3">Gerar Relatório</button><a class="btn btn-secondary text-nowrap mt-3 mt-md-0 mx-2 me-md-0 ms-md-3" href='/relatorios'>Limpar</a>
        </div>
    </form>
</section>
<?php if (isset($report)): ?>
<section class="mb-3">
    <h2>Relatório do Projeto</h2>
    <p class="mb-0"><Strong>Nome: </Strong><?= $report->project->getName(); ?></p>
    <p class="mb-0"><Strong>Descrição: </Strong><?= $report->project->getDescription(); ?></p>
    <p class="mb-0"><Strong>Situação: </Strong><?= $report->project->getSituation(); ?></p>
    <p class="mb-0"><Strong>Observações: </Strong><?= $report->project->getNotes(); ?></p>
    <p class="mb-0"><Strong>Quantidade de tarefas: </Strong><?= $report->tasks ? count($report->tasks) : "0" ; ?></p>
    <?php
        if ($report->tasks) {
            $tempo = 0;
            foreach ($report->tasks as $task) {
                $tempo += $task->getDiffTime();
            }
        }
    ?>
    <p class="mb-0"><Strong>Tempo despendido: </Strong><?= $tempo ?? "0" ; ?> min</p>
    <p class="mb-0"><Strong>Custo em BRL: </Strong>R$ 0,00</p>
    <p class="mb-0"><Strong>Custo em USD: </Strong>$0.00</p>
    <p><Strong>Custo em EUR: </Strong>0,00 &#8364;</p>
    <?php if (isset($report->tasks)): ?> // Corrigir
    <h3>Tarefas Executadas</h3>
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
                    <th scope="col" onclick="sortTable(6)" style="cursor:pointer" class="text-center">Duração&uarr;&darr;</th>
                    <th scope="col">Fatura</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report->tasks as $task): ?>
                <tr>
                    <td class="align-middle"><?= $task->getDescription(); ?></td>
                    <td class="align-middle"><?= $task->getSituation(); ?></td>
                    <td class="align-middle"><?= $task->getNotes(); ?></td>
                    <td class="align-middle text-center"><?= $task->getDate("d/m/Y"); ?></td>
                    <td class="align-middle text-center"><?= $task->getStartTime(); ?></td>
                    <td class="align-middle text-center"><?= $task->getEndTime(); ?></td>
                    <td class="align-middle text-center"><?= $task->getDiffTime(); ?> min</td>
                    <td>
                        <a href="#" class="text-danger"><svg class="icon">
                            <use xlink:href="img/icons.svg#report-pdf"></use>
                        </svg></a>
                        <a href="#" class="text-dark"><svg class="icon">
                            <use xlink:href="img/icons.svg#report-print"></use>
                        </svg></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>
<script src="js/sort-table.js"></script>