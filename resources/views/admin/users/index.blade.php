@extends('layouts.admin')
@section('title', 'ユーザー管理')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ユーザ一管理</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('HomeController@index') }}" role="button" class="btn btn-primary">新規登録</a>
                <a href="{{ action('Admin\PostController@index') }}" role="button" class="btn btn-primary">投稿管理</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PostController@user') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
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
                                <th width="25%">名前</th>
                                <th width="30%">メールアドレス</th>
                                <th width="30%">パスワード</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ \Str::limit($user->name, 100) }}</td>
                                    <td>{{ \Str::limit($user->email, 100) }}</td>
                                    <td>{{ \Str::limit($user->password, 100) }}</td>
                                    <td>
                                        <a href="{{ action('Admin\PostController@delete2',['id' => $user->id]) }}">削除</a>
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