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
        	['name'=>'Sec Category 1', 'category_product_id'=>1],
        	['name'=>'Sec Category 2', 'category_product_id'=>1],
        	['name'=>'Sec Category 3', 'category_product_id'=>1],

        	['name'=>'Sec Category 1', 'category_product_id'=>2],
        	['name'=>'Sec Category 2', 'category_product_id'=>2],
        	['name'=>'Sec Category 3', 'category_product_id'=>2],

        	['name'=>'Sec Category 1', 'category_product_id'=>3],
        	['name'=>'Sec Category 2', 'category_product_id'=>3],
        	['name'=>'Sec Category 3', 'category_product_id'=>3],

        	['name'=>'Sec Category 1', 'category_product_id'=>4],
        	['name'=>'Sec Category 2', 'category_product_id'=>4],
        	['name'=>'Sec Category 3', 'category_product_id'=>4],

        	['name'=>'Sec Category 1', 'category_product_id'=>5],
        	['name'=>'Sec Category 2', 'category_product_id'=>5],
        	['name'=>'Sec Category 3', 'category_product_id'=>5],

        	['name'=>'Sec Category 1', 'category_product_id'=>6],
        	['name'=>'Sec Category 2', 'category_product_id'=>6],
        	['name'=>'Sec Category 3', 'category_product_id'=>6],

        	['name'=>'Sec Category 1', 'category_product_id'=>7],
        	['name'=>'Sec Category 2', 'category_product_id'=>7],
        	['name'=>'Sec Category 3', 'category_product_id'=>7],
        ]);
    }
}
