<div class="main-header">
    <div class="container">
        <div class="row">
            <!-- Logo Starts -->
            <div class="col-md-4">
                <div id="logo">
                    <h1>PCmaisUM</h1>
                </div>
            </div>
            <!-- Logo Starts -->	
            <!-- Search Starts -->
            <div class="col-md-4">
                <div id="search">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg"  name="search_text" id="search_text" placeholder="Nome do produto">
                        <span class="input-group-btn">
                            <button class="btn btn-lg" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div id="result"></div>	
            </div>
            <!-- Search Ends -->			
            <!-- Shopping Cart Starts -->
            <div class="col-md-4">
                <div id="cart" class="btn-group btn-block">
                    <?php
                    if (isset($_SESSION['id_user'])) { 
                        $query_cart = mysqli_query($conn, "Select * FROM carrinho "
                                . "WHERE ((id_user = '" . $_SESSION['id_user'] . "') AND (desejo = '0'))");
                        $num_rows_cart = mysqli_num_rows($query_cart);
                        ?>
                        <button type="button" data-toggle="dropdown" class="btn btn-block btn-lg dropdown-toggle">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="hidden-md">Carrinho:</span> 
                            <span id="cart-total"><?php echo $num_rows_cart; ?> item(s)</span>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <?php
                            if ($num_rows_cart > 0) {
                                ?>
                                <li>
                                    <table class="table hcart">
                                        <tbody>
                                            <?php
                                            $PRECOTOTAL = 0;
                                            while ($row_cart = mysqli_fetch_assoc($query_cart)) {
                                                $row_produto_cart = mysqli_fetch_assoc(mysqli_query($conn, "Select * FROM produtos "
                                                                . "where (CODIGO = '" . $row_cart['CODIGO'] . "')"));
                                                $STDISP = $row_produto_cart['stock'];
                                                $PRECO = $row_produto_cart['preco'];
                                                $quantidade = $row_cart['quantidade'];

                                                $PRECO = ($PRECO * $quantidade);

                                                $PRECOTOTAL = ($PRECO + $PRECOTOTAL);

                                                
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <a href="./produto_single.php?codigo=<?php echo $row_cart['CODIGO']; ?>"><img style="max-width: 30px;" src="images/produtos/<?php echo $row_cart['CODIGO']; ?>.jpg"></a>
                                                    </td>
                                                    <td style="max-width: 70px!important; vertical-align: middle;">
                                                        <a href="./produto_single.php?codigo=<?php echo $row_cart['CODIGO']; ?>"><?php echo $row_produto_cart['abrev']; ?></a>
                                                    </td>
                                                    <td style="text-align: right; vertical-align: middle;">x<?php echo $quantidade; ?></td>
                                                    <td style="text-align: right; vertical-align: middle;"><?php echo number_format($PRECO, 2, ',', ' ') . " €"; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6" class="text-right">
                                                    <strong>Total</strong>: <?php echo number_format($PRECOTOTAL, 2, ',', ' ') . " €"; ?><br>
                                                    <p class="text-right btn-block1">
                                                        <a href="./carrinho.php">
                                                            Checkout
                                                        </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <h6 class="text-center" style="color: white;">Carrinho Vaziooo!</h6>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <button type="button" data-toggle="dropdown" class="btn btn-block btn-lg dropdown-toggle">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="hidden-md">Carrinho:</span> 
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <button class="btn btn-cart" style="background-color: red;">
                                    <a href="./login.php" style="color: black; text-decoration: none;">Login</a>
                                </button>
                            </ul>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- Shopping Cart Ends -->
        </div>
    </div>
</div>