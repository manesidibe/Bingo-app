<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-image">
        <span class="ms-1 font-weight-bold text-white">Free Senegal</span>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item nav-item-sidebar">
                <a class="nav-link text-white active" href="../pages/dashboard.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-item-sidebar">
                <a class="nav-link text-white " href="campaigns">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-bullhorn opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Campaigns</span>
                </a>
            </li>
            <li class="nav-item nav-item-sidebar">
                <a class="nav-link text-white " href="prizes">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">redeem</i>
                    </div>
                    <span class="nav-link-text ms-1">Prize</span>
                </a>
            </li>
            <li class="nav-item nav-item-sidebar">
                <a class="nav-link text-white " href="/pages/draw.blade.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">celebration</i>
                    </div>
                    <span class="nav-link-text ms-1">Draw</span>
                </a>
            </li>
        </ul>
    </div>
    <hr class="transparent-line"> <!-- Ligne transparente ajoutée ici -->
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link sign-in-button" href="../pages/sign-in.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">login</i>
                </div>
                <span class="nav-link-text ms-1">Sign In</span>
            </a>

        </li>
    </div>
</aside>
