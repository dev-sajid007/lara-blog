@extends('layouts.frontend.client_master')
@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .fav-color{
            color:dodgerblue;
        }
        span.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md {
            background: #4F92FF!important;
            color: white;
        }
    </style>
@endpush
@section('content')

    <div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
             data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
             data-swiper-breakpoints="true" data-swiper-loop="true" >
            <div class="swiper-wrapper">

                @foreach($categories as $category)
                <div class="swiper-slide">
                    <a class="slider-category" href="{{route('post.category',$category->slug)}}">
                        <div class="blog-image"><img src="/public/category/{{$category->image}}" alt="Blog Image"></div>

                        <div class="category">
                            <div class="display-table center-text">
                                <div class="display-table-cell">
                                    <h3 style="text-transform: uppercase"><b>{{$category->name}}</b></h3>
                                </div>
                            </div>
                        </div>

                    </a>
                </div><!-- swiper-slide -->
                @endforeach


            </div><!-- swiper-wrapper -->

        </div><!-- swiper-container -->

    </div>

    <section class="blog-area section">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
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
                </div>

                @endforeach
            </div><!-- row -->
{{--            <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>--}}
            {!! $posts->links() !!}

        </div><!-- container -->
    </section><!-- section -->
@endsection
@push('js')
    <script src="{{asset('assets/backend/plugins/notify/notify.js')}}"></script>
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
