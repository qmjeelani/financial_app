<!-- begin SIDE NAVIGATION -->
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                        <img class="img-circle" src="img/profile-pic.jpg" alt="">
                        <p class="welcome">
                            <i class="fa fa-key"></i> Logged in as
                        </p>
                        <p class="name tooltip-sidebar-logout">
                            <?php echo $_SESSION['name']; ?>
                            <span class="last-name"></span> <a style="color: inherit" class="logout_open" href="login.php?logout=1" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
<!--                    <li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>-->
                    <!-- end SIDE NAV SEARCH -->
                    <!-- begin DASHBOARD LINK -->
                     <li class="panel">
                            <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#tables">
                                <i class="fa fa-table"></i> Management <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="collapse nav in" id="tables">
                                <?php if($_SESSION['uid'] != '4') { ?>
                                <li>
                                    <a class="" href="index.php">
                                        <i class="fa fa-angle-double-right"></i> KPI's
                                    </a>
                                </li>
                                <li>
                                    <a  href="assumptions.php">
                                        <i class="fa fa-angle-double-right"></i> Assumptions
                                    </a>
                                </li>
                                <li>
                                    <a  href="pnl.php">
                                        <i class="fa fa-angle-double-right"></i> Profit and Loss
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if($_SESSION['uid'] == '4') { 
                                   $branches = $heads->getbranches(); 
                                   //print_r($branches);
                                   //exit;
                                   foreach ($branches as $key => $value) {
                                       ?>
                                <li>
                                    <a  href="pnl.php?id=<?php echo $key; ?>">
                                        <i class="fa fa-angle-double-right"></i>P & L <?php echo $value; ?> 
                                    </a>
                                </li>
                                
                                <?php
                                       
                                   }
                                    ?>
                                <li>
                                    <a  href="pnl_cons.php">
                                        <i class="fa fa-angle-double-right"></i> Consolidated Profit and Loss
                                    </a>
                                </li>
                                <?php } ?>
<!--                                <li>
                                    <a href="franchisepackages.php">
                                        <i class="fa fa-angle-double-right"></i> Franchise Packages
                                    </a>
                                </li>-->
                            </ul>
                        </li>
                    <!-- end PAGES DROPDOWN -->
                </ul>
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->