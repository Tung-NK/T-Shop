<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Vue T-shirts</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (request()->routeIs('admin.index')) text-dark @endif"
                        aria-current="page" href="{{ route('admin.index') }}">
                        <i class="fas fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (request()->routeIs('admin.category*')) text-dark @endif"
                        aria-current="page" href="{{ route('admin.category.index') }}">
                        <i class="fa-solid fa-layer-group"></i>
                        Categories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (request()->routeIs('admin.brand*')) text-dark @endif"
                        aria-current="page" href="{{ route('admin.brand.index') }}">
                        <i class="fa-solid fa-copyright"></i>
                        Brands
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (request()->routeIs('admin.color*')) text-dark @endif"
                        aria-current="page" href="{{ route('admin.color.index') }}">
                        <i class="fa-solid fa-palette"></i>
                        Colors
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.size*')) text-dark @endif" aria-current="page" href="{{route('admin.size.index')}}">
                        <i class="fa-solid fa-expand"></i>
                        Sizes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.product*')) text-dark @endif" aria-current="page" href="{{route('admin.product.index')}}">
                        <i class="fa-solid fa-tag"></i>
                        Products
                    </a>
                </li>

            </ul>
            <hr class="my-3">
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center gap-2">
                        <i class="fas fa-user"></i>
                        {{ auth()->guard('admin')->user()->name }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" onclick="document.getElementById('adminLogoutForm').submit()"
                        class="nav-link d-flex align-items-center gap-2">
                        <i class="fas fa-sign-out"></i>
                        Sign out
                    </a>
                    <form id="adminLogoutForm" action="{{ route('admin.logout') }}" method="post">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
