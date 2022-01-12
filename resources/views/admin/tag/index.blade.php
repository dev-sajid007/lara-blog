@extends('layouts.backend.admin_master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <style>
        .btn-danger{
            background: red!important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/toastr/css/toastr.min.css')}}">

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('assets/backend/css/scrollspyNav.css" rel="stylesheet" type="text/css')}}" />
    <link href="{{asset('assets/backend/plugins/animate/animate.css" rel="stylesheet" type="text/css')}}" />
    <script src="{{asset('assets/backend/plugins/sweetalerts/promise-polyfill.js')}}"></script>
    <link href="{{asset('assets/backend/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css')}}" />
    <link href="{{asset('assets/backend/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css')}}" />
    <link href="{{asset('assets/backend/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css')}}" />
    <!-- END THEME GLOBAL STYLES -->
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">



                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <!--breadcrumb-->
                    <nav class="breadcrumb-two" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Components</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Tag</a></li>
                        </ol>
                    </nav>
                    <!--breadcrumb-->
                    <div class="widget-content widget-content-area br-6">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between align-items-center">
                            <h4>Tags</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tagCreate"><i class="fa fa-plus-circle"></i> Add New</button>

                        </div>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="7%">SL.</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Store Modal -->
    <div class="modal fade" id="tagCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="tag-store-form">
                        @csrf
                        <div class="form-group">
                            <label for="t-text" class="sr-only">Tag Name</label>
                            <input  type="text"  id="name" placeholder="Name" class="form-control">
                            <span class="text-danger" id="nameError"></span>
                            <input type="submit"  name="txt" class="mt-4 btn btn-primary float-right">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Store Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="tagEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="tag-edit-form">
                        @csrf
                        <div class="form-group">
                            <label for="t-text" class="sr-only">Tag Name</label>
                            <input  type="text"  id="editName" placeholder="Name" class="form-control">
                            <input type="hidden" id="tagId">
                            <span class="text-danger" id="editNameError"></span>
                            <input type="submit" id="update" value="Update" name="txt" class="mt-4 btn btn-primary float-right">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Modal -->
@endsection

@push('js')
    <script src="{{asset('assets/backend/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/toastr/js/toastr.min.js')}}"></script>

    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="{{asset('assets/backend/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END THEME GLOBAL STYLE -->
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function allTag(){
            $.ajax({
               type:'GET',
               dataType:'json',
               url:'{{route("admin.tag.get")}}',
               success:function(data){
                   var html = '';
                   $.each(data,function (key,value){
                       html = html + "<tr>"
                       html = html + "<td>"+(key+1)+"</td>"
                       html = html + "<td>"+value.name+"</td>"
                       html = html + "<td>"+value.slug+"</td>"
                       html = html + "<td>"+value.created_at+"</td>"
                       html = html + "<td>"+value.updated_at+"</td>"
                       html = html + "<td>"
                       html = html + "<a class='btn btn-outline-primary  btn-sm mr-2' data-toggle='modal' data-target='#tagEdit' data-id='"+value.id+"' id='edit'><i class='far fa-edit'></i></a>"
                       html = html + "<a class='btn btn-outline-danger btn-sm' data-id='"+value.id+"' id='delete'><i class='far fa-times-circle'></i></a>"
                       html = html + "</td>"
                       html = html + "</tr>"
                   })
                   $('tbody').html(html);

               }
            });
        }
        allTag();

        //-------------Store Tag---------------
        $("#tag-store-form").submit(function(e){
            e.preventDefault();
            var name = $('#name').val();
            $.ajax({
                type:'POST',
                dataType:'json',
                url: '{{route('admin.tag.store')}}',
                data: {name:name},
                success:function (data){

                    if (data.errors){
                        $('#nameError').text(data.errors.name);
                        toastr.error(data.errors.name);

                    }else{

                        allTag();
                        $('#tagCreate').modal('hide');
                        $('#tag-store-form')[0].reset();
                        $('#nameError').text('');
                        toastr.success("Tag Inserted successfully");
                    }


                }

            })
        });

        //------------Edit Tag Ajax Request--------------
        $(document).on('click','#edit',function(event){
            event.preventDefault();
            var id = $(this).data("id");

            $.ajax({
                url: '/admin/tag/edit/'+id,
                type:"GET",
                data: {
                    id : id
                },
                success: function (data)
                {
                    $('#tagId').val(data.id);
                    $('#editName').val(data.name);
                    console.log(data);
                }
            });
        });
        //------------Update Tag Ajax Request--------------
        $(document).on('click','#update',function(event){
            event.preventDefault();
            var id = $('#tagId').val();
            var name = $('#editName').val();
            $.ajax({
                url: '/admin/tag/update/'+id,
                type:"POST",
                data: {
                    id : id,
                    name:name
                },
                success: function (data)
                {
                    if (data.errors){
                        $('#editNameError').text(data.errors.name);
                        toastr.error(data.errors.name);

                    }else{
                        allTag();
                        $('#tagEdit').modal('hide');
                        $('#tag-store-form')[0].reset();
                        $('#editNameError').text('');
                        toastr.success("Tag Updated successfully");
                    }
                }
            });
        });
        //------------Delete Tag Ajax Request--------------
        $(document).on('click','#delete',function(event){
            event.preventDefault();
            var id = $(this).data("id");
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                padding: '2em'
            }).then(function(result) {

                if (result.value) {

                    $.ajax({
                        url: '/admin/tag/delete/'+id,
                        type:"GET",
                        data: {
                            id : id
                        },
                        success: function (data)
                        {
                            allTag();
                            toastr.success("Tag Deleted Successfully");
                            $(this).closest('tr').remove();

                        },

                });
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }

            })


        });
        //Sweet Alert

        $('#delete').on('click', function () {

        })
    </script>

@endpush
