<h1 class="text-center mb-3">Fatura Individual</h1>
<section class="mb-3">
    <p class="mb-0">
        <div class="row g-1">
            <div class="col col-3 border-top border-bottom text-end"><strong>Vinculada ao Projeto: </strong></div>
            <div class="col col-9 border-top border-bottom"><?= $project->getName(); ?></div>
            <div class="col col-3 border-bottom text-end"><strong>Descrição: </strong></div>
            <div class="col col-9 border-bottom"><?= $task->getDescription(); ?></div>
            <div class="col col-3 border-bottom text-end"><strong>Situação: </strong></div>
            <div class="col col-9 border-bottom"><?= $task->getSituation(); ?></div>
            <div class="col col-3 border-bottom text-end"><strong>Observações: </strong></div>
            <div class="col col-9 border-bottom"><?= $task->getNotes(); ?></div>
            <div class="col col-3 border-bottom text-end"><strong>Data: </strong></div>
            <div class="col col-9 border-bottom"><?= $task->getDate(); ?></div>
            <div class="col col-3 border-bottom text-end"><strong>Hora do Início: </strong></div>
            <div class="col col-9 border-bottom"><?= $task->getStartTime(); ?></div>
            <div class="col col-3 border-bottom text-end"><strong>Hora do Fim: </strong></div>
            <div class="col col-9 border-bottom"><?= $task->getEndTime(); ?></div>
            <div class="col col-3 border-bottom text-end"><strong>Duração: </strong></div>
            <div class="col col-9 border-bottom"><?= $task->getDiffTime(); ?></div>
            <?php if($hourlyRate): ?>
            <div class="col col-3 border-bottom text-end"><strong>Custo: </strong></div>
            <div class="col col-9 border-bottom">R$ <?= number_format($task->getDiffTime() * $hourlyRate / 60, 2, ",", ".") ?></div>
            <?php endif; ?>
        </div>
    </p>
    <div class="text-center">
        <a href="#" role="button" class="text-dark donotprint" onclick="window.print()"><svg class="icon"><use xlink:href="img/icons.svg#report-print"></use></svg></a>
    </p>
</section>