<?php

use Illuminate\Database\Seeder;
use App\Tool;

class ToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tools')->delete();
        $tools = ['炊飯器','電子レンジ','鍋','フライパン','トースター','その他'];
        foreach($tools as $tool){
            Tool::create(["tool"=>$tool]);
        }    
    }   
}
