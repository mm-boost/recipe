@extends('layouts.admin')
@section('title', 'プロフィール画面')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\SettingController@index') }}" method="get"></form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                    <table class="pro">
                        <tr><th class="my2">ニックネーム</th><td class="my3">ai</td></tr>
                        <tr><th class="my2">年齢</th><td class="my3">a</td></tr>
                        <tr><th class="my2">性別</th><td class="my3">v</td></tr>
                        <tr><th class="my2">目的</th><td class="my3">c</td></tr>
                    </table> 
            </div>
        </div>
    </div>
@endsection