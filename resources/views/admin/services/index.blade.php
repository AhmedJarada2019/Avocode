@extends('admin.parent')
@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">@lang('services') Page</h4>
                <div class="card">
                    <div class="card-header">
                        <div class="head-label">
                            <h4 class="card-title">@lang('services')</h4>
                        </div>
                        <div class="text-right">
                            <div class="form-gruop">
                                <button class="btn btn-outline-primary" type="button"  data-bs-toggle="modal"
                                data-bs-target="#modalCenter"><span><i class="fa fa-plus"></i> @lang('add_new_record')</span>
                                </button>

                                <button value="1"
                                        class="all_status_btn status_btn btn btn-outline-success">
                                    @lang('activate')
                                </button>
                                <button value="0"
                                        class="all_status_btn status_btn btn btn-outline-secondary">
                                    @lang('deactivate')
                                </button>
                                <button  id="delete_btn" disabled
                                        class="delete-btn btn btn-outline-danger">
                                    <span><i class="fa fa-lg fa-trash-alt" aria-hidden="true"></i> @lang('delete')</span>
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive card-datatable">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th class="checkbox-column sorting_disabled" rowspan="1" colspan="1"
                                    style="width: 35px;" aria-label=" Record Id ">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="table_ids custom-control-input dt-checkboxes"
                                               id="select_all">
                                        <label class="custom-control-label" for="select_all"></label>
                                    </div>
                                </th>
                                <th>@lang('uuid')</th>
                                <th>@lang('image')</th>
                                <th>@lang('name')</th>
                                <th style="width: 225px;">@lang('actions')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <!-- / Content -->

        <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                   <div class="modal-body">
                       <form action=""  id="create_form" method="POST"
                             data-reset="true" class="ajax_form form-horizontal" enctype="multipart/form-data"
                             novalidate>
                           {{csrf_field()}}
                           <div class="row">
                               @foreach(locales() as $key => $value)
                                   <div class="col-12">
                                       <div class="form-group">
                                           <label for="name_{{$key}}">@lang('name') @lang($value)</label>
                                           <input type="text" class="form-control"
                                                  placeholder="@lang('name') @lang($value)"
                                                  name="name_{{$key}}" id="name_{{$key}}">
                                           <div class="invalid-feedback"></div>
                                       </div>
                                   </div>
                               @endforeach
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image">@lang('image')</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                           </div>
                       </form>
                   </div>
                   <div class="modal-footer">
                       <button type="submit" form="create_form" class="submit_btn btn btn-primary">
                           <i class="fa fa-spinner fa-spin" style="display: none;"></i>
                           @lang('save')
                       </button>
                       <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">@lang('close')
                       </button>
                       {{--<button type="button" form="create_form" class="btn btn-primary">Send message</button>--}}
                   </div>
               </div>
           </div>
       </div>


  <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">@lang('edit')</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <form action="" id="edit_form" method="POST"
                   data-reset="true" class="ajax_form form-horizontal" enctype="multipart/form-data"
                   novalidate>
                 {{csrf_field()}}
                 {{method_field('PUT')}}
                 <div class="row">
                    @foreach(locales() as $key => $value)
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edit_name_{{$key}}">@lang('name') @lang($value)</label>
                                <input type="text" class="form-control"
                                       placeholder="@lang('name') @lang($value)"
                                       name="name_{{$key}}" id="edit_name_{{$key}}">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    @endforeach

                <div class="col-12">
                    <label for="icon">@lang('icon')</label>
                    <div class="form-group">
                        <div class="fileinput fileinput-exists"
                             data-provides="fileinput">
                            <div class="fileinput-preview thumbnail"
                                 data-trigger="fileinput"
                                 style="width: 200px; height: 150px;">
                                <img id="edit_src_image" src="" alt=""/>
                            </div>
                            <div>
                                <span class="btn btn-secondary btn-file">
                                <span class="fileinput-new"> @lang('select_image')</span>
                                <span class="fileinput-exists"> @lang('select_image')</span>
                                <input type="file" name="image"></span>
                            </div>
                            <div class="invalid-feedback"></div>
                            <input type="hidden" name="uuid" id="uuid">
                        </div>
                    </div>
                </div>
                </div>
             </form>
         </div>
         <div class="modal-footer">
             <button type="submit" form="edit_form" class="submit_btn btn btn-primary">
                 <i class="fa fa-spinner fa-spin" style="display: none;"></i>
                 @lang('save')
             </button>
             <button type="button" class="btn btn-outline-danger" data-dismiss="modal">@lang('close')</button>
         </div>
     </div>
 </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
        var url = "{{url(app()->getLocale().'/services')}}/";
        var oTable = $('#myTable').DataTable({
              processing: true,
              serverSide: true,
               "order": [[1, 'asc']],
              ajax: "{{ route('services.indexTable') }}",
              'columnDefs': [
                {
                    "targets": 1,
                    "visible": false
                },
                {
                    'targets': 0,
                    "searchable": false,
                    "orderable": false
                },
            ],
            "oLanguage": {
                @if(app()->isLocale('ar'))
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                },

                @endif "oPaginate": {"sPrevious": '<-', "sNext": '->'},
                "oPaginate": {
                    // remove previous & next text from pagination
                    "sPrevious": '&nbsp;',
                    "sNext": '&nbsp;'
                }
            },
              columns: [
                {
                    "render": function (data, type, full, meta) {
                        return `<td class="checkbox-column sorting_1">
                                       <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="table_ids custom-control-input dt-checkboxes"
                                         name="table_ids[]" value="` + full.uuid + `" id="checkbox` + full.uuid + `" >
                                    <label class="custom-control-label" for="checkbox` + full.uuid + `"></label>
                                </div></td>`;
                    }
                },
                {data: 'uuid', name: 'uuid'},
                {
                    "render": function (data, type, full, meta) {
                        return `<td><div class="handle"><img width="50" height="50" src="` + full.image + `" class="avatar avatar-sm me-3" alt="user1"></div></td>`
                    }
                },
                  {data: 'name_translate', name: 'name'},
                  {data: 'action', name: 'action'},
              ]
          });

          $(document).ready(function () {
            $(document).on('click', '.edit_btn', function (event) {
                var button = $(this)
                var uuid = button.data('uuid')
                $('#edit_form').attr('action', url + uuid)
                @foreach(locales() as $key => $value)
                    $('#edit_name_{{$key}}').val(button.data('name_{{$key}}'))
                @endforeach

                $('#edit_src_image').attr('src',button.data('image'));
            });
            $(document).on('click', '#create_btn', function (event) {
                $('#create_form').attr('action', url);
            });
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
</script>

@endsection
