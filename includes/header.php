<?php

use \App\Session\Login;

$alunoLogado = Login::getAlunoLogado();

$usuario = $alunoLogado ?
  '<span class="navbar-text me-3 text-baby-blue fw-bold">' . $alunoLogado['nome'] . '</span>
   <a href="/si/logout.php" class="btn btn-danger me-2">Sair</a>' :
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
      --baby-blue-hover: #87ceeb;
      --page-bg: #f8f9fa;
      --strong-blue: #0077b6;
      /* Azul mais forte */
    }

    body {
      background-color: var(--page-bg);
      color: #0d1b2a;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Botões mais destacados */
    .btn-baby-blue {
      background-color: var(--strong-blue);
      color: #fff;
      border: none;
      border-radius: 8px;
      margin-left: 0.5rem;
      padding: 0.5rem 1.2rem;
      font-weight: bold;
    }

    .btn-baby-blue:hover {
      background-color: #023e8a;
      color: #fff;
    }

    .form-control {
      border: 2px solid var(--strong-blue);
      background-color: white;
      color: black;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(0, 119, 182, 0.4);
      border-color: var(--strong-blue);
    }

    .navbar-custom {
      background-color: var(--baby-blue);
    }

    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
      color: #0d1b2a !important;
      position: relative;
      font-weight: 500;
      padding-bottom: 6px;
    }

    /* Linha inferior nos links */
    .navbar-custom .nav-link::after {
      content: "";
      display: block;
      width: 0;
      height: 2px;
      background: #0d1b2a;
      transition: width 0.3s;
      margin-top: 2px;
    }

    .navbar-custom .nav-link:hover::after,
    .navbar-custom .nav-link.active::after {
      width: 100%;
    }

    .navbar-collapse {
      justify-content: flex-end;
      align-items: center;
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

    /* Identificação do usuário */
    .user-info {
      margin-right: 1rem;
      display: flex;
      align-items: center;
      font-weight: bold;
      color: #0d1b2a;
    }

    .user-info i {
      margin-right: 6px;
      font-size: 1.2rem;
      color: var(--strong-blue);
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
            <a class="nav-link" href="/si/index.php">Home</a>
          </li>
          <?php if (isset($alunoLogado['nivel']) && $alunoLogado['nivel'] == 2): ?>
            <li class="nav-item">
              <a class="nav-link" href="/si/aluno/listar.php">Alunos</a>
            </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link" href="/si/vaga/listar.php">Vagas de Estágio</a>
          </li>
        </ul>

        <!-- Identificação do usuário -->
        <div class="user-info">
          <i class="bi bi-person-circle"></i>
          <?= $usuario ?>
        </div>
      </div>
    </div>
  </nav>