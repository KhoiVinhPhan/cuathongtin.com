<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\CategoryProductServiceContract;
use Auth;
use Session;

class HomeController extends Controller
{
	protected $categoryProductService;

	public function __construct(CategoryProductServiceContract $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    public function index()
    {
    	$categories = $this->categoryProductService->getCategoryProduct();
    	return view('frontend.home.index', compact('categories'));
    }
}
