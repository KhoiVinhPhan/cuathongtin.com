<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\BannerSlideServiceContract;
use Auth;
use Session;

class BannerSlideController extends Controller
{
	protected $bannerSlideService;

	public function __construct(BannerSlideServiceContract $bannerSlideService)
    {
        $this->bannerSlideService = $bannerSlideService;
    }


    public function index()
    {
    	$data = $this->bannerSlideService->index();
        return view('backend.bannerSlide.index', compact('data'));
    }

    public function create()
    {
    	return view('backend.bannerSlide.create');
    }

    public function store(Request $request)
    {
    	$input = $request->all();
    	if($banner_slide_id = $this->bannerSlideService->store($input)){
    		Session::flash('success', 'Tạo thành công');
    		return redirect('manager/banner-slide');
    	}else{
    		Session::flash('error', 'Tạo không thành công');
    		return redirect('manager/banner-slide/create');
    	}
    }

    public function edit($banner_slide_id)
    {
    	$banner = $this->bannerSlideService->edit($banner_slide_id);
    	return view('backend.bannerSlide.edit', compact('banner'));
    }

    public function update(Request $request)
    {
    	$input = $request->all();
    	if($this->bannerSlideService->update($input)){
    		Session::flash('success', 'Chỉnh sửa banner thành công');
    		return redirect('manager/banner-slide');
    	}else{
    		Session::flash('error', 'Chỉnh sửa không thành công');
    		return redirect('manager/banner-slide/'.$input['banner_slide_id'].'/edit');
    	}
    }

    public function delete($banner_slide_id)
    {
    	if($this->bannerSlideService->delete($banner_slide_id)){
    		Session::flash('success', 'Xóa thành công');
    		return redirect('manager/banner-slide');
    	}else{
    		Session::flash('error', 'Xóa không thành công');
    		return redirect('manager/banner-slide');
    	}
    }

}
