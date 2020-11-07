{{-- layoutsを読み込む --}}
@extends('layouts.admin')
{{-- admin.blade.phpの@yield('title')に'ホーム画面'を埋め込む --}}
@section('title', 'レシピリスト')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピ新規作成</h2>
                <form action="{{ action('Admin\RecipeController@create') }}" name="form1" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                     @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                     @endforeach
                        </ul>
                    @endif

                    <div class="form-group row">
                        <label class="col-md-2">カテゴリ１</label>
                        <div class="col-sm-10">
                            　<select name="category1" id="category1">
                               <option value="">----選択してください----</option>
                               <option value="1">和食</option>
                               <option value="2">洋食</option>
                               <option value="3">中華</option>
                               <option value="4">肉料理</option>
                               <option value="5">野菜料理</option>
                               <option value="6">鍋料理</option>
                               <option value="7">デザート</option>
                               <option value="8">ドリンク</option>
                               <option value="9">アジア料理</option>
                               <option value="10">ヨーロッパ料理</option>
                               <option value="11">その他</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">カテゴリ２</label>
                        <div class="col-sm-10">
                            　<select name="category2" id="category2">
                               <option value="">----選択してください----</option>
                               <option value="1">炊飯器</option>
                               <option value="2"></option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">メニュー名</label>
                        <div class="col-md-10">
                            <input type="text" name="menu" size="25" value="{{ old('menu') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">材料（1人分）</label>
                        <div class="col-md-10">
                        <textarea name="food" cols="50" rows="4" maxlength="150" value="{{ old('food') }}"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">手順</label>
                        <div class="col-md-10">
                        <textarea name="howto" cols="50" rows="4" maxlength="150" value="{{ old('howto') }}"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" name="create" value="追加" >
                </form>
                <script type="text/javascript">
                </script>
            </div>
        </div>
    </div>
@endsection



