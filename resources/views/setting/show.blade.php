@extends('layouts.admin')
@section('title', 'プロフィール画面')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <a href="{{ action('Admin\SettingController@edit') }}" role="button" class="btn btn-primary">プロフィール修正</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="list-news col-md-12 mx-auto">
                    <table class="pro">
                        <tr><th class="my2">ニックネーム</th><td class="my3">{{$setting->nickname}}</td></tr>
                        <tr><th class="my2">年齢</th><td class="my3">{{$setting->age}}</td></tr>
                        <tr><th class="my2">性別</th><td class="my3">{{$setting->gender}}</td></tr>
                        <tr><th class="my2">目的</th><td class="my3">{{$setting->aim}}</td></tr>
                    </table> 
                </div>
            </div>
        </div>
    </div>
@endsection