<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\BannerSlideServiceContract;
use Auth;
use Session;

class PostsController extends Controller
{
	protected $bannerSlideService;

	public function __construct(BannerSlideServiceContract $bannerSlideService)
    {
        $this->bannerSlideService = $bannerSlideService;
    }


    public function index()
    {
        return view('backend.posts.index');
    }

    public function create()
    {
        return view('backend.posts.create');
    }

}
