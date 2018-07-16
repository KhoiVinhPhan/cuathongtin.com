<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\UserServiceContract;

class UserController extends Controller
{
	protected $userService;

	public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
    	$user           = $this->userService->index();
        $image_user     = $this->userService->checkImage();
        $cities         = $this->userService->getCity();
    	return view('backend.users.index', compact('user', 'image_user', 'cities'));
    }

    public function update(Request $request)
    {
    	$input = $request->all();
        if($this->userService->update($input)){
            return "success";
        }else{
            return "error";
        }
        
    	
    }
}
