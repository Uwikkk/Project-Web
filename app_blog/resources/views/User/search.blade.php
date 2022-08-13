@extends('user.app')
@section('css')
<link href="{{ url('assets/03-About-me/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/03-About-me/css/responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="recomend-area">
    <h4 class="title"><b class="light-color">Posts</b></h4>
    <div class="row">
        @foreach ($data['post'] as $posts)
        <div class="col-md-6">
            <div class="recomend">
                <div class="post-image"><img src="{{ url($posts->thumbnail) }}" alt="{{ $posts->tittle }}"></div>
                <div class="post-info">
                    <a class="btn category-btn" href="{{ url('category/'.$posts->category_id) }}">{{ App\Models\Category::find($posts->category_id)->name }}</a>
                    <h5 class="title"><a href="{{ url('post-detail/'.$posts->id) }}"><b class="light-color">{{ substr($posts->tittle, 0, 30).(strlen($posts->tittle) > 30 ? "..." : "") }}</b></a></h5>
                    <h6 class="date"><em>{{ date('D, M Y', strtotime($posts->created_at)) }}</em></h6>
                    <p class="text-justify">
                        {{ substr(preg_replace("/<[^>]*>/", '', strip_tags($posts->content)), 0, 50).(strlen($posts->content) > 50 ? "..." : "") }}
                    </p>
                </div><!-- post-info -->
            </div><!-- recomend -->
        </div><!-- col-md-6 -->
        @endforeach
    </div><!-- row -->
</div><!-- recomend-area -->
@endsection