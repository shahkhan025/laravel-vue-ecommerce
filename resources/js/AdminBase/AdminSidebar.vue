<template>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">Admin</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <Link href="/dashboard" class="nav-link active">
                            Dashboard
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="/slider-show" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Slider
                            </p>
                        </Link>
                    </li>

                    <li class="nav-item">
                        <Link href="/brand-show" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Brand
                            </p>
                        </Link>
                    </li>

                    <li class="nav-item">
                        <Link href="/category-show" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Category
                            </p>
                        </Link>
                    </li>

                    <li class="nav-item">
                        <Link href="/product-show" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Product
                            </p>
                        </Link>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Layout Options
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation + Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/boxed.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Boxed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Navbar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-footer.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Footer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Collapsed Sidebar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    name: "AdminSidebar",
    components: {
        Link
    },
}
</script>
<style scoped>

</style>
