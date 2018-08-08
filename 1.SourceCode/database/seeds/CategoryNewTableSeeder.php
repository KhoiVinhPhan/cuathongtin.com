<?php

use Illuminate\Database\Seeder;

class CategoryNewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_news')->insert([
        	['category_new_id'=>1, 'name'=>'Khoa học', 'information'=>'Chủ đề khoa học', 'user_id_maked'=>1],
        	['category_new_id'=>2, 'name'=>'Du lịch', 'information'=>'Chủ đề du lịch', 'user_id_maked'=>1],
        	['category_new_id'=>3, 'name'=>'Sự kiện', 'information'=>'Chủ đề sự kiện', 'user_id_maked'=>1],
        ]);
    }
}
