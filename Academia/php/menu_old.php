<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../index.php?erro=1");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Maromba Fitness</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
     
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
 
  <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <span class="img-logo"></span><h5>Academia Maromba</h5>
                <p></p>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#pageCliente" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clientes</a>
                    <ul class="collapse list-unstyled" id="pageCliente">
                        <li class="active" id="cad_cliente">
                            <a href="../php/cadastroCliente.php">Cadastrar</a>
                        </li>
                        <li class="active">
                            <a href="../php/consultaCliente.php">Consultar</a>
                        </li>
                        <li class="active">
                            <a href="../php/cadastroFerias.php">Agendar Férias</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#pageInstrutor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Instrutores</a>
                    <ul class="collapse list-unstyled" id="pageInstrutor">
                        <li class="active">
                            <a href="../php/cadastroInstrutor.php">Cadastrar</a>
                        </li>
                        <li class="active">
                            <a href="../php/consultaInstrutor.php">Consultar</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#pageAula" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Aulas</a>
                    <ul class="collapse list-unstyled" id="pageAula">
                        <li class="active">
                            <a  data-method="get" href="../php/cadastroAula.php">Cadastrar</a>
                        </li>
                        <li class="active">
                            <a href="../php/consultaAula.php">Consultar</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#pageGerencial" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gerencial</a>
                    <ul class="collapse list-unstyled" id="pageGerencial">
                        <li class="active">
                            <a  data-method="get" href="../php/cadastroFuncionario.php">Cadastrar Usuário</a>
                        </li>
                        <li class="active">
                        <a href="../php/relatorio_inadimplente.php">Relatório de Inadimplentes</a>
                        </li>
                        <li class="active">
                        <a href="../php/relatorio_cliente.php">Relatório de Clientes</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"  id="minhaconta">
                                <a href="#" data-toggle="dropdown">Minha conta<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" id="usuario">
                                   <li><?= $_SESSION['nome'] ?></li>
                                   <li><a href="../php/logout.php" id="logout">Logout</a></li> 
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row">
            <?php
            $imagens = ['2.jpg', '4.jpg', '7.jpg', '8.jpg'];
            shuffle($imagens);
            foreach ($imagens as $galeria) {
                echo "<div class='col s12 m4 l3' style='padding:0px'>";
                echo "<img src='../_img/$galeria' class='materialboxed responsive-img'>";
                echo "</div>";
            }
            ?>
            </div>
            <div class="row-conteiner">
                <div class="col-12">
                    <p></p>
                    <h5 id="cabecalho"> Academia Maromba</h5><hr>
                    <p style="text-align:justify">
                    "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                    "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."
                    What is Lorem Ipsum?
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make 
                    a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
                    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.
                </p>
                <br>
                </div>
                <div class="row">
            <?php
            $imagens = ['9.jpg', '10.jpg', '14.jpg', '15.jpg'];
            shuffle($imagens);
            foreach ($imagens as $galeria) {
                echo "<div class='col s12 m4 l3' style='padding:0px'>";
                echo "<img src='../_img/$galeria' class='materialboxed responsive-img'>";
                echo "</div>";
            }
            ?>
            </div>

            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script  type=text/javascript src="materialize/js/jquery-3.3.1.min.js"></script>
    <script  type=text/javascript src="materialize/js/materialize.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <script type="text/javascript">
          $(document).ready(function () {
            $('.materialboxed').materialbox();
        });
    </script>
</body>

</html>