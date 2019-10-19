<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <span class="img-logo"></span><h5>Academia Maromba</h5>
        <p></p>
    </div>
    <ul class="list-unstyled components">
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
</nav>

<!-- Page Content  -->
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button  id="sidebarCollapse" class="navbar-btn">
            <div class="glyphicon glyphicon-resize-full"></div>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <ul class="nav navbar-nav navbar-right">
                <h3 class="text d-inline-block md-auto" id="cabecalho-menu">Sistema de Academia</h3>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" id="minhaconta">
                        <a href="#" data-toggle="dropdown">Minha conta<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" id="usuario">
                        <li><?= $_SESSION['nome'] ?></li>
                        <li><a href="../index.php">Logout</a></li> 
                        </ul>
                    </li>
                </ul>
            </div>
    </div>
</nav>
