<!DOCTYPE html>

<html lang="es">

<head>
    <base href="../" />
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <meta property="og:url" content="https://keenthemes.com/metronic" /> --}}
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    {{-- <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> --}}
    <link rel="shortcut icon" href=" {{ asset('assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<!--end::Head-->
<!--begin::Body-->
@php
    $sidebarMinimize = Session::get('estadoMenuminimizado') == '1' ? 'on' : 'off';
@endphp

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default"
    data-kt-app-sidebar-minimize="{{ $sidebarMinimize }}">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex
    flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="/dashboard" class="d-lg-none">
                            <img alt="Logo" src=" {{ asset('assets/media/logos/cimacoop.png') }} " class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">

                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->
                            <div class=" menu  menu-rounded  menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-end"
                                    class="menu-item here menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <a href="/dashboard">
                                        <span class="menu-title">Dashboards</span>
                                        <span class="menu-arrow d-lg-none"></span></a>
                                    <!--end:Menu link-->

                                </div>
                                <!--end:Menu item-->

                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start"
                                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2 hover- ">
                                    <!--begin:Menu link-->
                                    @yield('formName')


                                </div>
                                <!--end:Menu item-->


                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->


                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">


                            <!--begin::Theme mode-->
                            <div class="app-navbar-item ms-1 ms-md-3">
                                <!--begin::Menu toggle-->
                                <a href="#"
                                    class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="ki-outline ki-night-day theme-light-show fs-2 fs-lg-1">
                                    </i>
                                    <i class="ki-outline ki-moon theme-dark-show fs-2 fs-lg-1">
                                    </i>
                                </a>
                                <!--begin::Menu toggle-->

                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2 active" data-kt-element="mode"
                                            data-kt-value="light">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-night-day fs-2"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span><span
                                                        class="path5"></span><span class="path6"></span><span
                                                        class="path7"></span><span class="path8"></span><span
                                                        class="path9"></span><span class="path10"></span></i>
                                            </span>
                                            <span class="menu-title">
                                                Light
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="dark">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span
                                                        class="path2"></span></i> </span>
                                            <span class="menu-title">
                                                Dark
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="system">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span></i>
                                            </span>
                                            <span class="menu-title">
                                                System
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->

                            </div>
                            <!--end::Theme mode-->

                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <span class="menu-icon" data-kt-element="icon">
                                        {{-- <i class="ki-outline ki-profile-circle fs-2 "></i> --}}
                                        <i class="ki-outline ki-profile-circle theme-light-show fs-2 fs-lg-1"></i>
                                        <i class="ki-outline ki-profile-circle theme-dark-show fs-2 fs-lg-1">

                                        </i>
                                    </span>
                                </div>

                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <i class="ki-outline ki-profile-circle theme-light-show fs-2 fs-lg-1">
                                                </i>

                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    @php echo session('name'); @endphp
                                                </div>
                                                @php echo session('email'); @endphp
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="/logout" class="menu-link px-5">
                                            <i class="ki-outline ki-exit-right fs-2 px-2"></i>Cerrar sesión
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->

                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none ms-2 me-n2" title=" header menu">
                                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                                    id="kt_app_header_menu_toggle">
                                    <i class="ki-duotone ki-element-4 fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                            </div>
                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Navbar-->
                    </div>

                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="/dashboard">
                            <img alt="Logo" src=" {{ asset('assets/media/logos/cimacoop.png') }}"
                                class="h-50px app-sidebar-logo-default theme-light-show" />
                            <img alt="Logo" src="{{ asset('assets/media/logos/cimacoop.png') }}"
                                class="h-50px app-sidebar-logo-default theme-dark-show" />
                            <img alt="Logo" src=" {{ asset('assets/media/logos/cimacoop.png') }}"
                                class="h-50px app-sidebar-logo-minimize" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Sidebar toggle-->
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-outline ki-double-left fs-2 rotate-180">
                            </i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                            data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention px-3"
                                id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                <div class="menu-item pt-5">
                                    <!--begin:Menu content-->
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">Menú</span>
                                    </div>
                                    <!--end:Menu content-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->


                                @foreach (Session::get('access') as $access)
                                    @if ($access->is_padre == 1)
                                        @php
                                            $showMenuPadre = Session::get('active_menu_padre') == $access->id_modulo ? 'show' : '';
                                        @endphp
                                        <div data-kt-menu-trigger="click"
                                            class="menu-item menu-accordion {{ $showMenuPadre }}">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="ki-outline {{ $access->icono }} fs-2"></i>

                                                </span>
                                                <span class="menu-title ">{{ $access->nombre }}</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <div class="menu-sub menu-sub-accordion">
                                                @foreach (Session::get('access') as $sub_access)
                                                    @if ($sub_access->id_padre == $access->id_modulo)
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            @php
                                                                $activemenulink = $sub_access->id_modulo == Session::get('active_menu') ? 'active' : '';
                                                            @endphp
                                                            <a class="menu-link {{ $activemenulink }}"
                                                                href="{{ $sub_access->ruta }}"
                                                                target="{{ $sub_access->target == 0 ? '_self' : '_blank' }}">
                                                                <span class="menu-icon">
                                                                    <i
                                                                        class="ki-outline {{ $sub_access->icono }} fs-2"></i>

                                                                </span>
                                                                <span
                                                                    class="menu-title">{{ $sub_access->nombre }}</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->

                </div>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                @yield('content')
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer">
                        <!--begin::Footer container-->
                        <div
                            class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                                <a href="https://www.facebook.com/Consultores.computec/" target="_blank"
                                    class="text-gray-800 text-hover-primary">Computec Consultores</a>
                            </div>
                            <!--end::Copyright-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src=" {{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    {{-- <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script> --}}


    {{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script> --}}


    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <script>
        $(function() {
            let table = new DataTable('.data-table-coop', {
                "dom": 'frtip',
                "searching": true,
                "language": {
                    "search": "Buscar",
                    "searchPlaceholder": "Escribe Aqui ...",
                }
            });
        })

        function showLoading() {
            document.body.prepend(loadingEl);
            loadingEl.classList.add("page-loader");
            loadingEl.classList.add("flex-column");
            loadingEl.classList.add("bg-white");
            loadingEl.classList.add("bg-opacity-75");
            loadingEl.innerHTML = `
                <span class="spinner-border text-primary" role="status"></span>
                <span class="text-gray-800 fs-6 fw-semibold mt-5">Cargando...</span>
            `;

            // Show page loading
            KTApp.showPageLoading();
        }

        function hidenLoading() {
            KTApp.hidePageLoading();
            loadingEl.remove();
        }

        function swalProcessing() {
            const swal = Swal.fire({
                title: 'Cargando...',
                text: 'Espere un momento por favor.',
                allowOutsideClick: false,
                showCancelButton: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                allowEnterKey: false,

            });
        }

        function swalSuccess(title, text, confirmButtonText) {
            Swal.fire({
                icon: 'success',
                title: title,
                text: text,
                confirmButtonText: confirmButtonText,
                customClass: {
                    confirmButton: "btn btn-succes"
                },
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                timer: 1500,
                timerProgressBar: true,
            });
        }

        function swalError(title, text, confirmButtonText) {
            Swal.fire({
                icon: 'success',
                title: title,
                text: text,
                confirmButtonText: confirmButtonText,
                customClass: {
                    confirmButton: "btn btn-danger"
                },
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                timer: 1500,
                timerProgressBar: true,
            });
        }
    </script>
    @yield('scripts')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
