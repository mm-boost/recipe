<?php

namespace App\Http\Controllers;

use App\Libs\Setting;
use Illuminate\Routing\Controller;

/**
 * レシピサイトコントローラー
 * レシピサイト全体のコントローラー
 *
 * Class RecipesiteController
 *
 * @package App\Http\Controllers
 */
class RecipesiteController extends Controller
{
    /** @var array ユーザデータ */
    private $userInfo;
    
    /**
     * RecipesiteController constructor.
     */
    public function __construct()
    {
        $Setting = new Setting();
        $this->setUserInfo($Setting->getUserInfo());
    
    }
    
    /**
     * ユーザ情報の取得
     *
     * @return array
     */
    public function getUserInfo(): array
    {
        return $this->userInfo;
    }
    
    /**
     * ユーザ情報の設定
     *
     * @param array $userInfo
     */
    private function setUserInfo(array $userInfo): void
    {
        $this->userInfo = $userInfo;
    }
    
}
