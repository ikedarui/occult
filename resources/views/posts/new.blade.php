@extends('layouts.new')


@section('title','オカルトクラブ')


@section('content')
<img src="https://dochub.com/ruisandes0118/EB5r38Awl8QMkm8wXzZ1kD/image-18-png" width="1800" height="980" alt="怪しい風景">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h1 class="ti">恐怖体験投稿</h1>
                <form action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="a">
                        <div class="form-group row">
                            <label class="col-md-4">タイトル</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                    </div>
                    <div class="i">
                        <div class="form-group row">
                            <lavel class="col-md-4">都道府県</lavel>
                            <div class="col-md-12">
                                {{ Form::select('prefecture_id', App\Prefecture::selectlist(), old('prefecture_id'), ['class' => 'form-control', 'id' => '', 'required' => 'required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="u">
                        <div class="form-group row">
                            <lavel class="col-md-4">体験日</lavel>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="date" value="{{ old('date') }}">
                            </div>
                        </div>
                    </div>
                    <div class="e">
                        <div class="form-group row">
                            <lavel class="col-md-4">体験内容</lavel>
                            <div class="col-md-12">
                                <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="o">
                        <input type="submit" class="btn btn-primary" value="投稿">
                    </div>
                    <div class="k">
                        <a href="{{ action('PostController@index') }}" role="button" class="btn btn-primary">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection