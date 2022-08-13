@extends('user.app')
@section('css')
<link href="{{ url('assets/02-Single-post/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/03-Single-post/css/responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="single-post">
    <div class="image-wrapper"><img src="{{url($post->thumbnail)}}" alt="Blog Page"></div>
    <div class="icons">
        <div class="left-area">
            <a class="btn category-btn" href="{{ url('category/'.$post->category_id) }}"><b>{{ App\Models\Category::find($post->category_id)->name }}</b></a>
        </div>
        <ul class="right-area social-icons">
            <li><a href="#"><i class="ion-android-textsms"></i>{{ count($data['comment']) }}</a></li>
        </ul>
    </div>
    <p class="date"><em>{{ date('D, M Y', strtotime($post->created_at)) }}</em></p>
    <h3 class="title"><a href="#"><b class="light-color">{{ $post->tittle }}</b></a></h3>
    {!! $post->content !!}
</div><!-- akhir single post  -->

<div class="post-author">
    <div class="author-image"><img src="{{ url($data['user']->image) }}" alt="{{$data['user']->name}}"></div>
    <div class="author-info">
        <h4 class="name"><b class="light-color">{{$data['user']->name}}</b></h4>
        {!! $data['user']->desc !!}
    </div>
</div>
<!-- akhir post-author -->

<div class="comments-area">
    <h4 class="title"><b class="light-color">{{ count($data['comment']) }} Comments</b></h4>

    @foreach ($data['comment'] as $komen)
    <div class="comment">
        <div class="author-image"><img src="{{ url($data['user']->image) }}" alt="{{$data['user']->name}}"></div>
        <div class="comment-info">
            <h5><b class="light-color">{{ $komen->name }}</b></h5>
            <h6 class="date"><em>{{ date('D, M Y', strtotime($komen->created_at)) }}</em></h6>
            <p>{{$komen->comment}}</p>
        </div>
    </div>
    @endforeach

</div>

<div class="leave-comment">
    <hr>
    <br>
    @if (Session::has('status'))
    <div class="alert alert-warning" role="alert">
        {{ Session::get('status') }}
    </div>
    @endif
    <form action="{{ url('comment') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <div class="row">
            <div class="col-sm-12">
                <input type="text" name="name" placeholder="Nama Lengkap" class="name-input">
            </div>
            <div class="col-sm-12">
                <textarea name="comment" id="comment" placeholder="Pesan atau Saran Anda" class="message-input" cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-2"><b>COMMENT</b></button>
            </div>
        </div>
    </form>
</div>
@endsection