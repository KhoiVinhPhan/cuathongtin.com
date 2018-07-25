<?php

use Illuminate\Database\Seeder;

class SecCategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sec_category_product')->insert([
        	['name'=>'QUẦN ÁO PHỤ NỮ 1', 'category_product_id'=>1],
        	['name'=>'QUẦN ÁO PHỤ NỮ 2', 'category_product_id'=>1],
        	['name'=>'QUẦN ÁO PHỤ NỮ 3', 'category_product_id'=>1],

        	['name'=>'QUẦN ÁO ĐÀN ÔNG 1', 'category_product_id'=>2],
        	['name'=>'QUẦN ÁO ĐÀN ÔNG 2', 'category_product_id'=>2],
        	['name'=>'QUẦN ÁO ĐÀN ÔNG 3', 'category_product_id'=>2],

        	['name'=>'ĐIỆN THOẠI VÀ PHỤ KIỆN 1', 'category_product_id'=>3],
        	['name'=>'ĐIỆN THOẠI VÀ PHỤ KIỆN 2', 'category_product_id'=>3],
        	['name'=>'ĐIỆN THOẠI VÀ PHỤ KIỆN 3', 'category_product_id'=>3],

        	['name'=>'MÁY TÍNH VÀ PHỤ KIỆN 1', 'category_product_id'=>4],
        	['name'=>'MÁY TÍNH VÀ PHỤ KIỆN 2', 'category_product_id'=>4],
        	['name'=>'MÁY TÍNH VÀ PHỤ KIỆN 3', 'category_product_id'=>4],

        	['name'=>'THIẾT BỊ ĐIỆN TỬ 1', 'category_product_id'=>5],
        	['name'=>'THIẾT BỊ ĐIỆN TỬ 2', 'category_product_id'=>5],
        	['name'=>'THIẾT BỊ ĐIỆN TỬ 3', 'category_product_id'=>5],

        	['name'=>'ĐỒ TRANG SỨC & ĐỒNG HỒ 1', 'category_product_id'=>6],
        	['name'=>'ĐỒ TRANG SỨC & ĐỒNG HỒ 2', 'category_product_id'=>6],
        	['name'=>'ĐỒ TRANG SỨC & ĐỒNG HỒ 3', 'category_product_id'=>6],

        	['name'=>'GIÀY DÉP 1', 'category_product_id'=>7],
        	['name'=>'GIÀY DÉP 2', 'category_product_id'=>7],
        	['name'=>'GIÀY DÉP 3', 'category_product_id'=>7],
        ]);
    }
}
