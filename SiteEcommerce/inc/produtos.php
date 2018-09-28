<section class="products-list">			
    <!-- Heading Starts -->
    <h2 class="product-head">Produtos</h2>
    <!-- Heading Ends -->
    <!-- Products Row Starts -->
    <div class="row">
        <!-- Product #1 Starts -->
        <?php
        $query_ultimos_prod = mysqli_query($conn, "Select * FROM produtos "
                . "ORDER BY preco DESC "
                . "LIMIT 10");
        $num_rows_produtos = mysqli_num_rows($query_ultimos_prod);

        if ($num_rows_produtos > 0) {
            while ($row_produto = mysqli_fetch_assoc($query_ultimos_prod)) {
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
            <b class="span3">A loja está vazia</b>
            <?php
        }
        ?>
    </div>
</section>