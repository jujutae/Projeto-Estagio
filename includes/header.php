<?php

use \App\Session\Login;

$alunoLogado = Login::getAlunoLogado();

$usuario = $alunoLogado ?
  '<span class="navbar-text me-3 text-baby-blue fw-bold">' . $alunoLogado['nome'] . '</span>
   <a href="/si/logout.php" class="btn btn-baby-blue me-2">Sair</a>' :
  '<span class="navbar-text me-3 text-baby-blue">Visitante</span>
   <a href="/si/login.php" class="btn btn-baby-blue me-2">Entrar</a>';

?>

<!doctype html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WDEV Vagas!</title>

  <!-- Bootstrap CSS + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    :root {
      --baby-blue: #add8e6;
      --baby-blue-hover: #c4e1ec;
      --page-bg: #f8f9fa;
      /* Claro e agradável */
    }

    body {
      background-color: var(--page-bg);
      color: #0d1b2a;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .btn-baby-blue {
      background-color: var(--baby-blue);
      color: #0d1b2a;
      border: none;
    }

    .btn-baby-blue:hover {
      background-color: var(--baby-blue-hover);
      color: #0d1b2a;
    }

    .form-control {
      border: 2px solid var(--baby-blue);
      background-color: white;
      color: black;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(173, 216, 230, 0.5);
      border-color: var(--baby-blue);
    }

    .navbar-custom {
      background-color: var(--baby-blue);
    }

    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
      color: #0d1b2a !important;
    }

    .navbar-custom .nav-link.active {
      font-weight: bold;
      text-decoration: underline;
    }

    .text-baby-blue {
      color: #0d1b2a !important;
    }

    .navbar-collapse {
      justify-content: flex-end;
    }

    .navbar {
      padding-top: 1rem;
      padding-bottom: 1rem;
    }

    .navbar-brand img {
      height: 40px;
    }

    footer {
      background-color: var(--baby-blue);
      color: #0d1b2a;
    }

    footer a {
      color: #0d1b2a;
    }

    footer a:hover {
      text-decoration: underline;
    }

    /* Garante o footer no final */
    .main-content {
      flex: 1;
    }
  </style>
</head>

<body class="position-relative">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container">

      <a class="navbar-brand d-flex align-items-center" href="/si/index.php">
        <strong>WDEV Vagas</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 me-4 text-end">
          <li class="nav-item">
            <a class="nav-link active" href="/si/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/si/aluno/listar.php">Alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/si/vaga/listar.php">Vagas de Estágio</a>
          </li>
        </ul>

        <div class="d-flex align-items-center">
          <?= $usuario ?>
          <form class="d-flex" role="search" method="GET" action="/si/busca.php">
            <input class="form-control me-2" type="search" name="q" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-baby-blue" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </div>
  </nav>
