@extends('layouts.front')

@section('content')
    <div class="card container">
        <div class="row">
            <div class="posts col-md-10 mx-auto mt-5">
                <h1>割とガチな恐怖投稿</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 mx-auto mt-4">
                <a href="{{ action('PostController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-7 mx-auto mt-4">
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
            <div class="posts col-md-13 mx-auto mt-3">
                @foreach($posts as $index => $post)
                    <div class="post">
                        <div class="row">
                            <div class="hidari col-md-3">
                                <div class="update">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                            </div>
                            <div class="text col-md-4">
                                <div class="prefecture_id">
                                    場所　{{ str_limit($post->prefecture->name, 150) }}
                                </div>
                                <div class="date">
                                    体験日　{{ str_limit($post->date, 150) }}
                                </div>
                                <div class="aa col-md-6.5 mt-2">
                                    <p class="border border-secondary text-center bg-warning ">名前：{{ $post->user->name }}</p>
                                </div>
                            </div>
                            <div class="migi col-md-5">
                                <div class="body mt-2" id="body-{{$post->id}}" style="display: none;">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                                <button class="switch_btn" data-id="{{$post->id}}">詳細</button>
                                @if($post->user_id == Auth::id())
                                    <a href="{{ action('PostController@edit', ['id' => $post->id]) }}" role="button" class="btn btn-warning">編集</a>
                                @endif
                                
                                @foreach ($post->comments as $comment)
                                <div class="text col-md-8 mt-3">
                                    <button class="switch_btn2" data-id="{{$comment->id}}">コメントを見る</button>
                                    <div class="comments mt-1" id="comments-{{$comment->id}}" style="display: none;">
                                        <p class="border border-secondary text-center bg-warning">{{ $comment->user->name }}</p>
                                        <div class="comment">
                                            {{ str_limit($comment->comment,100) }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="comment_form">
                                    <div class="row">
                                        <form action="{{ action('CommentsController@store') }}" method="post">
                                            <div class="form-group row mt-2">
                                                <div class="col-md-8">
                                                    コメント<input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    {{ csrf_field() }}
                                                    <input type="submit" class="btn btn-primary" value="コメントする">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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