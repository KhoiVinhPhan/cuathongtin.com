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
        $data = $this->categoryPostService->getDataPostWithUser();
        return view('backend.posts.index', compact('data'));
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
        $category_news = $this->categoryPostService->getDataCategoryNew();
        return view('backend.posts.indexCategoryPost', compact('category_news'));
    }

    public function addCategory(Request $request)
    {
        $input = $request->all();
        if($result = $this->categoryPostService->addCategory($input)){
           return $result;
        }else{
            echo "error";exit;
        }
    }

    public function editCategory(Request $request)
    {
        $input = $request->all();
        if($this->categoryPostService->editCategory($input)){
           return "success";exit;
        }else{
            echo "error";exit;
        }
    }

    public function deleteMutiCategory(Request $request)
    {
        $input = $request->all();
        if($this->categoryPostService->deleteMutiCategory($input)){
           return "success";exit;
        }else{
            echo "error";exit;
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($post_id = $this->categoryPostService->store($input)){
            Session::flash('success', 'Tạo thành công');
            return redirect('manager/posts');
        }else{
            Session::flash('error', 'Tạo không thành công');
            return redirect()->route('createPosts');
        }
    }

    public function edit($post_id)
    {
        $category_news  = $this->categoryPostService->getDataCategoryNew();
        $dataPost       = $this->categoryPostService->getDataPost($post_id);
        $arrayCategorys = explode(',',$dataPost[0]->category_id);
        //Check login
        if($dataPost[0]->user_id_maked !== Auth::user()->user_id){        
            return redirect('/login');
        }
        return view('backend.posts.edit', compact('category_news', 'dataPost', 'arrayCategorys'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        if($this->categoryPostService->update($input)){
            return "success";
        }else{
            return "error";
        }
    }

    public function changeStatusPost(Request $request)
    {
        $input = $request->all();
        if($this->categoryPostService->changeStatusPost($input)){
            echo "success";exit;
        }else{
            echo "error";exit;
        }
    }

    public function deletePosts(Request $request)
    {
        $input = $request->all();
        if($this->categoryPostService->deletePosts($input)){
            Session::flash('success', 'Xóa thành công');
            return redirect('/manager/posts');
        }else{
            Session::flash('error', 'Xóa không thành công');
            return redirect('/manager/posts');
        }
    }
}
