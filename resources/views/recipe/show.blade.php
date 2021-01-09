@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
            <h2>レシピ閲覧画面</h2>

        <div class="recipe1">
                <label class="cat">カテゴリ１<span>料理のジャンル</span>
                    <select name="category" id="category">
                        <option value="">----選択してください----</option>
                        <option value="1" @if(old('category', $recipe_form->category_id)=='1') selected @endif>和食</option>
                        <option value="2" @if(old('category', $recipe_form->category_id)=='2') selected @endif>洋食</option>
                        <option value="3" @if(old('category', $recipe_form->category_id)=='3') selected @endif>中華</option>
                        <option value="4" @if(old('category', $recipe_form->category_id)=='4') selected @endif>肉料理</option>
                        <option value="5" @if(old('category', $recipe_form->category_id)=='5') selected @endif>野菜料理</option>
                        <option value="6" @if(old('category', $recipe_form->category_id)=='6') selected @endif>デザート</option>
                        <option value="7" @if(old('category', $recipe_form->category_id)=='7') selected @endif>ドリンク</option>
                        <option value="8" @if(old('category', $recipe_form->category_id)=='8') selected @endif>アジア料理</option>
                        <option value="9" @if(old('category', $recipe_form->category_id)=='9') selected @endif>ヨーロッパ料理</option>
                        <option value="10" @if(old('category', $recipe_form->category_id)=='10') selected @endif>その他</option>
                    </select>
                </label>
                <label class="cat">カテゴリ２<span>調理法</span>
                    <select name="tool" id="tool">
                        <?php $tool = old('tool', $recipe_form->tool_id); ?>
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
                <label class="cat">カテゴリ3<span>キーワード</span>
                    　<select name="keyword" id="keyword">
                        <?php $keyword = old('keyword' , $recipe_form->keyword_id); ?>
                        <option value="">----選択してください----</option>
                        <option value="1" @if($keyword =='1') selected="selected" @endif>お手軽</option>
                        <option value="2" @if($keyword =='2') selected="selected" @endif>作り置き</option>
                        <option value="3" @if($keyword =='3') selected="selected" @endif>低糖質・高タンパク</option>
                        <option value="4" @if($keyword =='4') selected="selected" @endif>節約</option>
                        <option value="5" @if($keyword =='5') selected="selected" @endif>その他</option>
                　　　　</select>
                </label>
        </div>

        <div>
            <label class="recipe2">メニュー名
                <div>
                    <input type="text" name="menu" size="25" value="{{ \Str::limit($recipe_form->menu, 80) }}">
                </div>
            </label>
        </div>
        <div>
            <label class="recipe3">材料<span>__[大さじ1杯約15cc（ml）][小さじ1杯約5cc（ml）]</span>
                <div>
                    <input type="text" name="people" size="5" value="{{ old('people',$recipe_form->people) }}">人分
                </div>
                <div>
                    <table class="showtable">
                            <tr>
                                <th class="recipe_th">材料名</th>
                                <th class="recipe_th">分量</th>
                                <th class="recipe_th">単位</th>
                            </tr>
                            @foreach ($foods as $food)
                            <tr>
                            <td class="recipe_td">{{ \Str::limit($food->foodname, 80) }}</td>
                            <td class="recipe_td">{{ \Str::limit($food->foodnum, 80) }}</td>
                            <td class="recipe_td">{{ \Str::limit($food->unit, 80) }}</td>
                            </tr>
                            @endforeach
                　  </table>
                </div>
            </label>
        </div>
        <div class="recipe4">
            <label>作り方
                <div class="col-md-10">
                    <textarea name="howto" cols="70" rows="6" maxlength="400" value="">{{ \Str::limit($recipe_form->howto, 500) }}</textarea>
                </div>
            </label>
        </div>
        <div class="recipe1">
            <label class="cat">画像
                <div>{{ \Str::limit($recipe_form->image, 250) }}</div>
            </label>
        </div>

    </div>
@endsection
