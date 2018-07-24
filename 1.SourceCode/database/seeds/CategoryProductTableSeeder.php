<?php

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert([
        	['category_product_id'=>1, 'name'=>'QUẦN ÁO PHỤ NỮ', 'user_id_maked'=>1],
        	['category_product_id'=>2, 'name'=>'QUẦN ÁO ĐÀN ÔNG', 'user_id_maked'=>1],
        	['category_product_id'=>3, 'name'=>'ĐIỆN THOẠI VÀ PHỤ KIỆN', 'user_id_maked'=>1],
        	['category_product_id'=>4, 'name'=>'MÁY TÍNH VÀ PHỤ KIỆN', 'user_id_maked'=>1],
        	['category_product_id'=>5, 'name'=>'THIẾT BỊ ĐIỆN TỬ', 'user_id_maked'=>1],
        	['category_product_id'=>6, 'name'=>'ĐỒ TRANG SỨC & ĐỒNG HỒ', 'user_id_maked'=>1],
        	['category_product_id'=>7, 'name'=>'GIÀY DÉP', 'user_id_maked'=>1],
        ]);
    }
}
