<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\CategoryProductServiceContract;
use Auth;

class CategoryProductController extends Controller
{
	protected $categoryProductService;

	public function __construct(CategoryProductServiceContract $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }


    public function index()
    {
        $categoryProducts = $this->categoryProductService->index();
        return view('backend.categoryProduct.index', compact('categoryProducts'));
    }

    public function selectCategoryproduct(Request $request)
    {
        $input = $request->all();
        if($data = $this->categoryProductService->selectCategoryproduct($input)) {
            return $data;
        }else {
            return "error";
        }
    }

}
