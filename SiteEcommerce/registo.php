<?php
include_once 'conn/connect.php';
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
                <h1>Registar</h1>
            </div>
            <!-- Nested Container Ends -->
        </div>
        <!-- Page Banner Ends -->
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php">Início</a></li>
                <li class="active">Registar</li>
            </ol>
            <!-- Breadcrumb Ends -->
            <!-- Main Heading Starts -->
            <h2 class="main-heading text-center">
                Registar <br />
                <span>Criar uma nova conta</span>
            </h2>
            <!-- Main Heading Ends -->
            <!-- Registration Section Starts -->
            <section class="registration-area">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!-- Registration Block Starts -->
                        <div class="panel panel-smart">
                            <div class="panel-heading">
                                <h3 class="panel-title">Informação Pessoal</h3>
                            </div>
                            <div class="panel-body">
                                <!-- Registration Form Starts -->
                                <form action="./registo.php" class="form-horizontal" method="post" role="form">
                                    <!-- Personal Information Starts -->
                                    <div class="form-group">
                                        <label for="inputFname" class="col-sm-3 control-label">Nome:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user" class="form-control" id="inputFname" placeholder="Nome">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-3 control-label">E-mail:</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-3 control-label">Password :</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-3 control-label">Confirmar password :</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="pass2" class="form-control" id="inputPassword" placeholder="Confirmar Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-black">
                                                Registar
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <?php
                                    if ((isset($_POST['user'])) && (isset($_POST['email'])) && (isset($_POST['pass']))) {
                                        $user = $_POST['user'];
                                        $email = $_POST['email'];
                                        $pass = $_POST['pass'];
                                        $pass2 = $_POST['pass2'];
                                            if($pass != $pass2){
                                                echo "As passwords não coincidem!";
                                            } else {
                                                    if (strlen($user) >= '3') {
                                                    if (strlen($email) >= '6') {
                                                    if (strlen($pass) >= '6') {
                                                    $query_users = mysqli_query($conn, "Select * FROM utilizadores "
                                                            . "WHERE (email = '$email')");
                                                    $num_rows_users = mysqli_num_rows($query_users);
                                                    if ($num_rows_users != 0) {
                                                        echo "E-mail já existe.";
                                                    } else {
                                                        $query_insere_user = mysqli_query($conn, "INSERT INTO utilizadores (user, email, pass) "
                                                                . "VALUES ('$user','$email','" . md5($pass) . "')");

                                                        $id_user = mysqli_fetch_assoc(mysqli_query($conn, "Select * FROM utilizadores "
                                                                        . "WHERE (email = '$email')"));

                                                        if ($query_insere_user) {
                                                            echo "User registado.";
                                                        }
                                                    }
                                                } else {
                                                    echo "Password inválida.";
                                                }
                                            } else {
                                                echo "E-mail inválido.";
                                            }
                                        } else {
                                            echo "User inválido.";
                                        }
                                    }
                                }
                                    ?>
                                    <!-- Password Area Ends -->
                                </form>
                                <!-- Registration Form Starts -->
                            </div>							
                        </div>
                        <!-- Registration Block Ends -->
                    </div>
                </div>
            </section>
            <!-- Registration Section Ends -->
        </div>
        <!-- Main Container Ends -->
        <!-- Footer Section Starts -->
        <?php
        include './inc/footer.php';
        ?>
        <!-- Footer Section Ends -->
        <!-- JavaScript Files -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>	
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-hover-dropdown.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>