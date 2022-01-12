<nav id="sidebar">

    <ul class="navbar-nav theme-brand flex-row  text-center">
        <li class="nav-item theme-logo">
            <a href="index-2.html">
                <img src="{{asset('assets/backend/img/logo.svg')}}" class="navbar-logo" alt="logo">
            </a>
        </li>
        <li class="nav-item theme-text">
            <a href="index-2.html" class="nav-link"> CORK </a>
        </li>
        <li class="nav-item toggle-sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left sidebarCollapse"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        </li>
    </ul>
    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="{{Request::is('admin/dashboard')? 'menu active' : 'menu'}}">
            <a href="{{url('/admin/dashboard')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>Dashboard</span>
                </div>
            </a>
        </li>

        <li class="menu menu-heading">
            <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>Apps</span></div>
        </li>
        @if(Request::is('admin*'))
        <li class="{{Request::is('admin/tag/index')? 'menu active' : 'menu'}}">
            <a href="{{route('admin.tag.index')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span>Tags</span>
                </div>
            </a>
        </li>

        <li class="{{Request::is('admin/category/index')? 'menu active' : 'menu'}}">
            <a href="{{route('admin.category.index')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span>Category</span>
                </div>
            </a>
        </li>
        <li class="{{Request::is('admin/post/index')? 'menu active' : 'menu'}}">
            <a href="{{route('admin.post.index')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span>Post</span>
                </div>
            </a>
        </li>

         <li class="{{Request::is('admin/post/pending')? 'menu active' : 'menu'}}">
            <a href="{{route('admin.post.pending')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span>Pending Post</span>
                </div>
            </a>
        </li>

        <li class="{{Request::is('admin/post/favourite')? 'menu active' : 'menu'}}">
            <a href="{{route('admin.post.favourite')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span>Favourite Post</span>
                </div>
            </a>
        </li>

        <li class="{{Request::is('admin/post/comments')? 'menu active' : 'menu'}}">
            <a href="{{route('admin.post.comments')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span>Post Comment</span>
                </div>
            </a>
        </li>

        <li class="{{Request::is('admin/authors')? 'menu active' : 'menu'}}">
            <a href="{{route('admin.author.index')}}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <span>Author's</span>
                </div>
            </a>
        </li>

        @endif
        <!--Author sideBar-->
        <!--Author sideBar-->
        <!--Author sideBar-->
        @if(Request::is('author*'))
            <li class="{{Request::is('author/post/index')? 'menu active' : 'menu'}}">
                <a href="{{route('author.post.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        <span>Post</span>
                    </div>
                </a>
            </li>

            <li class="{{Request::is('author/post/comments')? 'menu active' : 'menu'}}">
                <a href="{{route('author.post.comments')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        <span>Post Comments</span>
                    </div>
                </a>
            </li>
        @endif
        <li class="menu menu-heading">
            <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>USER INTERFACE</span></div>
        </li>
        <!--Component-->
{{--        <li class="menu">--}}
{{--            <a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">--}}
{{--                <div class="">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>--}}
{{--                    <span>Components</span>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">--}}
{{--                <li>--}}
{{--                    <a href="component_tabs.html"> Tabs </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_accordion.html"> Accordions  </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_modal.html"> Modals </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_cards.html"> Cards </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_bootstrap_carousel.html">Carousel</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_blockui.html"> Block UI </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_countdown.html"> Countdown </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_counter.html"> Counter </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_sweetalert.html"> Sweet Alerts </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_timeline.html"> Timeline </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_snackbar.html"> Notifications </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_session_timeout.html"> Session Timeout </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_media_object.html"> Media Object </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_list_group.html"> List Group </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_pricing_table.html"> Pricing Tables </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="component_lightbox.html"> Lightbox </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <!--Component-->



    </ul>

</nav>
