		<header id="page-topbar">
		    <div class="layout-width">
		        <div class="navbar-header">
		            <div class="d-flex">
		                <!-- LOGO -->
		                <div class="navbar-brand-box horizontal-logo">
		                    <a href="index.html" class="logo logo-dark">
		                        <span class="logo-sm">
		                            <img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="22">
		                        </span>
		                        <span class="logo-lg">
		                            <img src="<?= BASE_PATH ?>public/images/logo-dark.png" alt="" height="17">
		                        </span>
		                    </a>

		                    <a href="index.html" class="logo logo-light">
		                        <span class="logo-sm">
		                            <img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="22">
		                        </span>
		                        <span class="logo-lg">
		                            <img src="<?= BASE_PATH ?>public/images/logo-light.png" alt="" height="17">
		                        </span>
		                    </a>
		                </div>

		                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
		                    <span class="hamburger-icon">
		                        <span></span>
		                        <span></span>
		                        <span></span>
		                    </span>
		                </button>
		            </div>

		            <div class="d-flex align-items-center">

		                <div class="dropdown d-md-none topbar-head-dropdown header-item">
		                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                        <i class="bx bx-search fs-22"></i>
		                    </button>
		                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
		                        <form class="p-3">
		                            <div class="form-group m-0">
		                                <div class="input-group">
		                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
		                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
		                                </div>
		                            </div>
		                        </form>
		                    </div>
		                </div>
	                

		                <div class="dropdown topbar-head-dropdown ms-1 header-item">
		                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
		                        <i class='bx bx-shopping-bag fs-22'></i>
		                        <span class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">5</span>
		                    </button>
		                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart" aria-labelledby="page-header-cart-dropdown">
		                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
		                            <div class="row align-items-center">
		                                <div class="col">
		                                    <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
		                                </div>
		                                <div class="col-auto">
		                                    <span class="badge badge-soft-warning fs-13"><span class="cartitem-badge">7</span>
		                                        items</span>
		                                </div>
		                            </div>
		                        </div>
		                        <div data-simplebar style="max-height: 300px;">
		                            <div class="p-2">
		                                
		                                <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
		                                    <div class="d-flex align-items-center">
		                                        <img src="<?= BASE_PATH ?>public/images/products/img-5.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
		                                        <div class="flex-1">
		                                            <h6 class="mt-0 mb-1 fs-14">
		                                                <a href="apps-ecommerce-product-details.html" class="text-reset">Stillbird Helmet</a>
		                                            </h6>
		                                            <p class="mb-0 fs-12 text-muted">
		                                                Quantity: <span>2 x $495</span>
		                                            </p>
		                                        </div>
		                                        <div class="px-2">
		                                            <h5 class="m-0 fw-normal">$<span class="cart-item-price">990</span></h5>
		                                        </div>
		                                        <div class="ps-2">
		                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border" id="checkout-elem">
		                            <div class="d-flex justify-content-between align-items-center pb-3">
		                                <h5 class="m-0 text-muted">Total:</h5>
		                                <div class="px-2">
		                                    <h5 class="m-0" id="cart-item-total">$1258.58</h5>
		                                </div>
		                            </div>

		                            <a href="apps-ecommerce-checkout.html" class="btn btn-success text-center w-100">
		                                Checkout
		                            </a>
		                        </div>
		                    </div>
		                </div>

		                <div class="ms-1 header-item d-none d-sm-flex">
		                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-toggle="fullscreen">
		                        <i class='bx bx-fullscreen fs-22'></i>
		                    </button>
		                </div>

		                

		                <div class="dropdown topbar-head-dropdown ms-1 header-item">
		                 
		                </div>

		                <div class="dropdown ms-sm-3 header-item topbar-user">
		                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                        <span class="d-flex align-items-center">
		                            <img class="rounded-circle header-profile-user" src="<?= $_SESSION['avatar'] ?>" alt="Header Avatar">
		                            <span class="text-start ms-xl-2">
		                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= $_SESSION['name'] ?></span>
		                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{Aqui va rol}}</span>
		                            </span>
		                        </span>
		                    </button>
		                    <div class="dropdown-menu dropdown-menu-end">
		                        <!-- item-->
		                        <h6 class="dropdown-header">Bienvenido <?= $_SESSION['name'] ?>!</h6>
		                        <a class="dropdown-item" href="<?=BASE_PATH?>perfil"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Perfil</span></a>
		                        <div class="dropdown-divider"></div>
								<form action="<?=BASE_PATH ?>auth" method="POST">
		                        	<button type class="dropdown-item" type="submit"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Cerrar sesión</span></button>
									<input type="hidden" name="action" action="cerrarSesion" value="cerrarSesion">
									<input type="hidden" name="email" value=" <?= $_SESSION['email'] ?>">
                                	<input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
								</form>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>