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
use App\RecipeHistory;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function form()
    {
        Log::debug('message');
        return view('/');
    }
 
    public function add()
    {
        $recipes = Recipe::all();
        return view('recipe/create');
    }

    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Recipe::$rules);
        // 配列のvalidation 

        $validatedData = $request->validate([
                'foodname.*' => 'nullable|string|max:20',
                'foodnum.*' => 'required_with:foodname.*,foodnum.*|max:10',
                'unit.*' => 'required_with:foodname.*,unit.*',
            ]);

try {
        // DB transaction 始める
        DB::beginTransaction();

        $recipe = new Recipe;
        $form = $request->all();

        $category = Category::find($form['category']);
        //dd($category);
        //dd($form['category']);
        $tool = Tool::find($form['tool']);
        $keyword = Keyword::find($form['keyword']);
        //$foodname = Food::find($form['foodname']);
        //$foodnum = Food::find($form['foodnum']);
        //$unit = Food::find($form['unit']);
        
    // formに画像があれば、保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $recipe->image_path = basename($path);
        } else {
            $recipe->image_path = null;
        }
      //unset()の前に配列のカラムを一時的に分ける
        $foodnames = $form['foodname'];
        $foodnums=$form['foodnum'];
        $units = $form['unit'];

      //フォームから送信されてきた_tokenを削除する
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
   
        //foodモデル（１対多）の設定
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

        // is develop
//exit;
         
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
    
    public function edit(Request $request)
    {
        $recipe = Recipe::find($request->id);
        Log::debug('設定取得結果', compact('recipe'));
        
        if(empty($recipe)) {
            abort(404);
        }
        
        $categorys = Category::all();
        $tools = Tool::all();
        $keywords = Keyword::all();
        $foods = Food::all();
        
        return view('recipe/edit',['recipe_form' => $recipe,"categorys" => $categorys,"tools" => $tools,"keywords" => $keywords,"foods" => $foods]);
    }

    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Recipe::$rules);
        $recipe = Recipe::find($request->id);

        $category = Category::find($form['category']);
        $tool = Tool::find($form['tool']);
        $keyword = Keyword::find($form['keyword']);
        $food = Food::find($form['food']);

        //送信されてきたフォームデータを格納する
        $recipe_form = $request->all();
            if ($request->remove == 'true') {
                $recipe_form['image_path'] = null;
            } elseif ($request->file('image')) {
                $path = $request->file('image')->store('public/image');
                $recipe_form['image_path'] = basename($path);
            } else {
                $recipet_form['image_path'] = $recipe->image_path;
            }

        //送信されてきたフォームデータを格納する
        $recipe_form = $request->all();
        unset($recipe_form['remove']);
        unset($recipe_form['_token']);
        unset($recipe_form['category']);
        unset($recipe_form['tool']);
        unset($recipe_form['keyword']);
        unset($recipe_form['food']);
        
        //該当するデータを上書きして保存する
        $recipe->fill($recipe_form);
        $recipe->category_id=$category->id;
        $recipe->tool_id=$tool->id;
        $recipe->keyword_id=$keyword->id;
        $recipe->food_id=$food->id;
        $recipe->save();
        
        $recipe_history = new RecipeHistory;
        $recipe_history->recipe_id = $recipe->id;
        $recipe_history->edited_at = Carbon::now();
        $recipe_history->save();

        return redirect('recipe/edit');
    }

    public function delete(Request $request)
    {
        $recipe = Recipe::find($request->id);
        $recipe->delete();

        return redirect()->back();
    }

    public function display(Request $request)
    {
        $posts = Recipe::all();

        return view('recipe/display',['posts' => $posts]);
    }

    public function index(Request $request)
    {
        $cond_menu = $request->menu;
        if ($cond_menu !='') {
            $posts = Recipe::where('title',$cond_menu)->get();
        } else {
            $posts = Recipe::all();
        }
        return view('recipe/index',['posts' => $posts,'cond_menu' => $cond_menu]);
    }

    public function category(Request $request)
    {
        $categories = Category::all();   // Eloquent"category"で全データ取得
        $cond_menu = $request->menu;
        if ($cond_menu !='') {
            $posts = Recipe::where('title',$cond_menu)->get();
        } else {
            $posts = Recipe::all();
        }
        return view('recipe/category',["categories" => $categories,'posts' => $posts,'cond_menu' => $cond_menu]);
    }

    public function tool(Request $request)
    {
        $tools = Tool::all();   // Eloquent"tool"で全データ取得
        $cond_menu = $request->menu;
        if ($cond_menu !='') {
            $posts = Recipe::where('title',$cond_menu)->get();
        } else {
            $posts = Recipe::all();
        }
        return view('recipe/tool',["tools" => $tools,'posts' => $posts,'cond_menu' => $cond_menu]);
    }

    public function keyword(Request $request)
    {   
        $keywords = Keyword::all();   // Eloquent"keyword"で全データ取得
        $cond_menu = $request->menu;
        if ($cond_menu !='') {
            $posts = Recipe::where('title',$cond_menu)->get();
        } else {
            $posts = Recipe::all();
        }
        return view('recipe/keyword',["keywords" => $keywords,'posts' => $posts,'cond_menu' => $cond_menu]);
    }
    
    public function list($id) //ルートで設定したidを取得
    {
        $tools = Tool::all(); 
        $posts = Recipe::all();  
        /*$categories = DB::table('categories')
                ->whereColumn('updated_id', '=', 'created_id')
                ->get();
        $keywords = DB::table('keywords')
                ->whereColumn('updated_id', '=', 'created_id')
                ->get();
        $tools = DB::table('tools')
                ->whereColumn('updated_id', '=', 'created_id')
                ->get();*/

        return view('recipe/tool/list',["tools" => $tools,'posts' => $posts,'id' => $id]);
    }

}  