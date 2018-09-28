<div class="container">
    <nav id="main-menu" class="navbar" role="navigation">
        <div class="container-fluid">
            <!-- Nav Header Starts -->
            <div class="navbar-header">
                <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- Nav Header Ends -->
            <!-- Navbar Cat collapse Starts -->
            <div class="collapse navbar-collapse navbar-cat-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    $query_grupos = mysqli_query($conn, "Select * FROM categorias "
                            . "WHERE (COD != '00000') "
                            . "ORDER BY DESCR ASC ");
                    while ($row_grupos = mysqli_fetch_assoc($query_grupos)) {
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
                                <?php echo $row_grupos['DESCR']; ?>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                $grupo = $row_grupos['COD'];
                                $query_subcategoria = mysqli_query($conn, "Select * FROM subcategorias "
                                        . "WHERE ((categ = '$grupo') AND (COD != '00000'))");
                                while ($row_familias = mysqli_fetch_assoc($query_subcategoria)) {
                                    ?>
                                    <li><a href="./produtos.php?grupo=<?php echo $row_grupos['COD']; ?>&familia=<?php echo $row_familias['COD']; ?>"><?php echo $row_familias['descr']; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- Navbar Cat collapse Ends -->
        </div>
    </nav>
</div>