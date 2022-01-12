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
                            <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Post</a></li>
                        </ol>
                    </nav>
                    <!--breadcrumb-->
                    <div class="widget-content widget-content-area br-6">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between align-items-center">
                            <h4>Posts</h4>
                            <a href="{{route('author.post.create')}}" class="btn btn-primary" ><i class="fa fa-plus-circle"></i> Add New</a>

                        </div>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="7%">SL.</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th width="7%"><i class="fa fa-eye"></i> </th>
                                    <th width="10%">Approved</th>
                                    <th width="10%">Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{str_limit($post->title,'12')}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->view_count}}</td>
                                        <td>
                                            @if($post->is_approved == 0 )
                                                <span class="badge badge-danger">Pending</span>
                                            @else
                                                <span class="badge badge-primary">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->status == 0 )
                                                <span class="badge badge-danger">Unpublished</span>
                                            @else
                                                <span class="badge badge-primary">Published</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('author.post.view',$post->id)}}" class="btn btn-outline-info btn-small"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('author.post.edit',$post->id)}}" class="btn btn-outline-primary btn-small"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-small"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <!-- Store Modal -->--}}
{{--    <div class="modal fade" id="categoryCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form  action="" method="post" id="category-store-form" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Category Name</label>--}}
{{--                            <input  type="text"  name="name" placeholder="Name" class="form-control">--}}
{{--                            <span class="text-danger" id="nameError"></span>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}

{{--                            <input id="image" onchange="imageView(this)" type="file" style="display: none" name="image" class="form-control">--}}
{{--                            <label for="image">--}}
{{--                                <img id="showImage" class="img-thumbnail" width="100" src="/public/placeholder.png" alt="">--}}
{{--                            </label><br>--}}
{{--                            <font class="m-2 text-primary">Select Image</font>--}}
{{--                            <span class="text-danger" id="imageError"></span>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="mt-4 btn btn-primary float-right">Submit</button>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Store Modal -->--}}

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
@endpush
