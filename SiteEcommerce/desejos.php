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
                <h1>Desejos</h1>
            </div>
            <!-- Nested Container Ends -->
        </div>
        <!-- Page Banner Ends -->
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php">Início</a></li>
                <li class="active">Desejos</li>
            </ol>
            <!-- Breadcrumb Ends -->

            <?php
            $query_carrinho = mysqli_query($conn, "Select * FROM carrinho "
                    . "WHERE ((id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '1'))");
            $num_rows_cart = mysqli_num_rows($query_carrinho);
            if ($num_rows_cart > 0) {
                ?>
                <!-- Main Heading Starts -->
                <h2 class="main-heading text-center">
                    A sua lista de Desejos
                </h2>
                <!-- Main Heading Ends -->

                <!-- Shopping Cart Table Starts -->
                <div class="table-responsive shopping-cart-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Imagem</th>
                                <th>Produto</th>
                                <th style="text-align: right;">PRECO TOTAL</th>
                                <th style="text-align: center;">Disponibilidade</th>
                                <th style="text-align: center;">Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                            $PRECOTOTAL = 0;
                            while ($linha_carrinho = mysqli_fetch_assoc($query_carrinho)) {
                                $linha_produtos_carrinho = mysqli_fetch_assoc(mysqli_query($conn, "Select * FROM produtos "
                                                . "where (CODIGO = '" . $linha_carrinho['CODIGO'] . "')"));
                                $STDISP = $linha_produtos_carrinho['stock'];
                                $PRECO = $linha_produtos_carrinho['preco'];
                                $quantidade = $linha_carrinho['quantidade'];
                                $PRECOTOTAL = ($PRECO + $PRECOTOTAL);
                                
                               
                                
                                $color = "";
                                $texto = "";
                                if ($STDISP >= 1) {
                                    $color = "label-success";
                                    $texto = "Disponível";
                                } else {
                                    $color = "label-danger";
                                    $texto = "Indisponível";
                                }
                                ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <a href="./produto_single.php?codigo=<?php echo $linha_carrinho['CODIGO']; ?>"><img style="max-width: 70px;" src="images/produtos/<?php echo $linha_carrinho['CODIGO']; ?>.jpg"></a>
                                    </td>
                                    <td style="max-width: 70px!important; vertical-align: middle;">
                                        <a href="./produto_single.php?codigo=<?php echo $linha_carrinho['CODIGO']; ?>" style="color: black;"><?php echo $linha_produtos_carrinho['abrev']; ?></a>
                                    </td>
                                    <td style="text-align: right; vertical-align: middle;"><?php echo number_format($PRECO, 2, ',', ' ') . " €"; ?></td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="label label-table <?php echo $color; ?>"><?php echo $texto; ?></div>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="#" class="Apagar_Linha" style="color: black;" data-content_id_linha="<?php echo $linha_carrinho['id_carrinho']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-right">
                                    <strong>Total</strong>: <?php echo number_format($PRECOTOTAL, 2, ',', ' ') . " €"; ?><br>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- Shopping Cart Table Ends -->
                <?php
            } else {
                ?>
                <h3>Lista de desejos vazia!</h3>
                <?php
            }
            ?>
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

        <script>
            function Confirmar_Apagar_Linha() {
                var res = confirm("Vai apagar artigo. Continuar?");
                return res;
            }
            $("body").on("click", ".Apagar_Linha", function (e) {
                if (Confirmar_Apagar_Linha() === false) {
                    e.preventDefault();
                    return;
                }
                var val_carrinho = $(this).attr("data-content_id_linha");
                var tr = "1";
                var form_data = {
                    id_linha: val_carrinho,
                    Tipo_Registo: tr
                };
                var request = $.ajax({
                    url: "inc/accoes.php",
                    type: "POST",
                    data: form_data,
                    dataType: "html",
                    success: function (res) {
                        var res = jQuery.parseJSON(res);
                        var msg = res.msg;
                        var tipo = res.tipo;
                        if (tipo === "0") { 
                            alert(msg);
                            var segundos = 0;
                            setTimeout(function () {
                            }, 1000 * segundos);
                            e.preventDefault();
                            return;
                        } else if (tipo === "1") { 
                            var segundos = 0;
                            setTimeout(function () {
                                location.reload();
                            }, 1000 * segundos);
                            e.preventDefault();
                            return;
                        }
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = ('ERROR: \n Failed to connect to PAV.\n Verify Network.');
                        } else if (jqXHR.status == 404) {
                            msg = ('ERROR: \n Requested ->' + type + '<- page not found. [404]');
                        } else if (jqXHR.status == 500) {
                            msg = ('ERROR: \n Internal Server Error [500].');
                        } else if (exception === 'parsererror') {
                            msg = ('ERROR: \n Requested JSON parse failed.');
                        } else if (exception === 'timeout') {
                            msg = ('ERROR: \n Time out error.');
                        } else if (exception === 'abort') {
                            msg = ('ERROR: \n Ajax request aborted.');
                        } else {
                            msg = ('ERROR: \n Uncaught Error.\n' + jqXHR.responseText);
                        }
                        alert(msg);
                    }
                });
                e.preventDefault();
                return;
            });
        </script>

    </body>
</html>