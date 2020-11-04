@extends('layouts.admin')
@section('title', 'プロフィール画面')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\SettingController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\SettingController@index') }}" method="get"></form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ニックネーム</th>
                                <th width="10%">年齢</th>
                                <th width="10%">性別</th>
                                <th width="10%">目的</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $setting)
                                <tr>
                                    <th>{{ $setting->id }}</th>
                                    <td>{{ \Str::limit($setting->nickname, 100) }}</td>
                                    <td>{{ \Str::limit($setting->gender, 50) }}</td>
                                    <td>{{ \Str::limit($setting->age, 50) }}</td>
                                    <td>{{ \Str::limit($setting->aim, 50) }}</td>
                                    <td>
                                    　<div>
                                        <a href="{{ action('Admin\SettingController@edit', ['id' => $setting->id]) }}">編集</a>
                                    　</div>
                                      <div>
                                        <a href="{{ action('Admin\SettingController@delete', ['id' => $setting->id]) }}">削除</a>
                                      </div>
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