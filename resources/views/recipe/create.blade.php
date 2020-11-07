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
                        <label class="cat">カテゴリ１ 料理のジャンル
                            　<select name="category1" id="category1">
                               <option value="">----選択してください----</option>
                               <option value="1">和食</option>
                               <option value="2">洋食</option>
                               <option value="3">中華</option>
                               <option value="4">肉料理</option>
                               <option value="5">野菜料理</option>
                               <option value="6">デザート</option>
                               <option value="7">ドリンク</option>
                               <option value="8">アジア料理</option>
                               <option value="9">ヨーロッパ料理</option>
                               <option value="10">その他</option>
                              </select>
                        </label>
                    </div>

                    <div class="form-group row">
                        <label class="cat">カテゴリ２ 調理法
                            　<select name="category2" id="category2">
                               <option value="">----選択してください----</option>
                               <option value="1">炊飯器</option>
                               <option value="2">電子レンジ</option>
                               <option value="3">鍋料理</option>
                               <option value="4">フライパン</option>
                               <option value="5">トースター</option>
                               <option value="6">鉄板</option>
                              </select>
                        </label>
                    </div>

                    <div class="form-group row">
                        <label class="cat">カテゴリ3 キーワード
                            　<select name="category3" id="category3">
                               <option value="">----選択してください----</option>
                               <option value="1">お手軽</option>
                               <option value="2">作り置き</option>
                               <option value="3">低糖質・高タンパク</option>
                               <option value="4">節約</option>
                        　　　　{{--@foreach ($keys as $key)
                        　　　　<option value="{{$key->id}}">{{ $key->keyname }}</option>
                        　　　　　@endforeach--}}
                        　　　　</select>
                        　　　　<input type="text" name="key" value="">
                        　　　　<input type="button" name="key" value="項目追加" onClick="addSelectItem()">
                        </label>
                    </div>

                    <div class="form-group row">
                        <label class="menu">メニュー名
                            <input type="text" name="menu" size="50" value="{{ old('menu') }}"></label>
                    </div>

                    <div class="form-group row">
                        <label class="menu" >材料（1人分)<span>__[大さじ1杯約15cc（ml）][小さじ1杯約5cc（ml）]</span>
                        <div class="col-md-10">
						 <table class="foodtable">
							<thead class="foodhead">
								<tr>
									<td class="foodname">材料名</td>
									<td class="foodnum">分量</td>
								</tr>
							</thead>
                            <tbody class="foodbody">
                                <tr>
                                   <td class="foodname"><input class=foodtex value="" name="foodname" type="text" placeholder="食材名"></td>
                                   <td class="foodnum"><input value="" name="foodnum" type="text" placeholder="数量"></td>
                                   <td class="food_del"><input value="✖︎" name="del" type="submit"></td>
                                </tr>
                                <tr>
                                   <td class="foodname"><input class=foodtex value="" name="foodname" type="text" placeholder="食材名"></td>
                                   <td class="foodnum"><input value="" name="foodnum" type="text" placeholder="数量"></td>
                                   <td class="food_del"><input value="✖︎" name="del" type="submit"></td>
                                </tr>
                                <tr>
                                   <td class="foodname"><input class=foodtex value="" name="foodname" type="text" placeholder="食材名"></td>
                                   <td class="foodnum"><input value="" name="foodnum" type="text" placeholder="数量"></td>
                                   <td class="food_del"><input value="✖︎" name="del" type="submit"></td>
                                </tr>
                                </tbody>
                        </table>
                             <input type="submit" name="create" value="追加" >
                        </label>
                        </div>
                    </div>                     

                    <div class="form-group row">
                        <label class="menu">作り方
                        <div class="col-md-10">
                        <textarea name="howto" cols="70" rows="6" maxlength="400" value="{{ old('howto') }}"></textarea></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="cat">画像
                            <input type="file" class="form-control-file" name="image"></label>
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



