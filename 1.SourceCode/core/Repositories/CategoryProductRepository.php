<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\SecCategoryProduct;
use App\Models\CategoryProduct;

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

    public function store($input)
    {
        if(empty($input['category_product_id'])) {
            //Create category product
            if(!empty($input['category_product_value'])){
                DB::table('category_product')->insert([
                    'name'          => $input['category_product_value'],
                    'user_id_maked' => Auth::user()->user_id,
                    'created_at'    => now(),
                ]);
                return true;
            }
        }
        else {
            if(empty($input['sec_category_product_id'])){
                DB::beginTransaction();
                try{
                    //Create second category
                    if(!empty($input['sec_category_product_value'])){
                        DB::table('sec_category_product')->insert([
                            'name'                  => $input['sec_category_product_value'],
                            'category_product_id'   => $input['category_product_id'],
                            'user_id_maked'         => Auth::user()->user_id,
                            'created_at'            => now(),
                        ]);
                    }

                    //Update category
                    DB::table('category_product')
                        ->where('category_product_id', $input['category_product_id'])
                        ->update([
                            'name'              => $input['category_product_value'],
                            'user_id_updated'   => Auth::user()->user_id,
                            'updated_at'        => now(),
                        ]);
                    DB::commit();
                    return true;
                }catch(\Exception $e){
                    DB::rollback();
                    return false;
                }
            }else{
                DB::beginTransaction();
                try{
                    //Update second category
                    if(!empty($input['sec_category_product_value'])){
                        DB::table('sec_category_product')
                            ->where('sec_category_product_id', $input['sec_category_product_id'])
                            ->update([
                                'name'                  => $input['sec_category_product_value'],
                                'category_product_id'   => $input['category_product_id'],
                                'user_id_updated'       => Auth::user()->user_id,
                                'updated_at'            => now(),
                            ]);
                    }

                    //Update category
                    if(!empty($input['category_product_value'])){
                        DB::table('category_product')
                            ->where('category_product_id', $input['category_product_id'])
                            ->update([
                                'name'              => $input['category_product_value'],
                                'user_id_updated'   => Auth::user()->user_id,
                                'updated_at'        => now(),
                            ]);
                    }
                    DB::commit();
                    return true;
                }catch(\Exception $e){
                    DB::rollback();
                    return false;
                }
            }
        }
    }

    public function deleteSecCategoryProduct($input)
    {
        // echo "<pre>";print_r($input['data']['sec_category_product_id']);exit;
        SecCategoryProduct::find($input['data']['sec_category_product_id'])->delete();
        return true;
    }

    public function deleteCategoryProduct($input)
    {
        DB::beginTransaction();
        try{
            //Delete category
            CategoryProduct::find($input['data']['category_product_id'])->delete();
            //Delete second category
            DB::table('sec_category_product')
                ->where('category_product_id', $input['data']['category_product_id'])
                ->update([
                    'deleted_at' => now(),
                ]);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            return false;
        }
    }

    public function getCategoryProduct()
    {
        $data = DB::table('category_product')
                    ->select(array(
                        'category_product.category_product_id'
                        , 'category_product.name as category_product_value'
                        // , 'sec_category_product.name as sec_category_product_value'
                        , DB::raw("GROUP_CONCAT(sec_category_product.name SEPARATOR ',') AS 'sec_category_product_value'")
                        // , DB::raw('(CASE WHEN sec_category_product.sec_category_product_id = 2 THEN 1 ELSE 0 END) AS is_user')
                    )
                        
                    )
                    ->leftjoin('sec_category_product', 'sec_category_product.category_product_id', '=', 'category_product.category_product_id')
                    ->groupBy('category_product.category_product_id')
                    ->whereNull('category_product.deleted_at')
                    ->whereNull('sec_category_product.deleted_at')
                    ->get();
        echo "<pre>";print_r($data);exit;
    }
}