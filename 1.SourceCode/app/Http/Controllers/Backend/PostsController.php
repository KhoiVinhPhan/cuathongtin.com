<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\CategoryPostServiceContract;
use Auth;
use Session;

class PostsController extends Controller
{
	protected $categoryPostService;

	public function __construct(CategoryPostServiceContract $categoryPostService)
    {
        $this->categoryPostService = $categoryPostService;
    }


    public function index()
    {
        return view('backend.posts.index');
    }

    public function create()
    {
        $category_news = $this->categoryPostService->getDataCategoryNew();
        return view('backend.posts.create', compact('category_news'));
    }

    public function addCategoryPost(Request $request)
    {
        $input = $request->all();
        if($result = $this->categoryPostService->addCategoryPost($input)){
            return $result;
        }else{
            echo "error";exit;
        }
    }

    public function categoryPost()
    {
        return view('backend.posts.indexCategoryPost');
    }

}
