<?php
require_once('conn/connect.php');
?>
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PCmaisUM</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Google Web Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Romanesco" rel="stylesheet">

        <!-- CSS Files -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/fav-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/fav-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/fav-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/fav-57.png">
        <link rel="shortcut icon" href="images/fav.png">

    </head>
    <body>
        <!-- Header Section Starts -->
        <header id="header-area">
            <!-- Header Top Starts -->
            <?php
            include './inc/nav1.php';
            ?>
            <!-- Header Top Ends -->
            <!-- Main Header Starts -->
            <?php
            include './inc/nav2.php';
            ?>
            <!-- Main Header Ends -->
            <!-- Main Menu Starts -->
            <?php
            include './inc/nav3.php';
            ?>
            <!-- Main Menu Ends -->
        </header>
        <!-- Header Section Ends -->
        <!-- Page Banner Starts -->	
        <div class="page-banner one">
            <!-- Nested Container Starts -->
            <div class="container">
                <h1>Tens duvidas? Estás no sitio certo!</h1>
            </div>
            <!-- Nested Container Ends -->
        </div>
        <!-- Page Banner Ends -->
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li class="active">Contactos</li>
            </ol>
            <!-- Breadcrumb Ends -->
            <!-- Main Heading Starts -->
            <h2 class="main-heading text-center">
                Onde estamos e como nos podes contactar!
            </h2>
            <!-- Main Heading Ends -->
            <!-- Google Map Starts -->
            <div id="map-wrapper">
                <div id="map-block"></div>
            </div>
            <!-- Google Map Ends -->
            <!-- Starts -->
            <div class="row">
                <!-- Contact Details Starts -->
                <div class="col-sm-4">
                    <div class="panel panel-smart">
                        <div class="panel-heading">
                            <h3 class="panel-title">Detalhes Contacto</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled contact-details">
                                <li class="clearfix">
                                    <i class="fa fa-home pull-left"></i>
                                    <span class="pull-left">
                                        PCmaisUM <br />
                                        Rua dos PCmaisUM, Porto, <br />
                                        Porto - 4400 - 123
                                    </span>
                                </li>
                                <li class="clearfix">
                                    <i class="fa fa-phone pull-left"></i>
                                    <span class="pull-left">
                                        21 123 123 1
                                    </span>
                                </li>
                                <li class="clearfix">
                                    <i class="fa fa-envelope-o pull-left"></i>
                                    <span class="pull-left">
                                    ENCOMENDAS@PCMAISUM.COM  <br />
                                    RMA@PCMAISUM.COM (SERVIÇO PÓS VENDA)  <br />
                                    CONTABILIDADE@PCMAISUM.COM
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Contact Details Ends -->
                <!-- Contact Form Starts -->
                <div class="col-sm-8">
                    <div class="panel panel-smart">
                        <div class="panel-heading">
                            <h3 class="panel-title">Queres ser contactado? Envia um email! </h3>
                        </div>
                        <div class="panel-body">
                            <form action="contactos.php" class="form-horizontal" role="form" method="post" role="form">
                                <div class="form-group">
                                    <label for="nome" class="col-sm-2 control-label">
                                        Nome
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nome" id="name" placeholder="O teu nome">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="col-sm-2 control-label">
                                        Email
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="Email" id="email" placeholder="O teu endereço eletronico para futuro contacto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Assunto" class="col-sm-2 control-label">
                                        Assunto 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Assunto" id="assunto" placeholder="Assunto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mensagem" class="col-sm-2 control-label">
                                        Mensagem
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea name="mensagem" id="msg" class="form-control" rows="5" placeholder="Mensagem"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-black text-uppercase">		Enviar
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    if ((isset($_POST['nome'])) && (isset($_POST['Email'])) && (isset($_POST['Assunto'])) && (isset($_POST['mensagem']))) {
                                        $nome = $_POST['nome'];
                                        $Email = $_POST['Email'];
                                        $Assunto = $_POST['Assunto'];
                                        $mensagem = $_POST['mensagem'];
                                                    if (strlen($nome) >= '3') {
                                                    if (strlen($Email) >= '6') {
                                                    if (strlen($Assunto) >= '5') {
                                                    if (strlen($mensagem) >= '5') {
                                                        $query_insere_mensagem = mysqli_query($conn, "INSERT INTO contactos (nome, Email, Assunto, mensagem) "
                                                                . "VALUES ('" . $nome . "', '$Email' ,'" . $Assunto . "', '" . $mensagem . "')");

                                                        if ($query_insere_mensagem) {
                                                            echo "Mensagem enviada com sucesso";
                                                        }
                                                    
                                                } else {
                                                    echo "Tente enviar uma mensagem mais longa com mais pormenores";
                                                }
                                            } else {
                                                echo "Qual era o assunto?";
                                            }
                                        } else {
                                            echo "Email invalido.";
                                        }
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Contact Form Ends -->
            </div>
            <!-- Ends -->
        </div>
        <!-- Main Container Ends -->
<!-- Footer Section Starts -->
<?php
        include './inc/footer.php';
        ?>
        <!-- JavaScript Files -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>	
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-hover-dropdown.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/map.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>