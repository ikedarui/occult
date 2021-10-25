@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-10 mx-auto mt-2">
                <h1>恐怖投稿</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 mx-auto mt-4">
                <a href="{{ action('PostController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8 mx-auto mt-4">
                <form action="{{ action('PostController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-1.5">都道府県</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-12 mx-auto mt-3">
                @foreach($posts as $index => $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="update">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="date">
                                    {{ str_limit($post->date, 150) }}
                                </div>
                                <div class="prefecture_id">
                                    {{ str_limit($post->prefecture->name, 150) }}
                                </div>
                                <div class="body mt-3" id="body-{{$post->id}}" style="display: none;">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                                    <button class="switch_btn" data-id="{{$post->id}}">詳細</button>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection