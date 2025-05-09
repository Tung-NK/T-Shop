<template>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container-fluid">
            <!-- Logo -->
            <router-link class="navbar-brand" to="/">
                <img src="@/assets/logo.png" alt="T-Shop Logo" style="width: 65px; height: 65px;" />
            </router-link>

            <!-- Toggler (mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main content -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <!-- Menu + Search (center) -->
                <div class="d-flex flex-column flex-lg-row align-items-lg-center mx-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0 d-flex flex-row flex-wrap justify-content-center">
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="/">
                                <i class="bi bi-house-door-fill"></i> Home
                            </router-link>
                        </li>
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="/shop">Shop</router-link>
                        </li>
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="/about">About</router-link>
                        </li>
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="/contact">Contact</router-link>
                        </li>
                    </ul>

                    <!-- Search -->
                    <div class="search-box ms-lg-3 mt-2 mt-lg-0">
                        <input type="text" class="search-input" placeholder="Search..." />
                        <button class="search-button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Icons (right) -->
                <div class="d-flex align-items-center mt-3 mt-lg-0 icons-container">
                    <router-link to="/" class="icon-link me-3">
                        <i class="bi bi-heart"></i>
                    </router-link>
                    <router-link to="/cart" class="icon-link me-3 position-relative">
                        <i class="bi bi-cart"></i>
                        <span class="cart-badge">3</span>
                    </router-link>
                    <router-link to="/login" class="icon-link me-3" style="font-size: 1.5rem;">
                        <i class="bi bi-person"></i>
                    </router-link>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped>
.custom-navbar {
    background-color: #fefefe;
    padding: 12px 24px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.nav-link {
    color: #333;
    font-weight: 500;
}

.search-box {
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 999px;
    padding: 3px 6px;
    border: 1px solid #ccc;
}

.search-input {
    border: none;
    outline: none;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 14px;
    width: 180px;
    max-width: 100%;
}

.search-button {
    background-color: #eee;
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    margin-left: 6px;
}

.search-button:hover {
    background-color: #ddd;
}

.search-button i {
    font-size: 16px;
    color: #555;
}

.icon-link {
    font-size: 20px;
    color: #333;
    position: relative;
}

.icon-link:hover {
    color: #007bff;
}

.cart-badge {
    position: absolute;
    top: -6px;
    right: -10px;
    background-color: #007bff;
    color: white;
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 999px;
}

/* Responsive adjustments */
@media (max-width: 980px) {
    .search-box {
        width: 100%;
        margin-top: 10px;
    }

    .search-input {
        width: 100%;
        max-width: none;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: center;
    }

    .nav-item {
        margin: 5px 0;
    }

    .d-flex.flex-column.flex-lg-row {
        flex-direction: column;
        align-items: center;
    }

    .icons-container {
        justify-content: center;
        width: 100%;
    }
}

@media (max-height: 513px) {
    .search-box {
        padding: 2px 4px;
    }

    .search-input {
        padding: 4px 8px;
        font-size: 12px;
    }

    .search-button {
        width: 28px;
        height: 28px;
    }

    .search-button i {
        font-size: 14px;
    }
}
</style>