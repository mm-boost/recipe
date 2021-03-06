<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipe;
use Log;
use App\Category;
use App\Tool;
use App\Keyword;
use App\Food;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    
    public function add()
    {
        $recipes = Recipe::all();
        return view('recipe/create');
    }

    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Recipe::$rules);
        $this->validate($request, Category::$rules);
        $this->validate($request, Tool::$rules);
        $this->validate($request, Keyword::$rules);
        // 配列のvalidation
        //required_with もし分量か単位が入力されていたら、指定の項目（foodname）も入力必須にする
        $validatedData = $request->validate([
            'foodname.*' => 'nullable|required_with:foodnum.*,unit.*|string|max:20',
            'foodnum.*' => 'nullable|max:10',
            'unit.*' => 'nullable',
            ]);

        try {
            // DB transaction 始める
            DB::beginTransaction();

            $form = $request->all();
            $recipe = new Recipe;
            $category = Category::find($form['category']);
            //dd($category);
            //dd($form['category']);
            $tool = Tool::find($form['tool']);
            $keyword = Keyword::find($form['keyword']);
        
            // フォームから画像が送信されてきたら、保存して、$recipe->image_path に画像のパスを保存する            
            if (isset($form['image'])) {
                $path = $request->file('image')->store('image/');
                 // パスから、最後の「ファイル名.拡張子」の部分だけ取得します 例)sample.jpg
                $recipe->image_path = basename($path);
                } else {
                $recipe->image_path = null; //Recipeテーブルのimage_pathカラムにnullを代入する
            }

            //unset()の前に配列のカラムを一時的に分ける
            $foodnames = $form['foodname'];
            $foodnums = $form['foodnum'];
            $units = $form['unit'];

            //フォームから送信されてきた余分なデータを削除する
            unset($form['_token']);
            unset($form['image']);
            unset($form['category']);
            unset($form['tool']);
            unset($form['keyword']);
            unset($form['foodname']);
            unset($form['foodnum']);
            unset($form['unit']);

            //データベースに保存する
            $recipe->fill($form);
            $recipe->category_id=$category->id;
            $recipe->tool_id=$tool->id;
            $recipe->keyword_id=$keyword->id;
            $recipe->save();

            //セーブしたidをすぐに取り出す	         
            $recipe_id = $recipe->id;

            //recipeに保存したfoodのidをfoodテーブルへ移す
            foreach ($foodnames as $key => $foodname) {
                if (null !== $foodname) {
                    var_dump($foodnames[$key]);
                    var_dump($foodnums[$key]);
                    var_dump($units[$key]);

                    $food = new Food();
                    $food->recipe_id = 	$recipe_id;
                    $food->foodname = $foodnames[$key];
                    $food->foodnum = $foodnums[$key];
                    $food->unit = $units[$key];

                    // foos DB SAVE
                    $food->save();
                }
            }
            // db commit　データベースの更新内容を確定。
            DB::commit();

            return redirect('recipe/index');
        } catch (Exception $e) {
            // db rollback　エラーが発生したら処理を取り消し。
            DB::rollBack();
            // redirect -> erroe message エラー処理
            //echo '捕捉した例外: ',  $e->getMessage(), "\n";
            Log::error($e->getMessage());
            //前の画面に戻る
            return redirect()->back()->withErrors($validatedData)->withInput($request->all);
        }
    }
    
    public function edit(Request $request,$id)
    {
        $recipe = Recipe::find($request->id);
        $food = Food::where('recipe_id', $id)->get();

        if(empty($recipe)) {
            Log::debug('リストが取得できなかった為「404」を返す');
            abort(404);
        }
        
        return view('recipe/edit', ['recipe_form' => $recipe, "foods" => $food]);
    }

    public function update(Request $request)
    {
        //validationを行う
        $this->validate($request, Recipe::$rules);
        $this->validate($request, Category::$rules);
        $this->validate($request, Tool::$rules);
        $this->validate($request, Keyword::$rules);
        // 配列のvalidation
        $validatedData = $request->validate([
            'foodname.*' => 'nullable|required_with:foodnum.*,unit.*|string|max:20',
            'foodnum.*' => 'nullable|max:10',
            'unit.*' => 'nullable',
            ]);

        try {
            // DB transaction 始める
            DB::beginTransaction();
    
            //$recipe_formにリクエストデータ全てを格納する。
            $recipe_form = $request->all();
            //リレーション先のモデルからデータを取得。各関数にcreate時の値がある状態。
            $category = Category::find($recipe_form['category']);
            $tool = Tool::find($recipe_form['tool']);
            $keyword = Keyword::find($recipe_form['keyword']);
            // RecipeModelもcreate時の値を受け取る。各リレーション先のidがある。
            $recipe = Recipe::find($request->id);

            //送信されてきた画像データを格納する
            if (isset($recipe_form['image'])) {
                $path = $request->file('image')->store('image/');
                Log::debug('store');
                //画像アップロード時に既に他の画像がアップロードされている場合に既存の画像を削除する処理
                Storage::delete('image/' . $recipe->image_path); 
                $recipe->image_path = basename($path);
                Recipe::find($request->id)->update(['image' => $recipe->image_path]);
            }

            //unset()の前にフォーム送信データの配列カラムを各関数に一時的に分ける
            if (isset($_POST["foodname"])) {
                $foodnames = $recipe_form['foodname'];           
             }
             if (isset($_POST["foodnum"])) {
                $foodnums = $recipe_form['foodnum'];	
            }
             if (isset($_POST["unit"])) {
                $units = $recipe_form['unit'];
            }
          
            //送信されてきたフォームデータを削除する
            unset($recipe_form['_token']);
            unset($recipe_form['image']);
            unset($recipe_form['category']);
            unset($recipe_form['tool']);
            unset($recipe_form['keyword']);
            unset($recipe_form['foodname']);
            unset($recipe_form['foodnum']);
            unset($recipe_form['unit']);

            //この段階で$recipe_formの中身は「メニュー」「人数」「作り方」「id」のみ
            //dd($recipe_form);
            //exit;
            
            //該当するデータを上書きして保存する。Recipe主テーブルと各カテゴリーテーブルの更新が完了
            $recipe->fill($recipe_form);
            $recipe->category_id=$category->id;
            $recipe->tool_id=$tool->id;
            $recipe->keyword_id=$keyword->id;
            $recipe->save();

            //セーブしたidをすぐに取り出す。$recipe_idにはレシピテーブルのidが有る	         
            $recipe_id = $recipe->id;
            //データが重複しないように、事前に元のテーブルデータを削除する
            Food::where('recipe_id', $recipe_id)->delete();

            //もし、foodに変更があればrecipeに保存したfoodのidをfoodテーブルへ移す
            if (isset($foodnames)) {
                foreach ($foodnames as $key => $value) {
                    if (null !== $value) {
                        var_dump($foodnames[$key]);
                        var_dump($foodnums[$key]);
                        var_dump($units[$key]);

                        $food = new Food();
                        $food->recipe_id = 	$recipe_id;
                        $food->foodname = $foodnames[$key];
                        $food->foodnum = $foodnums[$key];
                        $food->unit = $units[$key];
                        // foos DB SAVE
                        $food->save();
                    }
                }
            }
            //db commit　データベースの更新内容を確定。
            DB::commit();
            return redirect()->back();

        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            //前の画面に戻る
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
    }

    public function delete(Request $request,$id)
    {
        $recipe = Recipe::find($request->id);

        //画像ファイルを削除する
        //取得したデータからimage_pathカラム(ファイルの名前)の情報を取得し、削除
        $delImage = $recipe->image_path;        
        Storage::delete('image/'.$delImage); 
        Log::debug('message');

        //Storage::deleteDirectory('image/');

        //テーブルを削除
        $recipes = Recipe::where('id', $id);
        DB::transaction(function () use ($recipes) {
            $recipes->delete();
        });
        return redirect()->back();
    }

    public function show(Request $request,$id)
    {
        $recipe_form = Recipe::find($request->id);
        $food = Food::where('recipe_id', $id)->get();

        return view('recipe.show', ['recipe_form' => $recipe_form, "foods" => $food, 'id' => $id]);
    }

    public function index()
    {
        $posts = Recipe::all();

        return view('recipe/index', ['posts' => $posts]);
    }
}
