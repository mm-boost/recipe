<?php

namespace App\Http\Controllers;

use App\Libs\Setting;
use Illuminate\Routing\Controller;

/**
 * レシピコントローラー
 *
 * Class RecipeController
 *
 * @package App\Http\Controllers
 */
class RecipeController extends Controller
{
    /** @var array ユーザデータ */
    private $userInfo;
    
    /**
     * RecipeController constructor.
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
