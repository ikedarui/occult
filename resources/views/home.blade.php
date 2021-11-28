@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="example">
            <img src="https://eiga.k-img.com/images/special/3024/00e3d4dd2408dfe6/640.jpg?1570674864"　width="1400" height="900" alt="殺人ピエロ">
            <p>オカルトクラブへようこそ。</p>
            <div class="col-md-18">
                <ul class="navigation">
                  <li class="momo"><a href="/">Top</a></li>
                  <li class="inu"><a href="{{ action('PostController@add') }}">NewPost</a></li>
                  <li class="saru"><a href="{{ action('PostController@index') }}">みんなの投稿</a></li>
                  <li class="kizi"><a href="#">お問い合わせ</a></li>
                </ul>
                <div class="card">
                    <div class="card-header">Dashboard</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                    　　ログインしました。
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
