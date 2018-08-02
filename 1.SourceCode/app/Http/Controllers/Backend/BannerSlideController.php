<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\CategoryProductServiceContract;
use Auth;
use Session;

class BannerSlideController extends Controller
{
	protected $categoryProductService;

	public function __construct(CategoryProductServiceContract $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }


    public function index()
    {
        return view('backend.bannerSlide.index');
    }

    public function create()
    {
    	return view('backend.bannerSlide.create');
    }

    public function store(Request $request)
    {
    	$input = $request->all();
    	echo "<pre>";print_r($input);exit;
    }

}
