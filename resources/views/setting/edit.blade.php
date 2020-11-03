@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\SettingController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">ニックネーム(nickname)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                     {{--  性別選択欄　ラジオボタン  --}}
                    <div class="form-group row">
                        <label class="col-md-2">性別(gender)</label>
                        <div class="col-sm-10">
                            　<input type="radio" name="gender" checked="checked" value="man">男性
                            　<input type="radio" name="gender" value="woman">女性
                            　<input type="radio" name="gender" value="neither">中性
                        </div>
                    </div>
                     {{--  年代選択設定　ドロップダウン  --}}
                    <div class="form-group row">
                        <label class="col-md-2">年齢(age)</label>
                        <div class="col-sm-10">
                            　<select name="age">
                               <option value="">選択してください</option>
                               <option value="20歳未満">20歳未満</option>
                               <option value="20-29歳">20-29歳</option>
                               <option value="30-39歳">30-39歳</option>
                               <option value="40-49歳">40-49歳</option>
                               <option value="50-59歳">50-59歳</option>
                               <option value="60-69歳">60-69歳</option>
                               <option value="70-79歳">70-79歳</option>
                               <option value="80歳以上">80歳以上</option>
                              </select>
                        </div>
                    </div>
                     {{--  目標選択　ラジオボタン  --}}
                    <div class="form-group row">
                        <label class="col-md-2">目標(aim)</label>
                        <div class="col-md-10">
                            <input type="radio" name="aim" value="1" checked="checked">健康維持
                            <input type="radio" name="aim" value="2">ダイエット・身体づくり
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
