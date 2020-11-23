<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('レシピ投稿サイト')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-lg navbar-light navbar-laravel"> 
              <div class="container">

                <a class="navbar-brand" href="#">メニュー</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="{!! action('Admin\HomeController@home'); !!}">ホーム <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! action('Admin\RecipeController@add'); !!}">レシピ一覧</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! action('Admin\ShoppinglistController@add'); !!}">買い物メモ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! action('Admin\SettingController@add'); !!}">設定</a>
                    </li>
                    
                    <li class="nav-item">
　　　　　　　　　　　 {{-- onclick処理 --}}
　　　　　　　　　　　<onclick="history.back();">
　　　　　　　　　　　 {{-- href属性に設定 --}}
　　　　　　　　　　　<a class="nav-link" href="javascript:history.back()">戻る</a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </div>
    </body>
</html>