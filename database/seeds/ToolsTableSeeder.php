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
        $tools = ['炊飯器','電子レンジ','鍋','フライパン','トースター'];
        foreach($tools as $tool){
            Tool::create(["tool"=>$tool]);
        }    
    }   
}
