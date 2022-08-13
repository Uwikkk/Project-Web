@extends('user.app')
@section('css')
<link href="{{ url('assets/common-css/layerslider.css') }}" rel="stylesheet">
<link href="{{ url('assets/01-homepage/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/01-homepage/css/responsive.css') }}" rel="stylesheet">
@endsection

@section('slider')
<div class="main-slider">
    <div id="slider">
        @foreach ($data['slider'] as $slider)
        <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
            <img src="{{ url($slider->image) }}" class="ls-bg" alt="{{ $slider->title }}" />

            <div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
                <a class="btn" href="{{ url('category/'.$slider->category_id) }}">{{App\Models\Category::find($slider->category_id)->name}}</a>
                <h3 class="title"><b>{{ $slider->tittle }}</b></h3>
                <h6>{{ date('d, M Y', strtotime($slider->created_at)) }}</h6>
            </div>

        </div><!-- ls-slide -->
        @endforeach
    </div><!-- slider -->
</div><!-- main-slider -->
@endsection

@section('content')
@foreach ($data['headline'] as $headline)
{{-- Headline --}}
<div class="single-post">
    <div class="image-wrapper"><img src="{{ url($headline->thumbnail) }}" alt="{{ $headline->tittle }}"></div>

    <div class="icons">
        <div class="left-area">
            <a class="btn caegory-btn" href="{{ url('category/'.$headline->category_id) }}"><b>{{ App\Models\Category::find($headline->category_id)->name }}</b></a>
        </div>
    </div>
    <h6 class="date"><em>{{ date('D, M Y', strtotime($headline->created_at)) }}</em></h6>
    <h3 class="title"><a href="{{ url('post-detail/'.$headline->id) }}"><b class="light-color">{{ $headline->tittle }}</b></a></h3>
    <p>{!! substr(preg_replace("/<[^>]*>/", '', strip_tags($headline->content)), 0, 300) !!}</p>
    <a class="btn read-more-btn" href="{{ url('post-detail/'.$headline->id) }}"><b>READ MORE</b></a>
</div><!-- single-post -->
@endforeach


<div class="row">
    @foreach ($data['latespost'] as $posts)
    <div class="col-lg-8 col-md-12">
        <div class="single-post">
            <div class="image-wrapper"><img src="{{ url($posts->thumbnail) }}" alt="{{ $posts->title }}"></div>

            <div class="icons">
                <div class="left-area">
                    <a class="btn caegory-btn" href="{{ url('category/'.$posts->categories_id) }}"><b>{{ App\Models\Category::find($posts->category_id)->name }}</b></a>
                </div>
            </div>
            <p class="date"><em>{{ date('D, M Y', strtotime($posts->created_at)) }}</em></p>
            <h3 class="title"><a href="{{ url('post-detail/'.$posts->id) }}"><b class="light-color">{{ $posts->title }}</b></a></h3>
            <p>{!! substr(preg_replace("/<[^>]*>/", '', strip_tags($posts->content)), 0, 300).(strlen(preg_replace("/<[^>]*>/", '', strip_tags($posts->content))) > 300 ? "..." : "") !!}</p>
            <a class="btn read-more-btn" href="{{ url('post-detail/'.$posts->id) }}"><b>READ MORE</b></a>
        </div>
    </div>
    @endforeach
</div>
@endsection