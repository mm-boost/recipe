@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <h4>作成したユーザー情報の編集ができます</h4>

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
                            <input type="text" class="form-control" name="nickname" value="{{ old('nickname', $setting_form->nickname) }}">
                        </div>
                    </div>
                     {{--  性別選択欄　ラジオボタン  --}}
                    <div class="form-group row">
                        <label class="col-md-2">性別(gender)</label>
                        <div class="col-sm-10" name=gemder>
                            　<input type="radio" name=gender value="男性" @if(old('gender' , $setting_form->gender) === "男性") checked @endif>男性
                            　<input type="radio" name=gender value="女性" @if(old('gender' , $setting_form->gender) === "女性") checked @endif>女性
                        </div>
                    </div>
                     {{--  年代選択設定　ドロップダウン  --}}
                    <div class="form-group row">
                        <label class="col-md-2">年齢(age)</label>
                        <div class="col-sm-10">
                            　<select name="age">
                              <?php $age = old('age' , $setting_form->age); ?>
                               <option value="">選択してください</option>
                               <option value="20歳未満" @if($age =='20歳未満') selected="selected" @endif>20歳未満</option>
                               <option value="20-29歳" @if($age =='20-29歳') selected="selected" @endif>20-29歳</option>
                               <option value="30-39歳" @if($age =='30-39歳') selected="selected" @endif>30-39歳</option>
                               <option value="40-49歳" @if($age =='40-49歳') selected="selected" @endif>40-49歳</option>
                               <option value="50-59歳" @if($age =='50-59歳') selected="selected" @endif>50-59歳</option>
                               <option value="60-69歳" @if($age =='60-69歳') selected="selected" @endif>60-69歳</option>
                               <option value="70-79歳" @if($age =='70-79歳') selected="selected" @endif>70-79歳</option>
                               <option value="80歳以上" @if($age =='80歳以上') selected="selected" @endif>80歳以上</option>
                              </select>
                        </div>
                    </div>

                    {{--<div class="form-group row">
                        <label class="col-md-2">身長(height)</label>
                        <div class="col-md-10">
                            <input type="text" size="10" id="height" name="height" value="{{ old('height') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">体重(weight)</label>
                        <div class="col-md-10">
                            <input type="text" size="10" id="weight" name="weight" value="{{ old('weight') }}">
                        </div>
                    </div>
                      BMI計算  
                    <div class="form-group row">
                        <label class="col-md-2">BMI計算(bmi)</label>
                        <div class="col-md-10">
                            <input type="text" size="10" id="bmi" name="bmi" value="{{ old('bmi') }}">
                            <input type="button" value="BMI計算">
                        </div>
                    </div>--}}

                     {{--  目標選択　ラジオボタン  --}}
                    <div class="form-group row">
                        <label class="col-md-2">目標(aim)</label>
                        <div class="col-md-10" name=aim>
                            <input type="radio" name="aim" value="健康維持" @if(old('aim' , $setting_form->aim) === "健康維持") checked @endif>健康維持
                            <input type="radio" name="aim" value="ダイエット・身体づくり" @if(old('aim' , $setting_form->aim) === "ダイエット・身体づくり") checked @endif>ダイエット・身体づくり
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $setting_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
              </div>
            </div>
@endsection
