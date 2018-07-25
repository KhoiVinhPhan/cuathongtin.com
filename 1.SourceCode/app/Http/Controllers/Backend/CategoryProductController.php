<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\CategoryProductServiceContract;
use Auth;
use Session;

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

    public function store(Request $request)
    {
        $input = $request->all();
        if($this->categoryProductService->store($input)) {
            Session::flash('success', 'Chỉnh sửa thành công');
            return redirect('manager/category-product');
        }else {
            Session::flash('error', 'Chỉnh sửa không thành công');
            return redirect('manager/category-product');
        }
    }

    public function deleteSecCategoryProduct(Request $request)
    {
        $input = $request->all();
        if($this->categoryProductService->deleteSecCategoryProduct($input)) {
            return "success";
        }else {
            return "error";
        }
    }

    public function deleteCategoryProduct(Request $request)
    {
        $input = $request->all();
        if($this->categoryProductService->deleteCategoryProduct($input)) {
            return "success";
        }else {
            return "error";
        }
    }

}
