<?php
 
 use \App\Session\Login;
  
 $alunoLogado = Login::getAlunoLogado();

 $usuario = $alunoLogado ? 
            $alunoLogado[ 'nome']. '<a href="logount.php" class="text-light font-weight-bold ml-2">Sair</a>':
            'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>';

?>

<!doctype html>
<html lang="pt">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">

  <title>WDEV Vagas!</title>
</head>


<body class="bg text-dark">
  <div class="">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <a class="" href="/si/index.php"><img src="imagens/ifto-logo.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/si/aluno/listar.php">Alunos</a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="/si/vaga/listar.php">Vagas de estagio</a>
          </li>
          <li class="nav-item">
            <a class=" btn btn-success" href="/si/login.php">Entrar</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg></button>
        </form>
      </div>
  </div>
  </nav>

  <div class="jumbotron bg-blue">
    <p>Exemplo de CRU com PHP orientada a objetos</p>
  </div>