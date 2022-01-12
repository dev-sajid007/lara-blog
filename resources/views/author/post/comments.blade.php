@extends('layouts.backend.admin_master')
@push('css')
    <link href="{{asset('assets/backend/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <style>
        .btn-danger{
            background: #ff0000 !important;
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
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Post</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Favourite Post</a></li>
                        </ol>
                    </nav>
                    <!--breadcrumb-->
                    <div class="widget-content widget-content-area br-6">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between align-items-center">
                            <h4>Post Comments</h4>
                        </div>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="7%">SL.</th>
                                    <th  width="30%">Comment Info</th>
                                    <th>Post Info</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $key=>$comment)
                                      <tr>
                                          <td>{{$key+1}}</td>
                                          <td>
                                              <div class="widget widget-card-one">
                                                  <div class="widget-content">
                                                      <div class="media">
                                                          <div class="w-img">
                                                              <img src="/public/user/{{$comment->user->image}}" alt="avatar">
                                                          </div>
                                                          <div class="media-body">
                                                              <h6>{{$comment->user->name}}</h6>
                                                              <p class="meta-date-time">{{$comment->created_at->diffForHumans()}}</p>
                                                          </div>
                                                      </div>
                                                      <p><b>Comments:</b>{{$comment->comment}}</p>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="widget widget-card-one">
                                                  <div class="widget-content">
                                                      <div class="media">
                                                          <div class="w-img">
                                                              <img src="/public/user/{{$comment->post->user->image}}" alt="avatar">
                                                          </div>
                                                          <div class="media-body">
                                                              <h6>{{$comment->post->title}}</h6>
                                                              <p class="meta-date-time">{{$comment->post->created_at->diffForHumans()}}</p>
                                                              <p class="meta-date-time">{{$comment->post->user['name']}}</p>
                                                          </div>
                                                      </div>
                                                      <p>&nbsp;</p>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <a href="{{route('author.post.comments.delete',$comment->id)}}" class="btn btn-danger">Delete</a>
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
    <!-- Store Modal -->

@endsection

@push('js')
    <script src="{{asset('assets/backend/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/toastr/js/toastr.min.js')}}"></script>

    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="{{asset('assets/backend/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END THEME GLOBAL STYLE -->


@endpush
