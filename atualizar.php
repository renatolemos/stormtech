<?php
require 'conexao.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $titulo = $_POST['titulo'];
    $ano = $_POST['ano'];
    $edicao = $_POST['edicao'];
    $assunto = $_POST['assunto'];
    $isbn = $_POST['isbn'];
    $genero = $_POST['genero'];
    $idioma = $_POST['idioma'];
    $resumo = $_POST['resumo'];
    $descricao = $_POST['descricao'];

    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE biblioteca  set autor = ?, editora = ?, titulo = ?, ano = ?, edicao = ?, assunto = ?,  isbn = ?, genero = ?, idioma = ?, resumo = ?, dscricao = ? WHERE id = ?";
    $q = $conectar->prepare($sql);
    $q->execute(array($autor, $editora, $titulo, $ano, $edicao, $assunto, $isbn, $genero, $idioma, $resumo, $descricao, $id));
    Conexao::disconectar();

    header("Location: index.php");
} else {
    $conectar = Conexao::conectar();
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM biblioteca where id = ?";
    $q = $conectar->prepare($sql);
    $q->execute(array($id));
    $campo = $q->fetch(PDO::FETCH_ASSOC);
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Biblioteca</a>
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

            <h3 class="page-header">Editar Livro</h3>

            <form action="incluir.php" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" name="autor" id="autor" value="<?php echo $campo['autor']; ?>"  placeholder="Digite o nome do autor">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control"  name="titulo" value="<?php echo $campo['titulo']; ?>" id="titulo" placeholder="Digite o título">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="ano">Ano</label>
                        <input type="text" class="form-control" name="ano" value="<?php echo $campo['ano']; ?>" id="ano">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="edicao">Edição</label>
                        <input type="text" class="form-control" name="edicao" value="<?php echo $campo['edicao']; ?>"  id="edicao" placeholder="Digite a edição">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="assunto">Assunto</label>
                        <input type="text" class="form-control" name="assunto" id="assunto" value="<?php echo $campo['assunto']; ?>" placeholder="Digite o assunto">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="editora">Editora</label>
                        <input type="text" class="form-control" name="editora" id="editora" value="<?php echo $campo['editora']; ?>"  placeholder="Digite a editora">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" name="isbn" id="isbn" value="<?php echo $campo['isbn']; ?>" placeholder="Digite a ISBN">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="genero">Genero</label>
                        <input type="text" class="form-control" name="genero" id="genero" value="<?php echo $campo['genero']; ?>" placeholder="Digite o genero">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="idioma">Idioma</label>
                        <input type="text" class="form-control" name="idioma" id="idioma" value="<?php echo $campo['idioma']; ?>" placeholder="Digite o idioma">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="descricao">Descrição do Livro</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo $campo['descricao']; ?>" placeholder="Digite a  descrição">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="resumo">Resumo</label>
                        <textarea class="form-control" name="resumo" id="resumo"  placeholder="<?php echo $campo['resumo']; ?>"></textarea>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a class="btn btn-default" href="index.php">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>