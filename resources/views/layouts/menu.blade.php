<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            {{-- メニューバーです。 --}}
             <div class="cp_navi">
             <ul>
	            <li><a href="#">レシピのメニュー</a></li>
	             <li>
		            <a href="#">料理のジャンル<span class="caret"></span></a>
		        <div>
			       <ul>
				          <li><a href="#cat">cat</a></li>
				          <li><a href="#dog">dog</a></li>
				          <li><a href="#rabbit">rabbit</a></li>
			      </ul>
		       </div>
	            </li>
	              <li><a href="#">調理法</a></li>
	              <li><a href="#">キーワード</a></li>
              </ul>
           </div>
            {{-- ここまでメニューバー --}}
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
         </div>
      </div>
    </body>
</html>