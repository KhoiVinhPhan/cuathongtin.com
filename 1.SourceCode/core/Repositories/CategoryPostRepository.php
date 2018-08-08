<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\CategoryNew;

class CategoryPostRepository implements CategoryPostRepositoryContract
{
	public function getDataCategoryNew()
	{
		$data = DB::table('category_news')->select('*')->orderBy('category_new_id', 'ASC')->whereNull("deleted_at")->get();
		return $data;
	}

	public function addCategoryPost($input)
	{
		$data = array(
			'name' 			=> $input['data']['nameCategory'],
			'user_id_maked' => Auth::user()->user_id
		);
		$category_new_id = CategoryNew::create($data)->category_new_id;
		$result = DB::table('category_news')->select('*')->where('category_new_id', '=', $category_new_id)->get();
		return $result;
	}

	public function addCategory($input)
	{
		DB::beginTransaction();
		try{
			$data = array(
				'name' 			=> $input['title'],
				'information' 	=> $input['information'],
				'user_id_maked' => Auth::user()->user_id
			);
			$category_new_id = CategoryNew::create($data)->category_new_id;
			$result = DB::table('category_news')->select('*')->where('category_new_id', '=', $category_new_id)->get();
			DB::commit();
			return $result;
		}catch(\Exception $e){
			DB::rollback();
			return false;
		}
	}
}