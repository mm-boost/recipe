<?php
//$session = session('old');
//var_dump($session);
//exit;
?>

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
                <h5>レシピを新しく作成できます</h5>
                <form action="{{ action('Admin\RecipeController@create') }}" name="form1" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                     @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                     @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="cat">カテゴリ１ 料理のジャンル（必須）
                            　<select name="category" id="category">
                               <option value="">----選択してください----</option>
                               <option value="1" @if(old('category', '')=='1') selected @endif>和食</option>
                               <option value="2" @if(old('category', '')=='2') selected @endif>洋食</option>
                               <option value="3" @if(old('category', '')=='3') selected @endif>中華</option>
                               <option value="4" @if(old('category', '')=='4') selected @endif>肉料理</option>
                               <option value="5" @if(old('category', '')=='5') selected @endif>野菜料理</option>
                               <option value="6" @if(old('category', '')=='6') selected @endif>デザート</option>
                               <option value="7" @if(old('category', '')=='7') selected @endif>ドリンク</option>
                               <option value="8" @if(old('category', '')=='8') selected @endif>アジア料理</option>
                               <option value="9" @if(old('category', '')=='9') selected @endif>ヨーロッパ料理</option>
                               <option value="10" @if(old('category', '')=='10') selected @endif>その他</option>
                              </select>
                        </label>
                    </div>

                    <div class="form-group row">
                        <label class="cat">カテゴリ２ 調理法（必須）
                            　<select name="tool" id="tool">
                                <?php $tool = old('tool', ''); ?>
                               <option value="">----選択してください----</option>
                               <option value="1" @if($tool =='1') selected="selected" @endif>炊飯器</option>
                               <option value="2" @if($tool =='2') selected="selected" @endif>電子レンジ</option>
                               <option value="3" @if($tool =='3') selected="selected" @endif>鍋</option>
                               <option value="4" @if($tool =='4') selected="selected" @endif>フライパン</option>
                               <option value="5" @if($tool =='5') selected="selected" @endif>トースター</option>
                               <option value="6" @if($tool =='6') selected="selected" @endif>鉄板</option>
                               <option value="7" @if($tool =='7') selected="selected" @endif>その他</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group row">
                        <label class="cat">カテゴリ3 キーワード（必須）
                            　<select name="keyword" id="keyword">
                                <?php $keyword = old('keyword', ''); ?>
                               <option value="">----選択してください----</option>
                               <option value="1" @if($keyword =='1') selected="selected" @endif>お手軽</option>
                               <option value="2" @if($keyword =='2') selected="selected" @endif>作り置き</option>
                               <option value="3" @if($keyword =='3') selected="selected" @endif>低糖質・高タンパク</option>
                               <option value="4" @if($keyword =='4') selected="selected" @endif>節約</option>
                               <option value="5" @if($keyword =='5') selected="selected" @endif>その他</option>
                        　　　　</select>
                        </label>
                    </div>

                    <div class="form-group row">
                        <label class="menu">メニュー名（必須）
                            <input type="text" name="menu" size="50" value="{{ old('menu', '') }}"></label>
                    </div>

                    <div class="form-group row">
                        <label class="menu" >材料<span>__[大さじ1杯約15cc（ml）][小さじ1杯約5cc（ml）]</span>
                            <div>※分量・単位入力時は材料名の入力必須</div>
                            <div>
                                <input type="text" name="people" size="5" value="{{ old('people', '') }}">人分（必須）
                            </div>
                            <div class="col-md-10">
						 <table class="foodtable" id="food_table">
							<thead class="foodhead">
								<tr>
									<td class="foodname">材料名</td>
									<td class="foodnum">分量</td>
                                    <td class="foodnum">単位</td>
								</tr>
							</thead>
                            <tbody class="foodbody">
                                <tr>
                                    <td class="foodname"><input class=foodtex value="{{ old('foodname.0') }}" name="foodname[]" type="text" placeholder="食材名"></td>
                                    <td class="foodnum"><input class=food_num value="{{ old('foodnum.0') }}" name="foodnum[]" type="text" placeholder="数量"></td>
                                    <td class="foodunit">
                                        <select name="unit[]">
                                        <?php $unit = old('unit.0'); ?>
                                        <option value="">単位</option>
                                        <option value="cc" @if($unit =='cc') selected="selected" @endif>cc</option>
                                        <option value="ml" @if($unit =='ml') selected="selected" @endif>ml</option>
                                        <option value="g" @if($unit =='g') selected="selected" @endif>g</option>
                                        <option value="本" @if($unit =='本') selected="selected" @endif>本</option>
                                        <option value="個" @if($unit =='個') selected="selected" @endif>個</option>
                                        <option value="枚" @if($unit =='枚') selected="selected" @endif>枚</option>
                                        <option value="束" @if($unit =='束') selected="selected" @endif>束</option>
                                        <option value="袋" @if($unit =='袋') selected="selected" @endif>袋</option>
                                        <option value="缶" @if($unit =='缶') selected="selected" @endif>缶</option>
                                        <option value="房" @if($unit =='房') selected="selected" @endif>房</option>
                                        <option value="切" @if($unit =='切') selected="selected" @endif>切</option>
                                        <option value="合" @if($unit =='合') selected="selected" @endif>合</option>
                                        <option value="適量" @if($unit =='適量') selected="selected" @endif>適量</option>
                        　　　　         </select></td>
                                   <td class="food_del"><button class="fooddel" name="del">✖︎</button></td>
                                </tr>
                                <tr>
                                    <td class="foodname"><input class=foodtex value="{{ old('foodname.1') }}" name="foodname[]" type="text" placeholder="食材名"></td>
                                    <td class="foodnum"><input class=food_num value="{{ old('foodnum.1') }}" name="foodnum[]" type="text" placeholder="数量"></td>
                                    <td class="foodunit">
                                        <select name="unit[]">
                                        <?php $unit = old('unit.1'); ?>
                                        <option value="">単位</option>
                                        <option value="cc" @if($unit =='cc') selected="selected" @endif>cc</option>
                                        <option value="ml" @if($unit =='ml') selected="selected" @endif>ml</option>
                                        <option value="g" @if($unit =='g') selected="selected" @endif>g</option>
                                        <option value="本" @if($unit =='本') selected="selected" @endif>本</option>
                                        <option value="個" @if($unit =='個') selected="selected" @endif>個</option>
                                        <option value="枚" @if($unit =='枚') selected="selected" @endif>枚</option>
                                        <option value="束" @if($unit =='束') selected="selected" @endif>束</option>
                                        <option value="袋" @if($unit =='袋') selected="selected" @endif>袋</option>
                                        <option value="缶" @if($unit =='缶') selected="selected" @endif>缶</option>
                                        <option value="房" @if($unit =='房') selected="selected" @endif>房</option>
                                        <option value="切" @if($unit =='切') selected="selected" @endif>切</option>
                                        <option value="合" @if($unit =='合') selected="selected" @endif>合</option>
                                        <option value="適量" @if($unit =='適量') selected="selected" @endif>適量</option>
                        　　　　         </select></td>
                                   <td class="food_del"><button class="fooddel" name="del">✖︎</button></td>
                                </tr>
                                <tr>
                                    <td class="foodname"><input class=foodtex value="{{ old('foodname.2') }}" name="foodname[]" type="text" placeholder="食材名"></td>
                                    <td class="foodnum"><input class=food_num value="{{ old('foodnum.2') }}" name="foodnum[]" type="text" placeholder="数量"></td>
                                    <td class="foodunit">
                                        <select name="unit[]">
                                        <?php $unit = old('unit.2'); ?>
                                        <option value="">単位</option>
                                        <option value="cc" @if($unit =='cc') selected="selected" @endif>cc</option>
                                        <option value="ml" @if($unit =='ml') selected="selected" @endif>ml</option>
                                        <option value="g" @if($unit =='g') selected="selected" @endif>g</option>
                                        <option value="本" @if($unit =='本') selected="selected" @endif>本</option>
                                        <option value="個" @if($unit =='個') selected="selected" @endif>個</option>
                                        <option value="枚" @if($unit =='枚') selected="selected" @endif>枚</option>
                                        <option value="束" @if($unit =='束') selected="selected" @endif>束</option>
                                        <option value="袋" @if($unit =='袋') selected="selected" @endif>袋</option>
                                        <option value="缶" @if($unit =='缶') selected="selected" @endif>缶</option>
                                        <option value="房" @if($unit =='房') selected="selected" @endif>房</option>
                                        <option value="切" @if($unit =='切') selected="selected" @endif>切</option>
                                        <option value="合" @if($unit =='合') selected="selected" @endif>合</option>
                                        <option value="適量" @if($unit =='適量') selected="selected" @endif>適量</option>
                        　　　　         </select></td>
                                   <td class="food_del"><button class="fooddel" name="del">✖︎</button></td>
                                </tr>
                                <tr>
                                    <td class="foodname"><input class=foodtex value="{{ old('foodname.3') }}" name="foodname[]" type="text" placeholder="食材名"></td>
                                    <td class="foodnum"><input class=food_num value="{{ old('foodnum.3') }}" name="foodnum[]" type="text" placeholder="数量"></td>
                                    <td class="foodunit">
                                        <select name="unit[]">
                                        <?php $unit = old('unit.3'); ?>
                                        <option value="">単位</option>
                                        <option value="cc" @if($unit =='cc') selected="selected" @endif>cc</option>
                                        <option value="ml" @if($unit =='ml') selected="selected" @endif>ml</option>
                                        <option value="g" @if($unit =='g') selected="selected" @endif>g</option>
                                        <option value="本" @if($unit =='本') selected="selected" @endif>本</option>
                                        <option value="個" @if($unit =='個') selected="selected" @endif>個</option>
                                        <option value="枚" @if($unit =='枚') selected="selected" @endif>枚</option>
                                        <option value="束" @if($unit =='束') selected="selected" @endif>束</option>
                                        <option value="袋" @if($unit =='袋') selected="selected" @endif>袋</option>
                                        <option value="缶" @if($unit =='缶') selected="selected" @endif>缶</option>
                                        <option value="房" @if($unit =='房') selected="selected" @endif>房</option>
                                        <option value="切" @if($unit =='切') selected="selected" @endif>切</option>
                                        <option value="合" @if($unit =='合') selected="selected" @endif>合</option>
                                        <option value="適量" @if($unit =='適量') selected="selected" @endif>適量</option>
                        　　　　         </select></td>
                                   <td class="food_del"><button class="fooddel" name="del">✖︎</button></td>
                                </tr>
                            </tbody>
                        </table>
                             <button type="button" id="food_cre">追加</button></label>
                        </div>
                    </div>                     

                    <div class="form-group row">
                        <label class="menu">作り方
                        <div class="col-md-10">
                        <textarea name="howto" cols="70" rows="6" value="">{{ old('howto', '') }}</textarea></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="ima">画像
                            <input type="file" class="form-control-file" name="image"></label>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="追加">
                </form>
            </div>
        </div>
    </div>
@endsection



