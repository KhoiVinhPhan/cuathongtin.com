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
    	$user = $this->userService->index();
    	return view('backend.users.index', compact('user'));
    }
}
