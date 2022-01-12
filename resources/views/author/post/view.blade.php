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
        .select2-selection__choice__display{
            background: #5C1AC3!important;
            color: #ffffff!important;
        }
        .select2-selection__choice__remove{

            color: #000000!important;
        }
    </style>

    <!-- END THEME GLOBAL STYLES -->
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 layout-spacing">
                        <div class="card">
                            <div class="card-title">
                                <h2 style="margin:15px 0px 0px 15px">
                                    {{$post->title}}
                                </h2>
                                <small class="m-4">Posted By <b>{{$post->user->name}}</b>
                                    on {{$post->created_at->toformattedDateString()}}</small>
                            </div>
                            <div class="card-body">
                                <p>{!!$post->body!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div class="card ">
                            <div class="card-header bg-primary ">
                                <h4 class="text-white" style="margin: 10px">Categories</h4>
                            </div>
                            <div class="card-body">
                                @foreach($post->categories as $category)
                                    <span class="badge badge-primary">{{$category->name}}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header bg-info ">
                                <h4 class="text-white" style="margin: 10px">Tags</h4>
                            </div>
                            <div class="card-body">
                                @foreach($post->tags as $tag)
                                    <span class="badge badge-info">{{$tag->name}}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header bg-warning ">
                                <h4 class="text-white" style="margin: 10px">Feature Image</h4>
                            </div>
                            <div class="card-body">
                                <img width="300" src="/public/post/{{$post->image}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>




@endsection
@push('js')
    <!--Select 2 JS-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--Select 2 JS-->
    <script src="{{asset('assets/backend/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/toastr/js/toastr.min.js')}}"></script>

    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="{{asset('assets/backend/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END THEME GLOBAL STYLE -->
    <script>
        @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>


@endpush
