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
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/toastr/css/toastr.min.css')}}">
    <!--Select 2 JS-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('assets/backend/css/scrollspyNav.css" rel="stylesheet" type="text/css')}}" />
    <link href="{{asset('assets/backend/plugins/animate/animate.css" rel="stylesheet" type="text/css')}}" />
    <script src="{{asset('assets/backend/plugins/sweetalerts/promise-polyfill.js')}}"></script>
    <link href="{{asset('assets/backend/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css')}}" />
    <link href="{{asset('assets/backend/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css')}}" />
    <link href="{{asset('assets/backend/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css')}}" />

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- END THEME GLOBAL STYLES -->
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <form action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row layout-top-spacing">

                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 layout-spacing">
                        <div class="card">
                            <div class="card-title">
                                <h4 style="margin: 15px">Edit Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input value="{{$post->title}}" type="text" name="title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="">Feature Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="status" value="1"  class="form-check-input" {{$post->status == 1? 'checked': ''}}>
                                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Select Category</label>
                                    <select class="form-control select2" multiple="multiple" name="categories[]" id="" multiple>

                                        @foreach($categories as $category)
                                            <option
                                            @foreach($post->categories as $postCategory)
                                                {{$postCategory->id == $category->id ? 'selected': ''}}
                                            @endforeach
                                            value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Select Tags</label>
                                    <select class="form-control select2" multiple="multiple" name="tags[]" id="" multiple>
                                        @foreach($tags as $tag)
                                            <option
                                                @foreach($post->tags as $postTag)
                                                    {{$postTag->id == $tag->id? 'selected':''}}
                                                @endforeach
                                                value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</button>
                                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-arrow-right"></i> Post</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Body</label>
                                    <textarea name="body" id="markdown" cols="30" rows="20">{{$post->body}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
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
        tinymce.init({
            selector: 'textarea',  // change this value according to your HTML
            menubar: 'file edit view'
        });
    </script>
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
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        //Markdown js

        new SimpleMDE({
            element: document.getElementById("markdown"),
            spellChecker: false,
            autosave: {
                enabled: true,
                unique_id: "demo2",
            },
        });
    </script>
@endpush
