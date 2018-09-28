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
        <link href="css/magnific-popup.css" rel="stylesheet">
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
        $codigo = $_GET['codigo'];
        $query_produto = mysqli_query($conn, "Select * FROM produtos "
                . "where (codigo = '" . $codigo . "')");
        $num_rows_produtos = mysqli_num_rows($query_produto);
        $row_produto = mysqli_fetch_assoc($query_produto);
        if ($num_rows_produtos == 0) {
            echo "<script>location.href='index.php';</script>";
        }

        $query_subcategoria = mysqli_query($conn, "Select * FROM subcategorias "
                . "where ((COD = '" . $row_produto['familia'] . "') AND (categ = '" . $row_produto['grp'] . "'))");
        $linha_subcatego = mysqli_fetch_assoc($query_subcategoria);
        ?>

        <!-- Page Banner Starts -->	
        <div class="page-banner one">
            <!-- Nested Container Starts -->
            <div class="container">
                <h1><?php echo $row_produto['abrev']; ?></h1>
            </div>
            <!-- Nested Container Ends -->
        </div>
        <!-- Page Banner Ends -->
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php">Início</a></li>
                <li>
                <!-- CENAS DE LINKS DAS PAGINAS -->
                    <a href="./produtos.php?grupo=<?php echo $row_produto['grp']; ?>&familia=<?php echo $row_produto['familia']; ?>">
                        <?php echo $linha_subcatego['descr']; ?>
                    </a>
                </li>
                <li class="active"><?php echo $row_produto['nome']; ?></li>
            </ol>
            <!-- Breadcrumb Ends -->
            <!-- Product Info Starts -->
            <div class="row product-info full">
                <!-- Left Starts -->
                <div class="col-sm-4 images-block">
                <!-- IR BUSCAR A IMAGEM A PASTA -->
                    <a href="images/produtos/<?php echo $row_produto['codigo']; ?>.jpg">
                        <img src="images/produtos/<?php echo $row_produto['codigo']; ?>.jpg" alt="Image" class="img-responsive thumbnail" />
                    </a>
                </div>
                <!-- Left Ends -->
                <!-- Right Starts -->
                <div class="col-sm-8 product-details">
                    <div class="panel-smart">
                        <!-- Product Name Starts -->
                        <h2><?php echo $row_produto['nome']; ?></h2>
                        <!-- Product Name Ends -->
                        <hr />
                        <!-- Manufacturer Starts -->
                        <ul class="list-unstyled manufacturer">
                            <li>
                                <span>Disponibilidade:</span>
                                <?php
                                if ($row_produto['stock'] > 0) {
                                    ?>
                                    <strong class="label label-success">Disponivel</strong>
                                    <?php
                                } else {
                                    ?>
                                    <strong class="label label-danger">Esgotado</strong>
                                    <?php
                                }
                                ?>
                            </li>
                        </ul>
                        <!-- Manufacturer Ends -->
                        <hr />
                        <!-- Price Starts -->
                        <div class="price">
                            <span class="price-head">Preço: </span>
                            <span class="price-new"><?php echo number_format($row_produto['preco'], 2, ',', ' ') . " €"; ?></span> 
                        </div>
                        <!-- Price Ends -->
                        <hr />
                        <!-- Available Options Starts -->
                        <div class="options">
                            <div class="cart-button button-group">
                                <?php
                                if ((isset($_SESSION['id_user'])) && ($_SESSION['id_user'] > 0)) { 
                                    ?>

                                    <form action="./produto_single.php?codigo=<?php echo $codigo; ?>" method="post" class="form-horizontal" autocomplete="off">
                                        <div class="input-group">
                                            <input type="hidden" name="codigo" class="span1" value="<?php echo $row_produto['codigo']; ?>">
                                            <input type="hidden" name="tipo" class="span1" value="1">
                                            <input type="text" name="quantidade" id="input-quantity" class="form-control" value="1" style="width: 110px!important;">
                                            <br>
                                            <br>
                                            <button type="submit" title="Adicionar ao carrinho" class="btn btn-cart">
                                                <i class="fa fa-shopping-cart"></i> 
                                                Adicionar ao carrinho
                                            </button>
                                        </div>
                                        <?php
                                        if ((isset($_POST['codigo'])) && (isset($_POST['quantidade'])) && (isset($_POST['tipo'])) && ($_POST['tipo'] == "1")) {
                                            $codigo = $_POST['codigo'];
                                            $quantidade = $_POST['quantidade'];
                                            if ($quantidade > 0) {
                                                $query_cart = mysqli_query($conn, "Select * FROM carrinho "
                                                        . "WHERE ((CODIGO = '$codigo') AND (id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '0'))");
                                                $num_rows_cart = mysqli_num_rows($query_cart);
                                                if ($num_rows_cart == 1) { /* editar */
                                                    $row_cart = mysqli_fetch_assoc($query_cart);
                                                    $total = ($row_cart['quantidade'] + $quantidade);
                                                    $query_editar_cart = mysqli_query($conn, "UPDATE carrinho SET quantidade = '$total' "
                                                            . "WHERE ((CODIGO = '$codigo') AND (id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '0'))");
                                                } else { /* registar */
                                                    $query_insere_cart = mysqli_query($conn, "INSERT INTO carrinho (id_user, CODIGO, quantidade, desejo) "
                                                            . "VALUES ('" . $_SESSION['id_user'] . "','$codigo','$quantidade','0')");
                                                    echo "<script>location.href='./produto_single.php?codigo=" . $codigo . "';</script>";
                                                }
                                            } else {
                                                echo "Quantidade inválida.";
                                            }
                                        }
                                        ?>
                                    </form>

                                    <form action="./produto_single.php?codigo=<?php echo $codigo; ?>" method="post" class="form-horizontal" autocomplete="off">
                                        <div class="input-group">
                                            <input type="hidden" name="codigo" class="span1" value="<?php echo $row_produto['codigo']; ?>">
                                            <input type="hidden" name="tipo" class="span1" value="2">
                                            <?php
                                            $query_desejo = mysqli_query($conn, "Select * FROM carrinho "
                                                    . "WHERE ((CODIGO = '$codigo') AND (id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '1'))");
                                            $num_rows_desejo = mysqli_num_rows($query_desejo);
                                            if ($num_rows_desejo == 1) { /* existe */
                                                $icon = "fa-heart";
                                                $texto = "Remover da lista de desejos";
                                            } else {
                                                $icon = "fa-heart-o";
                                                $texto = "Adicionar à lista de desejos";
                                            }
                                            ?>
                                            <br>
                                            <button type="submit" title="<?php echo $texto; ?>" class="btn btn-wishlist">
                                                <i class="fa <?php echo $icon; ?>"></i>
                                            </button>
                                        </div>
                                        <?php
                                        if ((isset($_POST['codigo'])) && (isset($_POST['tipo'])) && ($_POST['tipo'] == "2")) {
                                            if ($num_rows_desejo == 1) { /* apagar */
                                                $query_apagar_desejo = mysqli_query($conn, "DELETE FROM carrinho "
                                                        . "WHERE ((CODIGO = '$codigo') AND (id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '1'))");
                                                echo "<script>location.href='./produto_single.php?codigo=" . $codigo . "';</script>";
                                            } else { /* registar */
                                                $query_insere_desejo = mysqli_query($conn, "INSERT INTO carrinho (id_user, CODIGO, quantidade, desejo) "
                                                        . "VALUES ('" . $_SESSION['id_user'] . "','$codigo','0','1')");
                                                echo "<script>location.href='./produto_single.php?codigo=" . $codigo . "';</script>";
                                            }
                                        }
                                        ?>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-cart">
                                        <a href="./login.php" style="color: black; text-decoration: none;">Login</a>
                                    </button>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- Available Options Ends -->
                    </div>
                </div>
                <!-- Right Ends -->
            </div>
            <!-- Product Info Ends -->	
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