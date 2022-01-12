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
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Authors</a></li>
                        </ol>
                    </nav>
                    <!--breadcrumb-->
                    <div class="widget-content widget-content-area br-6">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between align-items-center">
                            <h4>Authors</h4>


                        </div>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="7%">SL.</th>
                                    <th>Name</th>
                                    <th>Post's</th>
                                    <th>Comment's</th>
                                    <th>Favourate Post's</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->posts->count()}}</td>
                                    <td>{{$user->comments->count()}}</td>
                                    <td>{{$user->favourite_to_post->count()}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.author.delete',$user->id)}}" class="btn btn-danger">Delete</a>
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

    </script>
@endpush
