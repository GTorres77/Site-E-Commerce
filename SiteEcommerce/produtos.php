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

        <?php
        //MENU E SUBMENU
        $get_cat = $_GET['grupo'];
        $get_subcat = $_GET['familia'];

        $query_categorias = mysqli_query($conn, "Select * FROM categorias "
                . "where (COD = '" . $get_cat . "')");
        $numero_linhas_categorias = mysqli_num_rows($query_categorias);
        $linhas_categorias = mysqli_fetch_assoc($query_categorias);

        $query_subcategorias = mysqli_query($conn, "Select * FROM subcategorias "
                . "where ((COD = '" . $get_subcat . "') AND (categ = '" . $get_cat . "'))");
        $numero_linhas_subcategorias = mysqli_num_rows($query_subcategorias);
        $linhas_subcategorias = mysqli_fetch_assoc($query_subcategorias);

        if (($numero_linhas_categorias == 0) || ($numero_linhas_subcategorias == 0)) {
            echo "<script>location.href='index.php';</script>";
        }
        ?>

        <!-- Page Banner Starts -->	
        <div class="page-banner one">
            <!-- Nested Container Starts -->
            <div class="container">
                <h1><?php echo $linhas_categorias['DESCR'] . ' - ' . $linhas_subcategorias['descr']; ?></h1>
            </div>
            <!-- Nested Container Ends -->
        </div>
        <!-- Page Banner Ends -->
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php">Início</a></li>
                <li class="active"><?php echo $linhas_subcategorias['descr']; ?></li>
            </ol>
            <!-- Breadcrumb Ends -->
            <div class="row">		
                <!-- Primary Content Starts -->
                <div class="col-md-12">
                    <!-- Main Heading Starts -->
                    <h2 class="main-heading2">
                        <h1><?php echo $linhas_subcategorias['descr']; ?></h1>
                    </h2>
                    <!-- Main Heading Ends -->
                    <!-- Product Grid Display Starts -->
                    <div class="row">
                        <?php
                        $query_produtos = mysqli_query($conn, "Select * FROM produtos "
                                . "where ((grp = '" . $get_cat . "') AND (familia = '" . $get_subcat . "'))");
                        $num_rows_produtos = mysqli_num_rows($query_produtos);

                        //BUSCAR IMAGENS DOS PRODUTOS POR CODIGO
                        if ($num_rows_produtos > 0) {
                            while ($row_produto = mysqli_fetch_assoc($query_produtos)) {
                                ?>
                                <div class="col-md-3" style="height: 450px;">
                                    <div class="product-col">
                                        <div class="image" style="height: 200px;">
                                            <a href="./produto_single.php?codigo=<?php echo $row_produto['codigo']; ?>">
                                                <img style="height: 200px; width: auto;" class="img-responsive img_produto_center" src="images/produtos/<?php echo $row_produto['codigo']; ?>.jpg" alt="product" />
                                            </a>
                                        </div>
                                        <div class="caption">
                                            <h4 style="height: 50px;">
                                                <a href="./produto_single.php?codigo=<?php echo $row_produto['codigo']; ?>"><?php echo $row_produto['nome']; ?></a>
                                            </h4>
                                            <div class="price">
                                                <span class="price-new"><?php echo number_format($row_produto['preco'], 2, ',', ' ') . " €"; ?></span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <b class="span3">Não existem artigos.</b>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Product Grid Display Ends -->
                </div>
                <!-- Primary Content Ends -->
            </div>
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