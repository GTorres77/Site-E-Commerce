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
                <h1>Carrinho</h1>
            </div>
            <!-- Nested Container Ends -->
        </div>
        <!-- Page Banner Ends -->
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php">Início</a></li>
                <li class="active">Carrinho</li>
            </ol>
            <!-- Breadcrumb Ends -->

            <?php
            $query_carrinho = mysqli_query($conn, "Select * FROM carrinho "
                    . "WHERE ((id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '0'))");
            $num_rows_cart = mysqli_num_rows($query_carrinho);
            if ($num_rows_cart > 0) {
                ?>
                <!-- Main Heading Starts -->
                <h2 class="main-heading text-center">
                    O seu carrinho de compras
                </h2>
                <!-- Main Heading Ends -->

                <!-- Shopping Cart Table Starts -->
                <div class="table-responsive shopping-cart-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Imagem</th>
                                <th>Produto</th>
                                <th style="text-align: right;">Quantidade</th>
                                <th style="text-align: right;">Preço</th>
                                <th style="text-align: center;">Disponibilidade</th>
                                <th style="text-align: center;">Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $PRECOTOTAL = 0;
                            while ($row_cart = mysqli_fetch_assoc($query_carrinho)) {
                                $row_produto_cart = mysqli_fetch_assoc(mysqli_query($conn, "Select * FROM produtos "
                                                . "where (CODIGO = '" . $row_cart['CODIGO'] . "')"));
                                $STOCK = $row_produto_cart['stock'];
                                $PRECO = $row_produto_cart['preco'];
                                $quantidade = $row_cart['quantidade'];
                                $PRECO = ($PRECO * $quantidade);

                                $PRECOTOTAL = ($PRECO + $PRECOTOTAL);
                                $color = "";
                                $texto = "";
                                if ($STOCK >= $quantidade) {
                                    $color = "label-success";
                                    $texto = "Disponível";
                                } else {
                                    $color = "label-danger";
                                    $texto = "Indisponível";
                                }
                                ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <a href="./produto_single.php?codigo=<?php echo $row_cart['CODIGO']; ?>"><img style="max-width: 70px;" src="images/produtos/<?php echo $row_cart['CODIGO']; ?>.jpg"></a>
                                    </td>
                                    <td style="max-width: 70px!important; vertical-align: middle;">
                                        <a href="./produto_single.php?codigo=<?php echo $row_cart['CODIGO']; ?>" style="color: black;"><?php echo $row_produto_cart['abrev']; ?></a>
                                    </td>
                                    <td style="text-align: right; vertical-align: middle;"><?php echo $quantidade; ?></td>
                                    <td style="text-align: right; vertical-align: middle;"><?php echo number_format($PRECO, 2, ',', ' ') . " €"; ?></td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="label label-table <?php echo $color; ?>"><?php echo $texto; ?></div>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="#" class="Apagar_Linha" style="color: black;" data-content_id_linha="<?php echo $row_cart['id_carrinho']; ?>">
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
                <!-- Shipping Section Starts -->
                <section class="registration-area">
                    <div class="row">

                        <!-- Shipping & Shipment Block Starts -->
                        <div class="col-sm-offset-3 col-sm-6">
                            <!-- Shipment Information Block Starts -->
                            <div class="panel panel-smart">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Envio e Faturação
                                    </h3>
                                    <h4 class="panel-title">
                                        Quando o Pagamento for confirmado irá receber um email com o CTT Tracking
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <!-- Form Starts -->
                                    <?php
                                    $finalizar = false;
                                    if ((isset($_POST['nif'])) && (isset($_POST['morada'])) && (isset($_POST['codigopostal'])) && (isset($_POST['localidade'])) && (isset($_POST['nomeU'])) && (isset($_POST['telemovel']))) {
                                        $user_nif = $_POST['nif'];
                                        $user_telemovel = $_POST['telemovel'];
                                        $user_morada = $_POST['morada'];
                                        $user_nomeU = $_POST['nomeU'];
                                        $user_cpostal = $_POST['codigopostal'];
                                        $user_localidade = $_POST['localidade'];
                                        $finalizar = true;
                                    } else { 
                                        $user_nomeU = "";
                                        $user_telemovel = "";
                                        $user_nif = "";
                                        $user_morada = "";
                                        $user_cpostal = "";
                                        $user_localidade = "";
                                    }
                                    ?>
                                    <form action="./carrinho.php" method="post" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="inputNomeU" class="col-sm-3 control-label">Nome: </label>
                                            <div class="col-sm-9">
                                                <textarea name="nomeU" class="form-control" id="inputNomeU" placeholder = "O seu nome" ><?php echo $user_nomeU; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputMorada" class="col-sm-3 control-label">Morada: </label>
                                            <div class="col-sm-9">
                                                <textarea name="morada" class="form-control" id="inputMorada" rows="3" placeholder = "Morada onde irá receber a encomenda" ><?php echo $user_morada; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputCodigoPostas" class="col-sm-3 control-label">Código Postal:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="codigopostal" class="form-control" id="inputCodigoPostas" placeholder = "O codigo postal da morada" value="<?php echo $user_cpostal; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputLocalidade" class="col-sm-3 control-label">Localidade:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="localidade" class="form-control" id="inputLocalidade" placeholder = "A sua localidade" value="<?php echo $user_localidade; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNIF" class="col-sm-3 control-label">NIF:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nif" class="form-control" id="inputNIF" placeholder = "NIF do titular da conta" value="<?php echo $user_nif; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputTelemovel" class="col-sm-3 control-label">Contacto: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telemovel" class="form-control" id="inputTelemovel" placeholder = "Numero de telemovel/telefone" value="<?php echo $user_nif; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-black" >Finalizar Encomenda</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Form Ends -->
                                </div>

                                <?php
                                if ($finalizar == true) {
                                    if (strlen($user_nif) == '9') {
                                        if (strlen($user_morada) >= '4') {
                                            if (strlen($user_nomeU) >= '3') {
                                                if (strlen($user_cpostal) >= '4') {
                                                    if (strlen($user_localidade) >= '2') {
                                                        if (strlen($user_telemovel) >= '9') {
                                                    $query_carrinho_ver_stock = mysqli_query($conn, "Select * FROM carrinho "
                                                            . "WHERE ((id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '0'))");
                                                    $existe_stock_suficiente = true;
                                                    while ($row_cart = mysqli_fetch_assoc($query_carrinho_ver_stock)) {
                                                        $query_carrinho_produto = mysqli_fetch_assoc(mysqli_query($conn, "Select * FROM produtos "
                                                                        . "WHERE (CODIGO = '" . $row_cart['CODIGO'] . "')"));
                                                        $STOCK = $query_carrinho_produto['stock'];
                                                        $quantidade = $row_cart['quantidade'];
                                                        if ($STOCK < $quantidade) {
                                                            $existe_stock_suficiente = false;
                                                            break;
                                                        }
                                                    }

                                                    if ($existe_stock_suficiente == true) {
                                                        $query_carrinho_encomendar = mysqli_query($conn, "Select * FROM carrinho "
                                                                . "WHERE ((id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '0'))");
                                                        $PRECOTOTAL = 0;
                                                        $numlinha = 1;
                                                        $DATA = Data("Simples_Invertida");
                                                        $HORA = Data("Horamin");
                                                        while ($linha_carrinho = mysqli_fetch_assoc($query_carrinho_encomendar)) {
                                                            $id_cart = $linha_carrinho['id_carrinho'];
                                                            $id_user = $linha_carrinho['id_user'];
                                                            $CODIGO = $linha_carrinho['CODIGO'];
                                                            $quantidadea = $linha_carrinho['quantidade'];
                                                            $query_carrinhoproduto = mysqli_fetch_assoc(mysqli_query($conn, "Select * FROM produtos "
                                                                            . "WHERE (codigo = '" . $CODIGO . "')"));
                                                            $ABREV = $query_carrinhoproduto['abrev'];
                                                            $NOME = $query_carrinhoproduto['nome'];
                                                            $STOCK = $query_carrinhoproduto['stock'];
                                                            $PRECO = $query_carrinhoproduto['preco'];
                                                            $user_morada = $_POST['morada'];
                                                            $user_nif = $_POST['nif'];
                                                            $user_telemovel = $_POST['telemovel'];
                                                            $user_cpostal = $_POST['codigopostal'];

                                                            $PRECOTOTAL = ($PRECO + $PRECOTOTAL);
                                                            
                                                            $query_inserir_encomendas = mysqli_query($conn, "INSERT INTO encomendas (produto, descritao, preco, quantidade, nome, morada, codigopostal, localidade, nif, telemovel, data, hora) "
                                                                    . "VALUES ('$CODIGO', '$NOME', '$PRECOTOTAL', '$quantidade', '" . $user_nomeU . "', '" . $user_morada . "', '" . $user_cpostal . "', '$user_nif', '$user_telemovel', '$DATA', '$HORA')");       
                                                            
                                                            $apagar_linha_carrinho = mysqli_query($conn, "DELETE FROM carrinho "
                                                                    . "WHERE ((id_carrinho = '$id_cart') AND (id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '0'))");
                                                                      
                                                        }
                                                        
                                                        if ($query_inserir_encomendas) {                                             
                                                            echo "Obrigado pela sua preferência.";
                                                        } else {
                                                            echo "Ocorreu um erro, tente novamente";
                                                        }
                                                    } else {
                                                        echo "Existem artigos esgotados.";
                                                    }
                                                } else {
                                                    echo "Telemovel Invalido.";
                                                }
                                            } else {
                                                echo "Localidade Invalida.";
                                            }
                                        } else {
                                            echo "Codigo-Postal invalido.";
                                        }
                                    } else {
                                        echo "Nome invalido.";
                                    }
                                } else {
                                    echo "Morada invalida.";
                                }
                            } else {
                                echo "NIF invalido.";
                            }
                        }
                                ?>

                            </div>
                            <!-- Shipment Information Block Ends -->
                        </div>

                    </div>
                </section>
                <!-- Shipping Section Ends -->
                <?php
            } else {
                ?>
                <h3>Não tem nada no carrinho! :)</h3>
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
                var res = confirm("Este artigo será removido, continuar?");
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