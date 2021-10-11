@extends('layouts.new')


@section('title','オカルトクラブ')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>心霊体験投稿画面</h1>
                <form action="{{ action('Admin\PostController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">日付</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="date" value="{{ old('date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">都道府県</lavel>
                        <div class="col-md-10">
                            {{ Form::select('prefecture_id', App\Prefecture::selectlist(), old('prefecture_id'), ['class' => 'form-control', 'id' => '', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">体験内容</lavel>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="17">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">証拠動画</lavel>
                        <div class="col-md-10">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection