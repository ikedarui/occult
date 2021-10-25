@extends('layouts.admin')
@section('title', '心霊投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>心霊投稿管理</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('PostController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                <a href="{{ action('Admin\PostController@user') }}" role="button" class="btn btn-primary">ユーザー管理</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PostController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
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
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="20%">日付</th>
                                <th width="10%">都道府県</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ \Str::limit($post->title, 100) }}</td>
                                    <td>{{ \Str::limit($post->date, 100) }}</td>
                                    <td>{{ \Str::limit($post->prefecture->name, 100) }}</td>
                                    <td>{{ \Str::limit($post->body, 250) }}</td>
                                    <td>
                                        <a href="{{ action('Admin\PostController@delete',['id' => $post->id]) }}">削除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
