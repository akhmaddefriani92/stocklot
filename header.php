<?php include 'lib/config.php'; ?>
<?php include 'lib/show-cart.php'; ?>

        <div class="nav-container">
            <a id="top"></a>
            <nav>
                <div class="nav-bar">
                    <div class="module left">
                        <a href="home.php">
                            <img class="logo logo-light" alt="Foundry" src="img/logo-light.png" />
                            <img class="logo logo-dark" alt="Foundry" src="img/logo-dark.png" />
                        </a>
                    </div>
                    <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="module-group right">
                        <div class="module left">
                            <ul class="menu">
                                <li class="">
                                    <a href="home.php">
                                        HOME
                                    </a> 
                                </li>
                                <li class="">
                                    <a href="about-us.php">
                                        ABOUT
                                    </a>
                                </li>
                                <li class="has-dropdown">
                                    <a href="shop.php">
                                        Shop
                                    </a>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a href="/shop">
                                                T-shirt
                                            </a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="shop/">
                                                Shoes
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="contact-us.php">
                                        CONTACT US
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end of menu module-->
                        <div class="module widget-handle search-widget-handle left">
                            <div class="search">
                                <i class="ti-search"></i>
                                <span class="title">Search Site</span>
                            </div>
                            <div class="function">
                                <form class="search-form" method="GET" action="shop.php?page=1"> <input type="hidden" name="page" value="1" />
                                    <input type="text" name="search" placeholder="Type Here" />
                                </form>
                            </div>
                        </div>
                        
                                    


        <?php cart_nav(); ?>




                        <div class="module widget-handle left">
                            <ul class="menu">
                                <li class="has-dropdown">
                                    <a>ACCOUNT</a>
                                    <ul>


                            <?php
                             
                            // if the session is not set
                            if( !isset($_SESSION['user']) ) {
                                echo "                                    
                                    <li>
                                        <a href='register.php'>Register</a>
                                    </li>
                                    <li>
                                        <a href='login.php'>Sign In</a>
                                    </li>
                                ";
                            }
                            else{
                                echo "
                                    <li>
                                        <a href='account.php'>My Account</a>
                                    </li>
                                    <li>
                                        <a href='logout.php'>Sign Out</a>
                                    </li>
                                ";
                            }
                            ?>

          
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end of module group-->
                </div>
            </nav>
        </div>