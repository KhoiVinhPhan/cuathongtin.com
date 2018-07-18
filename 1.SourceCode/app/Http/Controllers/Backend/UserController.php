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
        $data           = $this->userService->getData();
        // echo "<pre>";print_r($data);exit;
    	return view('backend.users.index', compact('user', 'image_user', 'cities', 'data'));
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

    public function show()
    {
        $users = $this->userService->show();
        $permissions = $this->userService->getPermission();
        // echo "<pre>";print_r($permissions);exit;
        return view('backend.users.show', compact('users', 'permissions'));
    }

    public function changePermission(Request $request){
        $input = $request->all();
        if($this->userService->changePermission($input)) {
            return "success";
        }else {
            return "error";
        }
        
    }
}
