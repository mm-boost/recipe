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
        {{-- LaravelでjQueryを読み込みます 全ページ使用可能--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
                      <a class="nav-link" href="{!! action('Admin\RecipeController@index'); !!}">レシピ一覧<span class="caret"></span></a>
                        <ul>
                          <li><a class="nav-link" href="{!! action('Admin\CategoriesController@index'); !!}">ジャンル</a></li>
                          <li><a class="nav-link" href="{!! action('Admin\ToolController@index'); !!}">調理法</a></li>
                          <li><a class="nav-link" href="{!! action('Admin\KeywordController@index'); !!}">キーワード</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! action('Admin\ShoppinglistController@index'); !!}">買い物メモ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! action('Admin\SettingController@show'); !!}">プロフィール</a>
                      <ul>
                        <li><a class="nav-link" href="{!! action('Admin\SettingController@add'); !!}">新規作成</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                    {{-- href属性に設定 --}}
                      <a class="nav-link" href="#" onclick="history.back()">戻る</a>
                    </li>
                  </ul>
              </div>
          </div>
        </nav>
      {{-- ここまでナビゲーションバー --}}

        {{-- ヘッダー 
            <footer class="footer">
            <div class="container">
            <p class="text-muted">Place sticky footer content here.</p>
            </div>
            </footer> --}}
            
        <main class="py-4">
            {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            {{-- エラー発生時の動きを記述。 --}}
            @yield('content')
        </main>
    </div>

    {{-- jsファイルの読み込み --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>