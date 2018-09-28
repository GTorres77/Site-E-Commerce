<div class="header-top">
    <div class="container">
        <div class="row">
            <!-- Header Links Starts -->
            <div class="col-sm-8 col-xs-12">
                <div class="header-links">
                    <ul class="nav navbar-nav pull-left">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home hidden-lg hidden-md" title="Início"></i>
                                <span class="hidden-sm hidden-xs">
                                    Início
                                </span>
                            </a>
                        </li>
                        <?php
                        if (isset($_SESSION['id_user'])) { 
                            ?>
                            <li>
                                <a href="desejos.php">	
                                    <i class="fa fa-heart hidden-lg hidden-md" title="Desejos"></i>
                                    <span class="hidden-sm hidden-xs">
                                        Wish
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="carrinho.php">
                                    <i class="fa fa-shopping-cart hidden-lg hidden-md" title="Carrinho"></i>
                                    <span class="hidden-sm hidden-xs">
                                        Carrinho
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="inc/sair.php">
                                    <i class="fa fa-shopping-cart hidden-lg hidden-md" title="Sair"></i>
                                    <span class="hidden-sm hidden-xs">
                                        Sair
                                    </span>
                                </a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="registo.php">
                                    <i class="fa fa-unlock hidden-lg hidden-md" title="Registar"></i>
                                    <span class="hidden-sm hidden-xs">
                                        Registar
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="login.php">
                                    <i class="fa fa-lock hidden-lg hidden-md" title="Entrar"></i>
                                    <span class="hidden-sm hidden-xs">
                                        Entrar
                                    </span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- Header Links Ends -->
            <div class="col-sm-4 col-xs-12">
                <div class="pull-right">
                    <div class="btn-group">
                        <button class="btn btn-link">
                            <?php
                            if (isset($_SESSION['id_user'])) { 
                                echo $_SESSION['user'];
                            }
                            ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>