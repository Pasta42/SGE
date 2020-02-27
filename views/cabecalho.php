<?php include_once('../function/login_ok.php'); ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../fontawesome/css/all.css" rel="stylesheet">
         <!--load all styles -->
        <title> SiGE - Sistema de Gerenciamento de Estoque </title>
    </head>
    <body class="fundo-img">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#fff159;">
            <a class="navbar-brand" href="index.php">SiGE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicial <span class="sr-only">(página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarproduto.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarfornecedor.php">Fornecedores</a>
                    </li>
                    <?php if($_SESSION['permissao'] > 1){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="listarusuario.php">Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="verrelatorios.php">Relatórios</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../function/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <i class="fas fa-user"></i> <?php echo $_SESSION['nome']; ?>
                </span>
            </div>

        </nav>