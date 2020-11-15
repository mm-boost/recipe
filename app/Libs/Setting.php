<?php

namespace App\Libs;

/**
 * 設定ライブラリ
 *
 * Class Setting
 *
 * @package App\Libs
 */
class Setting
{
    
    /**
     * ユーザ情報の取得
     * @return array ユーザ情報
     */
    public function getUserInfo() {
    
        // @todo 本来であればDBから値を取得
        
        // @todo 仮値を返す
        $userInfo = [
            'nick_name' => 'ニックネーム',
        ];
        
        return $userInfo;
        
    }

}