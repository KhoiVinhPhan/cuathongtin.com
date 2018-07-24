<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\File;

class CategoryProductRepository implements CategoryProductRepositoryContract
{

    public function index()
    {
        $data = DB::table('category_product')
        			->select('*')
        			->whereNull('deleted_at')
        			->get();
        return $data;
    }

    public function selectCategoryproduct($input)
    {
        $data = DB::table('sec_category_product')
        		->select('*')
        		->where('category_product_id', '=', $input['data']['category_product_id'])
        		->whereNull('deleted_at')
        		->get();
        return $data;
    }
}