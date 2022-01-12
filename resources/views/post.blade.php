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
            <h1 class="title display-table-cell"><b>DESIGN {{$post->id}}</b></h1>
        </div>
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">
                        <div class="blog-post-inner">
                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="/public/user/{{$post->user->image}}" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{$post->user->name}}</b></a>
                                    <h6 class="date">on {{$post->created_at->diffForHumans()}}</h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b>{{$post->title}}</b></a></h3>



                            <div class="post-image"><img src="/public/post/{{$post->image}}" alt="Blog Image"></div>

                            <p class="para">{!!$post->body!!}</p>

                            <ul class="tags">
                               @foreach($post->tags as $tag)
                                    <li><a href="{{route('post.tag',$tag->slug)}}">{{$tag->name}}</a></li>
                                @endforeach

                            </ul>
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
                                <li>
                                    @guest
                                        <a href="javascript:void(0)" onclick="toastr.warning('You Need to login First!')"><i class="ion-heart"></i>74</a>
                                    @else
                                        <a href="{{URL('favourite/post/'.$post->id)}}" class="{{!Auth::user()->favourite_to_post->where('pivot.post_id',$post->id)->count() == 0 ? 'fav-color':''}}"><i class="ion-heart"></i>{{$post->favourite_to_user->count()}}</a>
                                    @endguest
                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                            </ul>

                            <ul class="icons">
                                <li>SHARE : </li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                            </ul>
                        </div>

                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">
                    <div class="single-post info-area">
                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                            <p>{{$post->user->about}}</p>
                        </div>
                        <div class="tag-area">
                            <h4 class="title"><b>CATEGORIES</b></h4>
                            <ul>
                                @foreach($post->categories as $category)
                                <li><a href="{{route('post.category',$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                @foreach($randPosts as $rpost)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">

                            <div class="single-post post-style-1">
                                <div class="blog-image"><img src="/public/post/{{$rpost->image}}" alt="Blog Image"></div>
                                <a class="avatar" href="#"><img src="/public/user/{{$rpost->user->image}}" alt="Profile Image"></a>
                                <div class="blog-info">
                                    <h4 class="title"><a href="{{route('post.details',$rpost->slug)}}"><b>{{$rpost->title}}</b></a></h4>
                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a href="javascript:void(0)" onclick="toastr.warning('You Need to login First!')"><i class="ion-heart"></i>{{$rpost->favourite_to_user->count()}}</a>
                                            @else
                                                <a href="{{URL('favourite/post/'.$rpost->id)}}" class="{{!Auth::user()->favourite_to_post->where('pivot.post_id',$rpost->id)->count() == 0 ? 'fav-color':''}}"><i class="ion-heart"></i>{{$rpost->favourite_to_user->count()}}</a>
                                            @endguest
                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$rpost->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-md-6 col-sm-12 -->
                @endforeach

            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        <form method="post" action="{{route('post.comments',$post->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
									<textarea name="comment" rows="2" class="text-area-messge form-control"
                                              placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>
                    </div><!-- comment-form -->

                    <h4><b>COMMENTS({{$post->comments->count()}})</b></h4>

                    <div class="commnets-area ">
                        @foreach($post->comments as $comment)
                        <div class="comment">
                            <div class="post-info">
                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="/public/user/{{$comment->user->image}}" alt="Profile Image"></a>
                                </div>
                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{$comment->user->name}}</b></a>
                                    <h6 class="date">on {{$comment->created_at->diffForHumans()}}</h6>
                                </div>
                            </div><!-- post-info -->

                            <p>{{$comment->comment}}</p>
                        </div>
                        @endforeach
                    </div><!-- commnets-area -->

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>
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
