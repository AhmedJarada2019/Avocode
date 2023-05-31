<!DOCTYPE html>
<html class="loaded semi-dark-layout" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        @yield('title')
    </title>
    <link rel="apple-touch-icon" href="{{asset('dashboard/app-assets/images/ico/apple-icon-120.png')}}">
    {{--    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/app-assets/images/ico/favicon.ico')}}">--}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/vendors'.rtl_assets().'.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css'.rtl_assets().'/colors.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/components.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/themes/bordered-layout.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/themes/semi-dark-layout.min.css')}}">

    {{--    <!-- BEGIN: Page CSS-->--}}
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/css'.rtl_assets().'/plugins/extensions/ext-component-toastr.min.css')}}">
    <!-- END: Page CSS-->
    @yield('styles')

    <!-- BEGIN: Custom CSS-->
    @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')

        <style>
            div#chartdiv2 {
                direction: ltr;
            }

            div#chartdiv1 {
                direction: ltr;
            }

            div#chartdiv_line {
                direction: ltr;
            }

            div#chartdiv {
                direction: ltr;
            }

            .table td, .table th {
                padding: 0.72rem 0.5rem;
            }

            .main-menu .navbar-header {
                height: unset !important;
            }

            ::-webkit-scrollbar {
                width: 20px;
            }

            ::-webkit-scrollbar-track {
                background-color: transparent;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #d6dee1;
                border-radius: 20px;
                border: 6px solid transparent;
                background-clip: content-box;
            }

            ::-webkit-scrollbar-thumb:hover {
                background-color: #a8bbbf;
            }

        </style>

        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboard/app-assets/css'.rtl_assets().'/custom'.rtl_assets().'.min.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/style'.rtl_assets().'.css')}}">
    <!-- END: Custom CSS-->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
          rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }

        .dataTables_wrapper {
            margin: 30px;
        }

    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow bg-primary navbar-dark">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="selected-language">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           data-language="{{ $localeCode }}">{{ $properties['native'] }}</a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item dropdown dropdown-notification">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="selected-language">@lang('notifications')</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="badge badge-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                    <div class="notification-scroll">
                        <div class="dropdown-item">
                            <div class="bodyData" style="overflow: auto;height: 500px;"></div>

                        </div>

                    </div>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                   id="dropdown-user" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="font-weight-bolder">
                            {{auth('admin')->user()->name}}
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{url('/admin/profile')}}"><i class="mr-50" data-feather="user"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mr-50" data-feather="power"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="get"
                          style="display: none;">
                        @method('get')
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-accordion menu-shadow menu-dark" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item" style="margin: 0 auto;"><a class="navbar-brand"
                                                            href="{{url('/admin/dashboard')}}"><span
                        class="brand-logo"></span>

                    <img src="{{ asset('assets/admin/img/logo/logo-white.png') }}" width="220"
                         alt="logo">

                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a class="d-flex align-items-center"
                                     href="{{url('/admin/dashboard')}}"><i data-feather="home">

                    </i><span class="menu-title text-truncate" data-i18n="Dashboards">@lang('dashboards')</span>
                    {{--                    <span class="badge badge-light-warning rounded-pill ms-auto me-1"></span>--}}
                </a>
                <ul class="menu-content">
                    @if(auth('admin')->check() && auth('admin')->user()->role == \App\Models\Admin::ADMIN )

                        <li><a class="d-flex align-items-center" href="{{url('/admin/dashboard')}}">
                                <i data-feather="circle"></i><span class="menu-item text-truncate"
                                                                   data-i18n="Analytics">@lang('home')</span></a>
                        </li>
                    @endif
                    <li><a class="d-flex align-items-center"
                           href="{{url('/admin/dashboard/analytics')}}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="eCommerce">@lang('analytics')</span></a>
                    </li>
                </ul>
            </li>

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
                    && auth('admin')->user()->hasAnyPermission(['ads']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'ads' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/ads')}}">
                        <i data-feather="layout"></i><span class="menu-title text-truncate">@lang('ads')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role == \App\Models\Admin::ADMIN
               )

                <li class="nav-item {{explode('/',\Request::path())[2] == 'admins' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/admins')}}">
                        <i data-feather="user"></i><span class="menu-title text-truncate">@lang('admins')</span>
                    </a>
                </li>
            @endif


            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
  && auth('admin')->user()->hasAnyPermission(['countries']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'countries' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('countries.index') }}">
                        <i data-feather="flag"></i><span class="menu-title text-truncate">@lang('countries')</span>
                    </a>
                </li>
            @endif
            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
  && auth('admin')->user()->hasAnyPermission(['cities']))

                <li class="nav-item {{explode('/',\Request::path())[2] == 'cities' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/cities')}}">
                        <i data-feather="map"></i><span class="menu-title text-truncate">@lang('cities')</span>
                    </a>
                </li>
            @endif
            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
                && auth('admin')->user()->hasAnyPermission(['users']))

                <li class="nav-item {{explode('/',\Request::path())[2] == 'users' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/users')}}">
                        <i data-feather="users"></i><span class="menu-title text-truncate">@lang('users')</span>
                    </a>
                </li>
            @endif
            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
 && auth('admin')->user()->hasAnyPermission(['merchants']))

                <li class="nav-item {{explode('/',\Request::path())[2] == 'merchants' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/merchants')}}">
                        <i data-feather="user-check"></i><span
                            class="menu-title text-truncate">@lang('merchants')</span>
                    </a>
                </li>
            @endif
            @if(auth('admin')->check() && auth('admin')->user()->role == \App\Models\Admin::ADMIN)
                {{-- && auth('admin')->user()->hasAnyPermission(['merchants']--}}

                <li class="nav-item {{explode('/',\Request::path())[2] == 'merchant_accounts' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/merchant_accounts')}}">
                        <i data-feather="user-check"></i><span
                            class="menu-title text-truncate">@lang('merchant_accounts')</span>
                    </a>
                </li>
            @endif


            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
 && auth('admin')->user()->hasAnyPermission(['notifications']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'notifications' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/notifications')}}">
                        <i data-feather="bell"></i><span class="menu-title text-truncate">@lang('notifications')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
    && auth('admin')->user()->hasAnyPermission(['contacts']))

                {{--            @if(auth()->user()->hasAnyPermission(['contacts']))--}}
                <li class="nav-item {{explode('/',\Request::path())[2] == 'contacts' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/contacts')}}">
                        <i data-feather="message-square"></i><span
                            class="menu-title text-truncate">@lang('contacts')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
         && auth('admin')->user()->hasAnyPermission(['categories']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'categories' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/categories')}}">
                        <i data-feather="grid"></i><span class="menu-title text-truncate">@lang('categories')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check()&& auth('admin')->user()->role != \App\Models\Admin::MERCHANT
           && auth('admin')->user()->hasAnyPermission(['brands']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'brands' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/brands')}}">
                        <i data-feather="award"></i><span class="menu-title text-truncate">@lang('brands')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
           && auth('admin')->user()->hasAnyPermission(['colors']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'colors' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/colors')}}">
                        <i data-feather="circle"></i><span class="menu-title text-truncate">@lang('colors')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
         && auth('admin')->user()->hasAnyPermission(['sizes']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'sizes' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/sizes')}}">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                             style="enable-background:new 0 0 512 512;fill:rgb(244 245 248) !important;"
                             xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M148.454,147.934c-1.664-5.291-7.303-8.23-12.59-6.564c-5.289,1.664-8.227,7.301-6.564,12.589
                                        c0.802,2.55,1.209,5.214,1.209,7.923c0,14.536-11.822,26.363-26.353,26.363c-14.536,0-26.363-11.826-26.363-26.363
                                        c0-14.532,11.826-26.353,26.363-26.353c2.618,0,5.201,0.381,7.677,1.132c5.306,1.61,10.912-1.384,12.523-6.689
                                        c1.61-5.306-1.384-10.912-6.69-12.523c-4.367-1.326-8.912-1.999-13.509-1.999c-25.608,0-46.441,20.829-46.441,46.431
                                        c0,25.608,20.833,46.441,46.441,46.441c25.602,0,46.431-20.833,46.431-46.441C150.588,157.129,149.87,152.436,148.454,147.934z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M501.961,379.482c-5.545,0-10.039,4.496-10.039,10.039v8.031c0,5.544,4.495,10.039,10.039,10.039S512,403.097,512,397.553
			                            v-8.031C512,383.978,507.505,379.482,501.961,379.482z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M501.961,369.443c5.545,0,10.039-4.496,10.039-10.039V256c0-5.544-4.495-10.039-10.039-10.039H165.553
                                            c25.898-18.966,42.752-49.589,42.752-84.078c0-57.426-46.72-104.147-104.147-104.147C46.725,57.736,0,104.456,0,161.882v188.235
                                            c0,57.426,46.725,104.147,104.157,104.147h397.804c5.545,0,10.039-4.496,10.039-10.039v-16.555
                                            c0-5.544-4.495-10.039-10.039-10.039s-10.039,4.496-10.039,10.039v6.515h-80.314V266.039h80.314v93.365
                                            C491.922,364.948,496.416,369.443,501.961,369.443z M104.157,77.814c46.355,0,84.068,37.712,84.068,84.068
                                            c0,46.361-37.713,84.078-84.068,84.078c-46.361,0-84.078-37.717-84.078-84.078C20.078,115.526,57.796,77.814,104.157,77.814z
                                             M391.529,434.186h-36.141v-26.815c0-5.544-4.495-10.039-10.039-10.039s-10.039,4.496-10.039,10.039v26.815h-34.806v-8.384
                                            c0-5.544-4.495-10.039-10.039-10.039s-10.039,4.496-10.039,10.039v8.384H245.63v-26.815c0-5.544-4.495-10.039-10.039-10.039
                                            c-5.545,0-10.039,4.496-10.039,10.039v26.815h-34.806v-8.384c0-5.544-4.495-10.039-10.039-10.039
                                            c-5.545,0-10.039,4.496-10.039,10.039v8.384h-34.806v-26.815c0-5.544-4.495-10.039-10.039-10.039
                                            c-5.545,0-10.039,4.496-10.039,10.039v26.815h-11.625c-8.037,0-15.805-1.156-23.17-3.273v-11.786
                                            c0-5.544-4.495-10.039-10.039-10.039c-5.545,0-10.039,4.496-10.039,10.039v3.053c-24.443-14.721-40.83-41.511-40.83-72.063
                                            V223.283c18.966,25.901,49.589,42.756,84.078,42.756h11.625v26.815c0,5.544,4.495,10.039,10.039,10.039
                                            c5.545,0,10.039-4.496,10.039-10.039v-26.815h89.69v26.815c0,5.544,4.495,10.039,10.039,10.039
                                            c5.545,0,10.039-4.496,10.039-10.039v-26.815h89.68v26.815c0,5.544,4.495,10.039,10.039,10.039s10.039-4.496,10.039-10.039
                                            v-26.815h36.141V434.186z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M451.765,323.012c-14.946,0-27.106,12.159-27.106,27.106c0,14.946,12.159,27.106,27.106,27.106
                                            c14.946,0,27.106-12.16,27.106-27.106C478.871,335.171,466.711,323.012,451.765,323.012z M451.765,357.145
                                            c-3.875,0-7.027-3.153-7.027-7.027s3.152-7.027,7.027-7.027s7.027,3.153,7.027,7.027S455.64,357.145,451.765,357.145z"></path>
                                </g>
                            </g>
                        </svg>

                        <span class="menu-title text-truncate">@lang('sizes')</span>
                    </a>
                </li>
            @endif



            @if(auth('admin')->check()  && auth('admin')->user()->hasAnyPermission(['products']) ||
               auth('admin')->check()  &&  auth('admin')->user()->role == \App\Models\Admin::MERCHANT)

                <li class="nav-item {{explode('/',\Request::path())[2] == 'products' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/products')}}">
                        <i data-feather="grid"></i><span class="menu-title text-truncate">@lang('products')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() &&  auth('admin')->user()->role != \App\Models\Admin::MERCHANT
                 && auth('admin')->user()->hasAnyPermission(['point_shop']))

                <li class="nav-item {{explode('/',\Request::path())[2] == 'point_shop' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/point_shop')}}">
                        <i data-feather="grid"></i><span class="menu-title text-truncate">@lang('point_shop')</span>
                    </a>
                </li>
            @endif




            @if(auth('admin')->check()&& auth('admin')->user()->hasAnyPermission(['non_existent_products'])
||  auth('admin')->check()  &&  auth('admin')->user()->role == \App\Models\Admin::MERCHANT)
                <li class="nav-item {{explode('/',\Request::path())[2] == 'non_existent_products' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/non_existent_products')}}">
                        <i data-feather="grid"></i><span
                            class="menu-title text-truncate">@lang('non_existent_product')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check()  && auth('admin')->user()->hasAnyPermission(['discounts']) ||
                        auth('admin')->check()  &&  auth('admin')->user()->role == \App\Models\Admin::MERCHANT)
                <li class="nav-item {{explode('/',\Request::path())[2] == 'discounts' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/discounts')}}">
                        <i data-feather="percent"></i><span class="menu-title text-truncate">@lang('discounts')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check()  && auth('admin')->user()->hasAnyPermission(['delivery_discounts']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'delivery_discounts' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/delivery_discounts')}}">
                        <i data-feather="percent"></i><span
                            class="menu-title text-truncate">@lang('delivery_discounts')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check()  && auth('admin')->user()->hasAnyPermission(['point_programs']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'point_programs' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/point_programs')}}">
                        <i data-feather="percent"></i><span
                            class="menu-title text-truncate">@lang('point_programs')</span>
                    </a>
                </li>
            @endif



            @if(auth('admin')->check()  && auth('admin')->user()->role != \App\Models\Admin::MERCHANT)
                <li class="nav-item {{explode('/',\Request::path())[2] == 'coupons' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/coupons')}}">
                        <i data-feather="percent"></i><span class="menu-title text-truncate">@lang('coupons')</span>
                    </a>
                </li>
            @endif



            @if(auth('admin')->check()  && auth('admin')->user()->hasAnyPermission(['orders']) ||
               auth('admin')->check()  &&  auth('admin')->user()->role == \App\Models\Admin::MERCHANT)
                <li class="nav-item {{explode('/',\Request::path())[2] == 'orders' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/orders')}}">
                        <i data-feather="columns"></i><span class="menu-title text-truncate">@lang('orders')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() &&  auth('admin')->user()->role != \App\Models\Admin::MERCHANT
&& auth('admin')->user()->hasAnyPermission(['exchange_return_orders']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'exchange_return_orders' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/exchange_return_orders')}}">
                        <i data-feather="columns"></i><span
                            class="menu-title text-truncate">@lang('Exchange_Return_Orders')</span>
                    </a>
                </li>
            @endif




            @if(auth('admin')->check() &&  auth('admin')->user()->role != \App\Models\Admin::MERCHANT
                && auth('admin')->user()->hasAnyPermission(['reject_reasons']) )

                <li class="nav-item {{explode('/',\Request::path())[2] == 'reject_reasons' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/reject_reasons')}}">
                        <i data-feather="columns"></i><span
                            class="menu-title text-truncate">@lang('reject_reasons')</span>
                    </a>
                </li>
            @endif



            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
 && auth('admin')->user()->hasAnyPermission(['commissions']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'commissions' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/commissions')}}">
                        <i data-feather="columns"></i><span class="menu-title text-truncate">@lang('commissions')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
 && auth('admin')->user()->hasAnyPermission(['currencies']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'currencies' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/currencies')}}">
                        <i data-feather="columns"></i><span class="menu-title text-truncate">@lang('currencies')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
 && auth('admin')->user()->hasAnyPermission(['currencies']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'currency_exchange_rate' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/currency_exchange_rate')}}">
                        <i data-feather="columns"></i><span
                            class="menu-title text-truncate">@lang('currency_exchange_rate')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check()  && auth('admin')->user()->hasAnyPermission(['reports']) ||
               auth('admin')->check()  &&  auth('admin')->user()->role == \App\Models\Admin::MERCHANT)
                <li class="menu">
                    <a href="#reports" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>@lang('reports') </span>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled show" id="reports" data-parent="#accordionExample">

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'product_sales_activity' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"
                               href="{{url('/admin/reports/product_sales_activity')}}">
                                <span class="menu-title text-truncate">@lang('product_sales_activity')</span></a>
                        </li>

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'product_almost_out_of_stock' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"
                               href="{{url('/admin/reports/product_almost_out_of_stock')}}">
                                <span class="menu-title text-truncate">@lang('product_almost_out_of_stock')</span></a>
                        </li>

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'product_out_of_stock' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{url('/admin/reports/product_out_of_stock')}}">
                                <span class="menu-title text-truncate">@lang('product_out_of_stock')</span></a>
                        </li>

                        @if(auth('admin')->check() && auth('admin')->user()->role == \App\Models\Admin::MERCHANT )

                            <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'sales' ? 'active' : '' }}">
                                <a class="d-flex align-items-center" href="{{url('/admin/reports/sales')}}">
                                    <span class="menu-title text-truncate">@lang('sales')</span></a>
                            </li>
                        @endif
                        {{--                    @if(auth('admin')->check() && auth('admin')->user()->role == \App\Models\Admin::MERCHANT )--}}

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'customers_market' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{url('/admin/reports/customers_market')}}">
                                <span class="menu-title text-truncate">@lang('customers_market')</span></a>
                        </li>
                        {{--                    @endif--}}


                    </ul>
                </li>
            @endif

            @if(auth('admin')->check() &&  auth('admin')->user()->role != \App\Models\Admin::MERCHANT
 && auth('admin')->user()->hasAnyPermission(['template']))
                <li class="nav-item {{explode('/',\Request::path())[2] == 'templates' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{url('/admin/templates')}}">
                        <i data-feather="columns"></i><span class="menu-title text-truncate">@lang('templates')</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() && auth('admin')->user()->role != \App\Models\Admin::MERCHANT
&& auth('admin')->user()->hasAnyPermission(['settings']))

                <li class="menu">
                    <a href="#setting" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>@lang('setting') </span>
                        </div>

                    </a>
                    <ul class="collapse submenu list-unstyled show" id="setting" data-parent="#accordionExample">

                        {{--                        @if(auth('admin')->check() && auth('admin')->user()->hasPermissionTo('about_app'))--}}
                        {{--                            <li>--}}
                        {{--                                <a href="{{route('about_app.index')}}"--}}
                        {{--                                   data-active="{{strtok(\Illuminate\Support\Facades\Route::currentRouteName(),'.') == 'about_app' ? 'true' : 'false' }}">--}}
                        {{--                                    @lang('common.about_app') </a>--}}
                        {{--                            </li>--}}

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'about_app' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{url('/admin/settings/about_app')}}">
                                <span class="menu-title text-truncate">@lang('about_app')</span></a>
                        </li>
                        {{--                        @endif--}}


                        {{--                        @if(auth('admin')->check() && auth('admin')->user()->hasPermissionTo('term'))--}}

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'service' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{url('/admin/settings/service')}}">
                                </i><span class="menu-title text-truncate">@lang('service')</span></a>
                        </li>
                        {{--                        @endif--}}

                        {{--                        @if(auth('admin')->check() && auth('admin')->user()->hasPermissionTo('term'))--}}

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'term' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{url('/admin/settings/term')}}">
                                </i><span class="menu-title text-truncate">@lang('terms_conditions')</span></a>
                        </li>

                        <li class="nav-item {{explode('/',\Request::path())[2] == 'privacy' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{url('/admin/settings/privacy')}}">
                                </i><span class="menu-title text-truncate">@lang('privacy')</span></a>
                        </li>

                        <li class="nav-item {{explode('/',\Request::path())[count(explode('/',\Request::path())) -1 ] == 'common_question' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{url('/admin/common_questions')}}">
                                </i><span class="menu-title text-truncate">@lang('common_question')</span></a>
                        </li>

                    </ul>
                </li>
            @endif

        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    @yield('content')
</div>
<!-- END: Content-->


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
</footer>
<audio hidden="hidden" src="{{url('/').'/sound_notification.mp3'}}" id="audio_notification"></audio>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

<script>

</script>

<!-- BEGIN: Vendor JS-->
<script src="{{asset('dashboard/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('dashboard/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('dashboard/app-assets/js/scripts/customizer.min.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
{{--<script src="{{asset('dashboard/app-assets/js/scripts/tables/table-datatables-basic.min.js')}}"></script>--}}
<script src="{{asset('dashboard/app-assets/js/scripts/extensions/ext-component-toastr.min.js')}}"></script>

{{--<!-- BEGIN: Page Vendor JS-->--}}
{{--<script src="{{asset('dashboard/app-assets/vendors/js/charts/chart.min.js')}}"></script>--}}

{{--<script src="{{asset('dashboard/app-assets/js/scripts/charts/chart-chartjs.min.js')}}"></script>--}}
{{--<!-- END: Page JS-->--}}
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>


<!-- END: Page JS-->
@yield('js')
<script
    src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
<script>
    var isRtl = '{{LaravelLocalization::getCurrentLocaleDirection()}}' === 'rtl';

    var selectedIds = function () {
        return $("input[name='table_ids[]']:checked").map(function () {
            return this.value;
        }).get();
    };
    $('select').select2({
        dir: '{{LaravelLocalization::getCurrentLocaleDirection()}}',
        placeholder: "@lang('select')",
    });
    $(document).ready(function () {
        $(document).on('click', "#export_btn", function (e) {
            e.preventDefault();
            window.open(url + 'export?' + $('#search_form').serialize(), '_blank');
        });

        $(document).on('click', "#chart_btn", function (e) {
            e.preventDefault();
            window.open(url + 'chart?' + $('#search_form').serialize(), '_blank');
        });

        $("#advance_search_btn").click(function (e) {
            e.preventDefault();
            $('#advance_search_div').toggle(500);
        });

        $(document).on('change', "#select_all", function (e) {
            var delete_btn = $('#delete_btn'), export_btn = $('#export_btn'),
                chart_btn = $('#chart_btn'), all_status_btn = $('.all_status_btn'), table_ids = $('.table_ids');
            this.checked ? table_ids.each(function () {
                this.checked = true
            }) : table_ids.each(function () {
                this.checked = false
            })
            delete_btn.attr('data-id', selectedIds().join());
            export_btn.attr('data-id', selectedIds().join());
            chart_btn.attr('data-id', selectedIds().join());
            all_status_btn.attr('data-id', selectedIds().join());
            if (selectedIds().join().length) {
                delete_btn.prop('disabled', '');
                all_status_btn.prop('disabled', '');
            } else {
                delete_btn.prop('disabled', 'disabled');
                all_status_btn.prop('disabled', 'disabled');
            }
        });

        $(document).on('change', ".table_ids", function (e) {
            var delete_btn = $('#delete_btn'), select_all = $('#select_all'), all_status_btn = $('.all_status_btn');
            if ($(".table_ids:checked").length === $(".table_ids").length) {
                select_all.prop("checked", true)
            } else {
                select_all.prop("checked", false)
            }
            delete_btn.attr('data-id', selectedIds().join());
            all_status_btn.attr('data-id', selectedIds().join());
            console.log(selectedIds().join().length)
            if (selectedIds().join().length) {
                delete_btn.prop('disabled', '');
                all_status_btn.prop('disabled', '');
            } else {
                delete_btn.prop('disabled', 'disabled');
                all_status_btn.prop('disabled', 'disabled');
            }
        });

        $('#search_btn').on('click', function (e) {
            oTable.draw();
            e.preventDefault();
        });

        $('#clear_btn').on('click', function (e) {
            e.preventDefault();
            $('.search_input').val("").trigger("change")
            oTable.draw();
        });

        $(document).on("click", ".delete-btn", function (e) {
            e.preventDefault();
            var urls = url;
            if (selectedIds().join().length) {
                urls += selectedIds().join();
            } else {
                urls += $(this).data('id');
            }
            Swal.fire({
                title: '@lang('delete_confirmation')',
                text: '@lang('confirm_delete')',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '@lang('yes')',
                cancelButtonText: '@lang('cancel')',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger'
                },
                buttonsStyling: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: urls,
                        method: 'DELETE',
                        type: 'DELETE',
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                    }).done(function (data) {
                        if (data.status) {
                            toastr.success('@lang('deleted')', '', {
                                rtl: isRtl
                            });
                            oTable.draw();
                            $('#select_all').prop('checked', false).trigger('change')
                        } else {
                            toastr.warning('@lang('not_deleted')', '', {
                                rtl: isRtl
                            });
                        }

                    }).fail(function () {
                        toastr.error('@lang('something_wrong')', '', {
                            rtl: isRtl
                        });
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    toastr.info('@lang('delete_canceled')', '', {
                        rtl: isRtl
                    })
                }
            });
        });
        $(document).on("click", ".status_btn", function (e) {
            e.preventDefault();
            var ids = $(this).data('id');
            var status = $(this).val();
            var urls = url + 'update_status';
            Swal.fire({
                title: '@lang('update_confirmation')',
                text: '@lang('confirm_update')',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '@lang('yes')',
                cancelButtonText: '@lang('cancel')',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger'
                },
                buttonsStyling: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: urls,
                        method: 'PUT',
                        type: 'PUT',
                        data: {
                            ids: ids,
                            status: status,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            console.log(data);
                            if (data.status) {
                                toastr.success('@lang('done_successfully')');
                                if (typeof oTable !== "undefined") {
                                    oTable.draw();
                                }
                                onStatusBtnCompleted(data.id, data.state);
                            } else {
                                toastr.error('@lang('something_wrong')');
                            }
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    toastr.info('@lang('update_canceled')', '', {
                        rtl: isRtl
                    })
                }
            });
        });
        $(document).on('click', '.state_btn', function (e) {
            var ids = $(this).data('id');
            var urls = url + 'update_state';
            Swal.fire({
                title: '@lang('change_state')',
                // type: 'success',
                icon: 'info',
                confirmButtonText: '@lang('accept')',
                showDenyButton: true,
                showCancelButton: true,
                denyButtonText: `@lang('reject')`,
                cancelButtonText: `@lang('cancel')`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        {{--                    url: "{{ url('/'.app()->getLocale().'/admin/users/update_state/') }}/" + id,--}}
                        url: urls,
                        type: "put",
                        data: {
                            ids: ids,
                            state: 1,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            Swal.fire({
                                title: '@lang('change_state_successfully')',
                                type: 'success',
                                icon: 'success',
                                confirmButtonColor: '#3085D6',
                                confirmButtonText: '@lang('ok')',
                            })
                            $('#btn_state_' + ids).removeClass(data.remove);
                            $('#btn_state_' + ids).addClass(data.add);
                            $('#btn_state_' + ids).text(data.text);
                            $('#btn_state_' + ids).attr('disabled', true);
                            $('#btn_state_' + ids).css('opacity', '1');

                        },
                        error: function (reject) {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: '@lang('error_msg')',
                                text: '@lang('invalid_data')'
                            })
                        }
                    });
                } else if (result.isDenied) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: urls,
                        type: "put",
                        data: {
                            ids: ids,
                            state: 2,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            Swal.fire({
                                title: '@lang('state_successfully')',
                                type: 'success',
                                icon: 'success',
                                confirmButtonColor: '#3085D6',
                                confirmButtonText: '@lang('ok')',
                            })
                            $('#btn_state_' + ids).removeClass(data.remove);
                            $('#btn_state_' + ids).addClass(data.add);
                            $('#btn_state_' + ids).text(data.text);
                            $('#btn_state_' + ids).attr('disabled', true);
                            $('#btn_state_' + ids).css('opacity', '1');

                        },
                        error: function (reject) {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: '@lang('error_msg')',
                                text: '@lang('invalid_data')'
                            })
                        }
                    });
                }
            })

        });

        $('#create_modal,#edit_modal').on('hide.bs.modal', function (event) {
            var form = $(this).find('form');
            form.find('select').val('').trigger("change")
            form[0].reset();
            $('.submit_btn').removeAttr('disabled');
            $('.fa-spinner.fa-spin').hide();
            $(".is-invalid").removeClass("is-invalid");
            $(".invalid-feedback").html("");
        })

        $(document).on('submit', '.ajax_form', function (e) {
            // $('.submit_btn').prop('disabled', true);
            e.preventDefault();
            var form = $(this);
            var url = $(this).attr('action');
            var method = $(this).attr('method');
            var reset = $(this).data('reset');
            var Data = new FormData(this);
            $('.submit_btn').attr('disabled', 'disabled');
            $('.fa-spinner.fa-spin').show();
            $.ajax({
                url: url,
                type: method,
                data: Data,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.invalid-feedback').html('');
                    $('.is-invalid ').removeClass('is-invalid');
                    form.removeClass('was-validated');
                }
            }).done(function (data) {

                $('.submit_btn').removeAttr('disabled');
                        $('.fa-spinner.fa-spin').hide();

                if (data.status) {
                    toastr.success('@lang('done_successfully')', '', {
                        rtl: isRtl
                    });
                    if (data.route_refresh)
                        location.reload();

                    if (reset === true) {
                        form[0].reset();
                    }

                        $('.modal').modal('hide');
                        oTable.draw();
                } else {
                    if (data.message) {
                        toastr.error(data.message, '', {
                            rtl: isRtl
                        });
                    } else {
                        toastr.error('@lang('something_wrong')', '', {
                            rtl: isRtl
                        });
                    }
                }

            }).fail(function (data) {
                if (data.status === 422) {
                    var response = data.responseJSON;
                    $.each(response.errors, function (key, value) {
                        var str = (key.split("."));
                        if (str[1] === '0') {
                            key = str[0] + '[]';
                        }
                        $('[name="' + key + '"], [name="' + key + '[]"]').addClass('is-invalid');
                        $('[name="' + key + '"], [name="' + key + '[]"]').closest('.form-group').find('.invalid-feedback').html(value[0]);
                    });
                } else {
                    toastr.error('@lang('something_wrong')', '', {
                        rtl: isRtl
                    });
                }
                $('.submit_btn').removeAttr('disabled');
                $('.fa-spinner.fa-spin').hide();

            });
        });

        oTable.on('draw', function () {
            $("#select_all").prop("checked", false)
            $('#delete_btn').prop('disabled', 'disabled');
            $('.status_btn').prop('disabled', 'disabled');
        });

    });


</script>
@yield('scripts')
<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({width: 14, height: 14});
        }
    })
</script>

<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-messaging.js"></script>

<script>
    /////////////////////////
    function ajaxCall() {
        $(document).ready(function () {
            // $(".selectpicker").selectpicker("refresh");

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '{{url('/' .app()->getLocale() .'/admin/notifications/getNotificationsNavbar') }}',
                cache: false,
                success: function (dataResult) {
                    // console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    var i = 1;
                    $.each(resultData, function (index, row) {

                        bodyData += '<div><a href="#" class="readMsg"  value="' + row.uuid + '' +
                            '"data-notification_type="' + row.type + '" ' +
                            'data-notification_id="' + row.uuid +
                            '" data-notification_reference_type="' + row.reference_type + '">' +

                            ' <div class="dropdown-item " style="color:black"> ' +
                            '<div class="media">' +
                            '<img width="50px" height="50px" class="rounded-circle mr-2" src="' + row.icon + '">' +
                            ' <div class="media-body">' +
                            ' <div class="notification-para">' +
                            ' <span class="user-name">' + row.title + '</span>' +
                            ' <span style="font-size:13px"><br>' + row.content + '</span><br>' +
                            '</div>' +
                            '<div class="notification-meta-time ml-2" style="font-size:13px; color:#dc3545;">' +
                            row.created_time +
                            ' </div>' +
                            '  </div></div></div></a></div>';

                    })

                    if ($('.bodyData').length > 0) {
                        $('.bodyData').empty();
                    }
                    $('.bodyData').append(bodyData);
                },
                error: function (reject) {
                    console.log('error');
                }
            });
        });
    }

    ajaxCall();
    setInterval(ajaxCall, 5000);

    $('.bodyData').on('click', '.readMsg', function () {
        const type = $(this).data('notification_type');

        let link = '';
        if (type === '{{ \App\Models\AdminNotification::NEW_MERCHANT_REQUEST }}') {
            link = '{{url('/' .app()->getLocale() .'/admin/merchants')}}';
        } else if (type === '{{ \App\Models\AdminNotification::NEW_REFUND_REQUEST }}') {
            link = '{{url('/' .app()->getLocale() .'/admin/exchange_return_orders')}}';
        } else if (type === '{{ \App\Models\AdminNotification::NEW_ORDER }}') {
            link = '{{url('/' .app()->getLocale() .'/admin/orders')}}';
        } else if (type === '{{ \App\Models\AdminNotification::CONTACT_US }}') {
            link = '{{url('/' .app()->getLocale() .'/admin/contacts')}}';
        }
        window.location.href = link;

        // var ele = $(this).parent();

        {{--var url = "{{url('/' .app()->getLocale() .'/admin/notifications/read_notifications') }}";--}}
        {{--var changeSeen = url + "/" + id;--}}
        {{--$.ajaxSetup({--}}
        {{--    headers: {--}}
        {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--    }--}}
        {{--});--}}
        // $.ajax({
        //     url: changeSeen,
        //     type: "get",
        //     success: function (dataResult) {
        //         // alert(link);
        //         console.log('ssssss');
        //         ele.remove();
        //         window.location.href = link;
        //
        //     }
        // });

    });

    if ('Notification' in window) {
        console.log('supported');
    } else {
        console.log(' not supported');
    }

    const firebaseConfig = {
        apiKey: "AIzaSyA17LAHZAxUfRP7qncDX2yAZI2B7SCn9Z0",
        authDomain: "online-shop-ce6de.firebaseapp.com",
        projectId: "online-shop-ce6de",
        storageBucket: "online-shop-ce6de.appspot.com",
        messagingSenderId: "337167710786",
        appId: "1:337167710786:web:a4922d4d5aac7a4daccbdb",
        measurementId: "G-KB1XEMMBYM"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    // console.log(messaging);
    navigator.serviceWorker.register('{{ asset('firebase-messaging-sw.js') }}')
        .then(function (registration) {
            messaging.useServiceWorker(registration);
            messaging.requestPermission()
                .then(function () {
                    console.log("Notification permission granted.");
                    // console.log(messaging)
                    messaging.getToken().then(function (currentToken) {
                        if (currentToken) {
                            updateUserFCMToken(currentToken);
                            sendTokenToServer(currentToken);
                        } else {
                            console.log('No Instance ID token available. Request permission to generate one.');
                            setTokenSentToServer(false);
                        }
                    }).catch(function (err) {
                        console.log('An error occurred while retrieving token. ', err);
                        setTokenSentToServer(false);
                    });
                })
                .catch(function (err) {
                    console.log('Unable to get permission to notify.', err);
                });
        });

    messaging.onMessage(function (payload) {
        console.log("Notification received: ", payload);
        toastr["info"](payload.data.content, payload.data.title);

        document.getElementById('audio_notification').play();

    });
    messaging.onTokenRefresh(() => {
        messaging.getToken().then((refreshedToken) => {
            console.log('Token refreshed.' + refreshedToken);
            // Indicate that the new Instance ID token has not yet been sent
            // to the app server.
            setTokenSentToServer(false);
            // Send Instance ID token to app server.
            sendTokenToServer(refreshedToken);
        }).catch((err) => {
            console.log('Unable to retrieve refreshed token ', err);
        });
    });

    function sendTokenToServer(currentToken) {
        if (!isTokenSentToServer()) {
            console.log('Sending token to server...');
            // TODO(developer): Send the current token to your server.
            setTokenSentToServer(currentToken);
        } else {
            console.log('Token already sent to server so won\'t send it again ' +
                'unless it changes');
        }
    }

    function isTokenSentToServer() {
        return window.localStorage.getItem('sentToServer') != null;
    }

    function setTokenSentToServer(sent) {
        window.localStorage.setItem('sentToServer', sent);
    }

    // /**/
    function updateUserFCMToken(token) {
        console.log(token);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/') . '/admin/notifications/save_token/' }}" + token,
            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                console.log('Token saved successfully.');
            },
            error: function (err) {
                console.log('User Token Error' + err);
            },
        });
    }

</script>

</body>
<!-- END: Body-->
</html>
