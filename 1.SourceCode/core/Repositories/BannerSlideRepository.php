<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\BannerSlide;

class BannerSlideRepository implements BannerSlideRepositoryContract
{
	public function index()
	{
		$data = DB::table('banner_slide')->select('*')->whereNull('deleted_at')->get();
		return $data;
	}

	public function store($input)
	{
		DB::beginTransaction();
        try{
            $data = array(
                'title'         => $input['title'],
                'information'   => $input['information'],
                'path_to_image' => $input['path_to_image'],
                'user_id_maked' => Auth::user()->user_id,
                'created_at'    => now(),
            );
            $banner_slide_id = BannerSlide::create($data)->banner_slide_id;
            DB::commit();
            return $banner_slide_id;
        } catch(\Exception $e){
            DB::rollback();
            return false;
        }
	}

	public function edit($banner_slide_id)
	{
		$data = DB::table('banner_slide')->select('*')->where('banner_slide_id', '=', $banner_slide_id)->whereNull('deleted_at')->first();
		return $data;
	}

	public function update($input)
	{
		DB::beginTransaction();
        try{
            $data = array(
                'title'         => $input['title'],
                'information'   => $input['information'],
                'path_to_image' => $input['path_to_image'],
                'user_id_maked' => Auth::user()->user_id,
                'created_at'    => now(),
            );
            BannerSlide::find($input['banner_slide_id'])->update($data);
            DB::commit();
            return true;
        } catch(\Exception $e){
            DB::rollback();
            return false;
        }
	}

	public function delete($banner_slide_id)
	{
		BannerSlide::find($banner_slide_id)->delete();
        return true;
	}
}