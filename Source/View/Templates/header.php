<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . " - " : "" ?>SRP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="bg-white">
    <header class="bg-dark text-white">
        <nav class="container px-2 navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand fw-bold" href="/">SRP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link<?= $page == 'projetos' ? ' active' : '' ?>" href="/projetos">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= $page == 'tarefas' ? ' active' : '' ?>" href="/tarefas">Tarefas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= $page == 'relatorios' ? ' active' : '' ?>" href="/relatorios">Relatórios</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="py-3">
        <div class="container">