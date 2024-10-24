
<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        {{--<div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Dashboard</h5>
                <div>
                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>--}}
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="ph-house"></i>
                        <span>
                            Dashboard
                            <span class="d-block fw-normal opacity-50">No pendings</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-note-blank"></i>
                        <span>Starter kit</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_static.html" class="nav-link">Static layout</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_no_header.html" class="nav-link">No header</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_no_footer.html" class="nav-link">No footer</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_fixed_header.html" class="nav-link">Fixed header</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_fixed_footer.html" class="nav-link">Fixed footer</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_2_sidebars_1_side.html" class="nav-link">2 sidebars on 1 side</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_2_sidebars_2_sides.html" class="nav-link">2 sidebars on 2 sides</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_3_sidebars.html" class="nav-link">3 sidebars</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_boxed_page.html" class="nav-link">Boxed page</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/demo/template/html/layout_1/seed/layout_boxed_content.html" class="nav-link">Boxed content</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="https://demo.interface.club/limitless/demo/docs/other_changelog.html" class="nav-link">
                        <i class="ph-list-numbers"></i>
                        <span>Changelog</span>
                        <span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>
                    </a>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Payment & Plans</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.plans.index') }}" class="nav-link">
                        <i class="ph-folder-dotted"></i>
                        <span>Plans</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subscriptions.list') }}" class="nav-link">
                        <i class="ph-folder-open"></i>
                        <span>Subscriptions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.transactions.list') }}" class="nav-link">
                        <i class="ph-currency-circle-dollar"></i>
                        <span>Transactions</span>
                    </a>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Settings</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.edit') }}" class="nav-link">
                        <i class="ph-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Role & Permissions</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="ph-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i class="ph-user-switch"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                        <i class="ph-list-plus"></i>
                        <span>Permissions</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
