<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::user()->role_id == 3)
            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('dashboard') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('dashboard') }}>
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('mobil.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('mobil.index') }}>
                    <i class="bi bi-car-front-fill"></i>
                    <span>Mobil</span>
                </a>
            </li><!-- End Mobil Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('mitra.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('mitra.index') }}>
                    <i class="bi bi-people-fill"></i>
                    <span>Mitra</span>
                </a>
            </li><!-- End Mitra Nav -->
        @else
            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('dashboard') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('dashboard') }}>
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('mobil.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('mobil.index') }}>
                    <i class="bi bi-car-front-fill"></i>
                    <span>Mobil</span>
                </a>
            </li><!-- End Mobil Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('mitra.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('mitra.index') }}>
                    <i class="bi bi-people-fill"></i>
                    <span>Mitra</span>
                </a>
            </li><!-- End Mitra Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('user.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('user.index') }}>
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li><!-- End Mitra Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('role.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('role.index') }}>
                    <i class="bi bi-person-rolodex"></i>
                    <span>Role</span>
                </a>
            </li><!-- End Role Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('bahanbakar.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('bahanbakar.index') }}>
                    <i class="bi bi-fuel-pump"></i>
                    <span>Bahan Bakar</span>
                </a>
            </li><!-- End Bahan Bakar Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style="{{ Route::is('merek.index') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                    href={{ route('merek.index') }}>
                    <i class="bi bi-card-list"></i>
                    <span>Merek</span>
                </a>
            </li><!-- End Merek Nav -->
        @endif

        {{-- <li class="nav-item">
            <a class="nav-link collapsed"
                style="{{ Route::is('pages-blank') ? 'background: #f6f9ff; color: #4154f1' : '' }}"
                href={{ route('pages-blank') }}>
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Alerts</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Accordion</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Badges</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Buttons</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Cards</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>List group</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Modal</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Tabs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Pagination</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Progress</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Spinners</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Tooltips</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Chart.js</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>ApexCharts</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Remix Icons</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Boxicons</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav --> --}}

    </ul>

</aside><!-- End Sidebar-->
