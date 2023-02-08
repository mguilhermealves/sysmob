<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">SMB</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SYS</b>MOB</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li>
                                    <!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li>
                                    <!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li>
                                    <!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?php print($_SESSION[constant("cAppKey")]["credential"]["first_name"]) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p><?php print($_SESSION[constant("cAppKey")]["credential"]["first_name"]) ?></p>
                            <br>
                            <p><?php print($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["name"]) ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Meus Dados</a>
                            </div>
                            <div class="pull-right">
                                <a href="/?logout=yes" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left info">
                <p><?php print($_SESSION[constant("cAppKey")]["credential"]["first_name"] . " - " . $_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["name"]) ?>
                </p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="/"><i class="fa fa-home"></i> <span>Home</span></a>
            </li>

            <?php
            $b = new menus_model();
            $b->set_filter(array("active = 'yes'", " parent = -1 ", " active = 'yes' ", " idx in ( select menus_profiles.menus_id from menus_profiles where menus_profiles.active = 'yes' and menus_profiles.profiles_id in ('" . implode("','", isset($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]) ? array_column($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"], "idx") : array(0))  . "') ) "));
            $b->set_order(array(" position asc "));
            $b->load_data();
            $b->attach(array("urls"));
            $b->join("menus", "menus", array("parent" => "idx"), " and idx in ( select menus_profiles.menus_id from menus_profiles where menus_profiles.active = 'yes' and menus_profiles.profiles_id in ('" . implode("','", isset($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]) ? array_column($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"], "idx") : array(0))  . "') ) ");
            $b->attach_son("menus", array("urls"));

            foreach ($b->data as $k => $v) {
                if (isset($v["menus_attach"])) {
            ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="<?php print("fa fa-" . $v["icon"]) ?>"></i> <span><?php print($v["name"]) ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php foreach ($v["menus_attach"] as $r) { ?>
                                <li class="active"><a href="<?php print($GLOBALS[$r["urls_attach"][0]["slug"] . "_url"]) ?>"><i class="fa fa-circle-o"></i> <?php print($r["name"]) ?></a></li>

                            <?php } ?>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="<?php print($GLOBALS[$r["urls_attach"][0]["slug"] . "_url"]) ?>"><i class="fa fa-<?php print($v["icon"]); ?>"></i> <span><?php print($v["name"]) ?></span></a>
                    </li>
            <?php }
            }  ?>
        </ul>
    </section>
</aside>