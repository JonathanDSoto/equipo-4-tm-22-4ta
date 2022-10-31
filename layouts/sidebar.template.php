        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Light Logo-->
                <a href="<?= BASE_PATH?>productos/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="70">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= BASE_PATH?>usuarios/">
                                <i class="mdi mdi-shield-account"></i> <span data-key="t-widgets">Usuarios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= BASE_PATH ?>clientes/">
                                <i class="mdi mdi-shield-account-outline"></i> <span data-key="t-widgets">Clientes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= BASE_PATH ?>productos/">
                                <i class="mdi mdi-shopping"></i> <span data-key="t-widgets">Productos</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="mdi mdi-book-open-blank-variant"></i> <span data-key="t-dashboards">Catalogos</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a href="<?=BASE_PATH?>catalogos/categorias" class="nav-link" data-key="t-analytics"> Categorias </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?=BASE_PATH?>catalogos/marcas" class="nav-link" data-key="t-crm"> Marcas </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?=BASE_PATH?>catalogos/tags" class="nav-link" data-key="t-ecommerce"> Tags </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                        

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?=BASE_PATH?>cupones/">
                                <i class="mdi mdi-cash-100"></i> <span data-key="t-widgets">Cupones</span>
                            </a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?=BASE_PATH?>ordenes/">
                                <i class="mdi mdi-order-bool-descending"></i> <span data-key="t-widgets">Ordenes</span>
                            </a>
                        </li> 


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
