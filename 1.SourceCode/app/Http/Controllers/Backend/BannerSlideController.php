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

    

}
