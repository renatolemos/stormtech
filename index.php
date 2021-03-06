﻿<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>:: Biblioteca ::</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
            <br />
            <div id="list" class="row">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Ano</th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            include 'conexaoI.php';
                            $conectar = ConexaoI::conectar();
                            $sql = mysql_query("SELECT * FROM biblioteca ORDER BY titulo ASC");

                            if ($sql === FALSE) {
                                die(mysql_error());
                            }
                            while ($row = mysql_fetch_array($sql)) {
                                echo '<tr>';
                                echo '<td>Livro ' . $row['id'] . '</td>';
                                echo '<td>' . $row['titulo'] . '</td>';
                                echo '<td>' . $row['autor'] . '</td>';
                                echo '<td>' . $row['ano'] . '</td>';
                                echo '<td class="actions">';
                                echo '<a class="btn btn-success btn-xs" href="visualizar.php?id=' . $row['id'] . '">Visualizar</a>';
                                echo '&nbsp;';
                                echo '<a class="btn btn-warning btn-xs" href="atualizar.php?id=' . $row['id'] . '">Editar</a>';
                                echo '&nbsp;';
                                echo '<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal"  href="excluir.php?id=' . $row['id'] . '">Excluir</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ConexaoI::disconectar();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div> 
            <div id="bottom" class="row">
                <div class="col-sm-3">
                    <a href="incluir.php" class="btn btn-primary pull-right h2">Adicionar novo livro</a>
                </div>
            </div> 
        </div>
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Deseja realmente excluir este item?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>