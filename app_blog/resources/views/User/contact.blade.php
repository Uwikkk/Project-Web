@extends('user.app')
@section('css')
<link href="{{ url('assets/02-Single-post/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/02-Single-post/css/responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="single-post">
    <div class="image-wrapper"><img src="{{url(('assets/images/blog-8-1000x600.jpg'))}}" alt="User Image"></div>
    <h3 class="title"><b class="light-color">Contact Me</b></h3>
    <p class="desc">
        Jika mengalami masalah saat mengakses website, ada kekliruan dalam isi konten atau memiliki kritik dan saran harap kontak kami segera, Terimakasih !
    </p>
</div> <!-- akhir single post -->
<div class="leave-comment-area">
    <h4 class="title"><b class="light-color">Leave a Comment</b></h4>
    <hr>
    <br>
    @if (Session::has('status'))
    <div class="alert alert-warning" role="alert">
        {{ Session::get('status') }}
    </div>
    @endif
    <div class="leave-comment">
        <form action="{{url('contact')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="name" placeholder="Nama Lengkap" class="name-input">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="email" placeholder="Email" class="email-input">
                </div>
                <div class="col-sm-12">
                    <input type="text" name="subject" placeholder="Subject" class="subject-input">
                </div>
                <div class="col-sm-12">
                    <textarea name="message" id="message" placeholder="Pesan atau Saran Anda" class="message-input" cols="30" rows="10"></textarea>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-2"><b>COMMENT</b></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection