@extends('layouts.frontend.client_master')
@push('css')

    <link href="{{asset('assets/frontend/single-post/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/single-post/css/responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .fav-color{
            color:dodgerblue;
        }
    </style>

@endpush

@section('content')

    <div class="slider">
        <div class="display-table  center-text">
            <h1 class="title display-table-cell"><b>{{$category->name}}</b></h1>
        </div>
    </div><!-- slider -->

    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                @foreach($category->posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">

                            <div class="single-post post-style-1">
                                <div class="blog-image"><img src="/public/post/{{$post->image}}" alt="Blog Image"></div>
                                <a class="avatar" href="#"><img src="/public/user/{{$post->user->image}}" alt="Profile Image"></a>
                                <div class="blog-info">
                                    <h4 class="title"><a href="{{route('post.details',$post->slug)}}"><b>{{$post->title}}</b></a></h4>
                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a href="javascript:void(0)" onclick="toastr.warning('You Need to login First!')"><i class="ion-heart"></i>{{$post->favourite_to_user->count()}}</a>
                                            @else
                                                <a href="{{URL('favourite/post/'.$post->id)}}" class="{{!Auth::user()->favourite_to_post->where('pivot.post_id',$post->id)->count() == 0 ? 'fav-color':''}}"><i class="ion-heart"></i>{{$post->favourite_to_user->count()}}</a>
                                            @endguest
                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-md-6 col-sm-12 -->
                @endforeach
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- post-area -->
@endsection

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
            function favourite(){
                toastr.warning('You Need to login First!');
            }

        });
    </script>
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
