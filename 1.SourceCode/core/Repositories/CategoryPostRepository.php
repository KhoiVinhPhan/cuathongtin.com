<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\CategoryNew;
use App\Models\Posts;

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

	public function editCategory($input)
	{
		DB::beginTransaction();
		try{
			DB::table('category_news')
				->where('category_new_id', $input['idCategory'])
				->update([
					'name' 				=> $input['titleCategory'],
					'information' 		=> $input['infoCategory'],
					'user_id_updated' 	=> Auth::user()->user_id,
				]);
			DB::commit();
			return true;
		}catch(\Exception $e){
			DB::rollback();
			return false;
		}
	}

	public function deleteMutiCategory($input)
	{
		DB::beginTransaction();
		try{
			$input['data']['category_new_id'] = rtrim($input['data']['category_new_id'], ',');
			$array_id_category = explode(',', $input['data']['category_new_id']);
			CategoryNew::whereIn("category_new_id",$array_id_category)->delete(); 
			DB::commit();
			return true;
		}catch(\Exception $e){
			DB::rollback();
			return false;
		}
	}

	public function store($input)
	{
		DB::beginTransaction();
		try{
			//Check status: (với status = 1: công khai, status = 2: bản nháp)
			if($input['save'] == 'save'){
				$status = 1;
			}
			if($input['save'] == 'save-draft'){
				$status = 2;
			}

			//Insert table: posts
			$data = array(
				'title' 			=> $input['title'],
				'content' 			=> $input['content'],
				'status' 			=> $status,
				'path_to_image' 	=> $input['path_to_image'],
				'user_id_maked' 	=> Auth::user()->user_id
			);
			$post_id = Posts::create($data)->post_id;

			//Insert table: post_category
			if(!empty($input['category'])){
				for ($i=0; $i < count($input['category']); $i++) { 
					DB::table('post_category')->insert([
						'post_id' 		=> $post_id,
						'category_id' 	=> $input['category'][$i]
					]);
				}
			}

			DB::commit();
			return $post_id;
		}catch(\Exception $e){
			DB::rollback();
			return false;
		}
	}

	public function getDataPost($post_id)
	{
		$data = DB::table('posts')
			->select(
				'posts.*'
				, 'users.name as nameUserMaked'
				, 'users.email as emailUserMaked'
				, DB::raw("GROUP_CONCAT(post_category.category_id SEPARATOR ',') AS 'category_id'")
			)
			->leftjoin('users', 'users.user_id', '=', 'posts.user_id_maked')
			->leftjoin('post_category', 'post_category.post_id', '=', 'posts.post_id')
			->whereNull('posts.deleted_at')
			->where('posts.post_id', '=', $post_id)
			->groupBy('posts.post_id')
			->get();
		return $data;
		
	}

	public function getDataPostWithUser()
	{
		$data = DB::table('posts')
			->select('posts.*', 'users.name as nameUserMaked', 'users.email as emailUserMaked')
			->whereNull('posts.deleted_at')
			->where('posts.user_id_maked', '=',Auth::user()->user_id)
			->leftjoin('users', 'users.user_id', '=', 'posts.user_id_maked')
			->orderBy('posts.post_id', 'DESC')
			->get();
		return $data;
	}

	public function changeStatusPost($input)
	{
		DB::table('posts')
			->where('post_id', '=', $input['data']['post_id'])
			->update([
				'status' => $input['data']['status']
			]);
		return true;
	}

	public function update($input)
	{
		//echo "<pre>";print_r($input);exit;
		DB::beginTransaction();
		try{
			//Check status: (với status = 1: công khai, status = 2: bản nháp)
			if($input['save'] == 'save'){
				$status = 1;
			}
			if($input['save'] == 'save-draft'){
				$status = 2;
			}

			//Update table: posts
			$data = array(
				'title' 			=> $input['title'],
				'content' 			=> $input['content'],
				'status' 			=> $status,
				'path_to_image' 	=> $input['path_to_image'],
				'user_id_updated' 	=> Auth::user()->user_id
			);
			Posts::find($input['post_id'])->update($data);

			//Update table: post_category
			if(!empty($input['category'])){
				DB::table('post_category')->where('post_id', '=', $input['post_id'])->delete();
				for ($i=0; $i < count($input['category']); $i++) { 
					DB::table('post_category')->insert([
						'post_id' 		=> $input['post_id'],
						'category_id' 	=> $input['category'][$i]
					]);
				}
			}else{
				DB::table('post_category')->where('post_id', '=', $input['post_id'])->delete();
			}

			DB::commit();
			return true;
		}catch(\Exception $e){
			DB::rollback();
			return false;
		}
	}

	public function deletePosts($input)
	{
		if(!empty($input['checkbox'])) {
            Posts::whereIn("post_id",$input['checkbox'])->delete(); 
            return true;
        }
	}

	public function getDataPostAll()
	{
		$data = DB::table('posts')
			->select('posts.*', 'users.name as nameUserMaked', 'users.email as emailUserMaked')
			->whereNull('posts.deleted_at')
			->leftjoin('users', 'users.user_id', '=', 'posts.user_id_maked')
			->orderBy('posts.post_id', 'DESC')
			->get();
		return $data;
	}
}