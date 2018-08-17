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
                    ->select(
                        'category_product.category_product_id'
                        , 'category_product.name as category_product_value'
                        , DB::raw("GROUP_CONCAT(CONCAT(sec_category_product.sec_category_product_id, ':', sec_category_product.name) ORDER BY sec_category_product.sec_category_product_id ASC  SEPARATOR ',') AS 'value_sec_category'")
                    )
                    ->leftjoin('sec_category_product', function($join){
                        $join->on('sec_category_product.category_product_id', '=', 'category_product.category_product_id');
                        $join->whereNull('sec_category_product.deleted_at');
                    })
                    ->groupBy('category_product.category_product_id')
                    ->whereNull('category_product.deleted_at')
                    ->get();

        $result = array();
        foreach ($data as $key => $value) {
            $array_sec_category = array();
            if(!empty($value->value_sec_category)){
                foreach (explode(',', $value->value_sec_category) as $item) {
                    $item = explode(':', $item);
                    $array_sec_category[] = array(
                                                'sec_category_id'       => $item[0],
                                                'sec_category_value'    => $item[1],
                                            );
                }
            }
            $result[] = array(
                            'category_product_id'       => $value->category_product_id,
                            'category_product_value'    => $value->category_product_value,
                            'sec_category'              => $array_sec_category,
                        );
        }
        return $result;
    }
}