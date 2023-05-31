<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  {{-- data-assets-path="{{asset('dashboard/assets/')}}" --}}
  data-template="vertical-menu-template-starter"
>
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Page 1 - Starter Kit | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('dashboard/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href=" {{asset('dashboard/assets/vendor/libs/node-waves/node-waves.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src=" {{asset('dashboard/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('dashboard/assets/vendor/js/template-customizer.js')}}">
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src=" {{asset('dashboard/assets/js/config.js')}}"></script>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/app-assets/vendors/css/forms/select/select2.min.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@yield('css')
</head>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0"
                  />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616"
                  />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616"
                  />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0"
                  />
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Page -->
            <li class="menu-item ">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Page 1">Page 1</div>
              </a>
            </li>
             <li class="menu-item {{explode('/',\Request::path())[0] == 'intros' ? 'active' : '' }}">
              <a href="{{route('intros.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="intro">Intro Content</div>
              </a>
            </li>
            <li class="menu-item {{explode('/',\Request::path())[0] == 'categories' ? 'active' : '' }}">
              <a href="{{route('categories.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="intro"> Categories</div>
              </a>
            </li>
            <li class="menu-item {{explode('/',\Request::path())[0] == 'sub-categories' ? 'active' : '' }}">
              <a href="{{route('sub-categories.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="intro">Sub Categories</div>
              </a>
            </li>
            <li class="menu-item {{explode('/',\Request::path())[0] == 'Ads' ? 'active' : '' }}">
              <a href="{{route('Ads.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="intro">Ads Content</div>
              </a>
            </li>
            <li class="menu-item {{explode('/',\Request::path())[0] == 'services' ? 'active' : '' }}">
              <a href="{{route('services.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="intro">Services Content</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                  <i class="ti ti-sm"></i>
                </a>
              </div>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('dashboard/assets/img/avatars/1.png')}}" alt class="h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{asset('dashboard/assets/img/avatars/1.png" alt class="h-auto rounded-circle')}}" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="ti ti-user-check me-2 ti-sm"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="ti ti-settings me-2 ti-sm"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20"
                            >2</span
                          >
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="ti ti-logout me-2 ti-sm"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          @yield('content')

          <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
                >
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
                  </div>
                  <div>
                    <a
                      href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('dashboard/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/node-waves/node-waves.js')}}"></script>

    <script src="{{asset('dashboard/assets/vendor/libs/hammer/hammer.js')}}"></script>

    <script src="{{asset('dashboard/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('dashboard/assets/js/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<script src="{{asset('dashboard/assets/vendor/forms/select/select2.full.min.js')}}"></script>
    @yield('scripts')


    <script>
        // var isRtl = '{{LaravelLocalization::getCurrentLocaleDirection()}}' === 'rtl';

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

        $(document).on('change', "#select_all", function (e) {
            console.log('select_all');
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
            var delete_btn = $('#delete_btn')
            , select_all = $('#select_all')
            , all_status_btn = $('.all_status_btn');
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
  </body>
</html>
