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
                <h1>Entrar</h1>
            </div>
            <!-- Nested Container Ends -->
        </div>
        <!-- Page Banner Ends -->
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php">Início</a></li>
                <li class="active">Entrar</li>
            </ol>
            <!-- Breadcrumb Ends -->
            <!-- Login Form Section Starts -->
            <section class="login-area" style="margin-top: -50px;">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!-- Login Panel Starts -->
                        <div class="panel panel-smart">
                            <div class="panel-heading">
                                <h3 class="panel-title">Entrar</h3>
                            </div>
                            <div class="panel-body">
                                <p>
                                    Por favor utilize a sua conta
                                </p>
                                <!-- Login Form Starts -->
                                <form action="./login.php" class="form-inline" method="post" role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">E-mail</label>
                                        <input type="email" name="user_entrar" class="form-control" id="exampleInputEmail2" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                        <input type="password" name="pass_entrar" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-black">
                                        Entrar
                                    </button>
                                    <br>
                                    <?php
                                    if ((isset($_POST['user_entrar'])) && (isset($_POST['pass_entrar']))) {
                                        $email_entrar = $_POST['user_entrar'];
                                        $pass_entrar = $_POST['pass_entrar'];
                                        if (strlen($email_entrar) >= '6') {
                                            if (strlen($pass_entrar) >= '6') {
                                                $query_users_entrar = mysqli_query($conn, "Select * FROM utilizadores "
                                                        . "WHERE ((email = '$email_entrar') AND (pass = '" . md5($pass_entrar) . "'))");
                                                $num_rows_users_entrar = mysqli_num_rows($query_users_entrar);
                                                if ($num_rows_users_entrar == 1) {
                                                    echo "dados corretos.";
                                                    $row_user = mysqli_fetch_assoc($query_users_entrar);
                                                    $_SESSION['id_user'] = $row_user['id_user'];
                                                    $_SESSION['user'] = $row_user['user'];
                                                    $_SESSION['email'] = $row_user['email'];
                                                    echo "<script>location.href='index.php';</script>";
                                                } else {
                                                    echo "Dados errados.";
                                                }
                                            } else {
                                                echo "Password inválida.";
                                            }
                                        } else {
                                            echo "E-mail inválido.";
                                        }
                                    }
                                    ?>
                                </form>
                                <!-- Login Form Ends -->
                            </div>
                        </div>
                        <!-- Login Panel Ends -->
                    </div>
                </div>
            </section>
            <!-- Login Form Section Ends -->
        </div>
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