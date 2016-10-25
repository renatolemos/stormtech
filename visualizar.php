<?php
require 'conexao.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM biblioteca where id = ?";
    $q = $conectar->prepare($sql);
    $q->execute(array($id));
    $campo = $q->fetch(PDO::FETCH_ASSOC);
    echo $campo['autor'];
    Conexao::disconectar();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>:: Biblioteca ::</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Biblioteca</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Ajuda</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="main" class="container-fluid">
            <h3 class="page-header">Livro - <?php echo $campo['titulo'] ?></h3>

            <?php echo "<div class='row'>
                <div class='col-md-6'>
                    <p><strong>Autor</strong></p>
                    <p>" . $campo['autor'] . "</p>
                </div>
                <div class='col-md-6'>
                    <p><strong>Título</strong></p>
                    <p>" . $campo['titulo'] . "</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <p><strong>Ano de Publicação</strong></p>
                    <p>" . $campo['ano'] . "</p>
                </div>
                <div class='col-md-3'>
                    <p><strong>Edição</strong></p>
                    <p>" . $campo['edicao'] . "</p>
                </div>

                <div class='col-md-3'>
                    <p><strong>Assunto</strong></p>
                    <p>" . $campo['assunto'] . "</p>
                </div>

                <div class='col-md-3'>
                    <p><strong>Editora</strong></p>
                    <p>" . $campo['editora'] . "</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <p><strong>ISBN</strong></p>
                    <p>" . $campo['isbn'] . "</p>
                </div>
                <div class='col-md-3'>
                    <p><strong>Genero</strong></p>
                    <p>" . $campo['genero'] . "</p>
                </div>

                <div class='col-md-3'>
                    <p><strong>Idioma</strong></p>
                    <p>" . $campo['idioma'] . "</p>
                </div>

                <div class='col-md-3'>
                    <p><strong>Descrição do livro</strong></p>
                    <p>" . $campo['descricao'] . "</p>
                </div>
            </div>
            <div  class='row'>
            <div class='col-md-12'>
                <p><strong>Resumo do livro</strong></p>
                <p>" . $campo['resumo'] . "</p>
            </div>
        </div>" ?>
            <hr />
            <div id="actions" class="row">
                <div class="col-md-12">
                    <?php
                    echo '<a class="btn btn-default btn-xs" href="index.php">Voltar</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-warning btn-xs" href="atualizar.php?id=' . $campo['id'] . '">Editar</a>';
                    ?>
                </div>
            </div>
    </body>
</html>