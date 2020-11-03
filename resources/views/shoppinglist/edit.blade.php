@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>買い物リスト</h2>
                <form action="{{ action('Admin\ShoppinglistController@update') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="title" size="30" value="{{ old('title') }}"></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea name="contents" style="width:500px; height:200px;" value="{{ old('contents') }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                </form>
                    <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>更新履歴</h2>
                        <ul class="list-group">
                           @if ($profile_form->profile_histories!= NULL)
                             @foreach ($profile_form->profile_histories as $profile_history)
                               <li class="list-group-item">{{ $profile_history->edited_at }}</li>
                             @endforeach
                           @endif
                        </ul>
                    </div>
                </div>
              </div>
            </div>
@endsection
