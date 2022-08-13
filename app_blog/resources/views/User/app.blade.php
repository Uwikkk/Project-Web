<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$tittle}}</title>
    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->

    <link href="{{ url('assets/common-css/bootstrap.css' )}}" rel="stylesheet">
    <link href="{{ url('assets/common-css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/common-css/layerslider.css') }}" rel="stylesheet">
    <link href="{{ url('assets/01-homepage/css/styles.css') }}" rel="stylesheet">
    <link href="{{url('assets/01-homepage/css/responsive.css') }}" rel="stylesheet">

    @yield('css')

</head>

<body>
    <header>
        <div class="middle-menu center-text"><a href="#" class="logo"><img src="{{ url('assets/images/logo.png') }}" alt="Logo"></a></div>
        <div class="bottom-area">
            <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
            <!-- Main Menu -->
            <ul class="main-menu visible-on-click" id="main-menu">
                @php
                $data['mainmenu'] = DB::table('mainmenu')->where('status', 1)->where('parent', 0)->orderBy('order', 'asc')->get();
                @endphp

                @foreach ($data['mainmenu'] as $menu)
                @php
                $data['mainmenu2'] = DB::table('mainmenu')->where('status', 1)->where('parent', $menu->id)->orderBy('order', 'asc')->get();
                @endphp

                @if (count($data['mainmenu2']) > 0)
                <li class="drop-down"><a href="#!">{{ $menu->tittle }} <i class="ion-ios-arrow-down"></i></a>
                    <ul class="drop-down-menu">
                        @foreach ($data['mainmenu2'] as $menu2)
                        @if ($menu2->category == 'link')
                        <li><a href="{{ url($menu2->url) }}">{{ $menu2->tittle }}</a></li>
                        @else
                        <li><a href="{{ url('menu/'.$menu2->id) }}">{{ $menu2->title }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </li>
                @else
                @if($menu->category == 'link')
                <li><a href="{{ url($menu->url) }}">{{ $menu->tittle }}</a></li>
                @else
                <li><a href="{{ url('menu/'.$menu->id) }}">{{ $menu->tittle }}</a></li>
                @endif
                @endif
                @endforeach

            </ul>
            <!-- End Main Menu -->
        </div>
    </header>

    @yield('slider')

    <section class="section blog-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-posts">
                        @yield('content')
                    </div><!-- blog-posts -->
                </div><!-- col-lg-4 -->


                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-area">

                        <div class="sidebar-section src-area">

                            <form action="{{ url('search') }}" action="GET">
                                <input class="src-input" type="text" name="search" placeholder="Search">
                                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>

                        </div><!-- sidebar-section src-area -->

                        <div class="sidebar-section about-author center-text">
                            <div class="author-image"><img src="{{ url($data['user']->image) }}" alt="{{ $data['user']->name }}"></div>
                            <hr>

                            <h4 class="author-name"><b class="light-color">{{ $data['user']->name }}</b></h4>
                            {!! $data['user']->desc !!}

                            {{-- <div class="signature-image"><img src="images/signature-image.png" alt="Signature Image"></div>
							<a class="read-more-link" href="#"><b>READ MORE</b></a> --}}

                        </div><!-- sidebar-section about-author -->

                        <div class="sidebar-section category-area">
                            <h4 class="title"><b class="light-color">Category</b></h4>
                            @foreach($data['category'] as $category)
                            <a class="category" href="{{ url('category/'.$category->id) }}">
                                <img src="{{ url($category->image) }}" alt="{{ $category->name }}">
                                <h6 class="name">{{ $category->name }}</h6>
                            </a>
                            @endforeach
                        </div><!-- sidebar-section category-area -->

                        <div class="sidebar-section latest-post-area">
                            <h4 class="title"><b class="light-color">Latest Posts</b></h4>
                            @foreach ($data['latespost'] as $posts)
                            <div class="latest-post" href="{{ url('post-detail/'.$posts->id) }}">
                                <div class="l-post-image"><img src="{{ url($posts->thumbnail) }}" alt="{{ $posts->title }}"></div>
                                <div class="post-info">
                                    <a class="btn category-btn" href="{{ url('category/'.$posts->category_id) }}">{{ $posts->tittle }}</a>
                                    <h6 class="date"><em>{{ date('D, M Y', strtotime($posts->created_at)) }}</em></h6>
                                </div>
                            </div>
                            @endforeach
                        </div><!-- sidebar-section latest-post-area -->

                        <div class="sidebar-section tags-area">
                            <h4 class="title"><b class="light-color">Tags</b></h4>
                            <ul class="tags">
                                @foreach ($data['category'] as $category)
                                <li><a class="btn" href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- sidebar-section tags-area -->


                    </div><!-- about-author -->
                </div><!-- col-lg-4 -->
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <div class="footer-section">
                        <p class="copyright">Bimbingan Karir &copy; {{date('Y')}}. All rights reserved</p>
                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->

            </div><!-- row -->
        </div><!-- container -->
    </footer>

    <!-- SCIPTS -->
    <script src="{{ url('assets/common-js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ url('assets/common-js/tether.min.js') }}"></script>
    <script src="{{ url('assets/common-js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/common-js/layerslider.js') }}"></script>
    <script src="{{ url('assets/common-js/scripts.js') }}"></script>
</body>

</html>