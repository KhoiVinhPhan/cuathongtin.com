<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\UserServiceContract;
use App\Http\Requests\CreateUserRequest;
use Session;

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

    public function create()
    {
        $permissions = $this->userService->getPermission();
        return view('backend.users.create', compact('permissions'));
    }

    public function store(CreateUserRequest $request){
        $input = $request->all();
        if($this->userService->store($input)) {
            Session::flash('success', 'Tạo user thành công');
            return redirect('manager/user/show');
        }else {
            Session::flash('error', 'Tạo user không thành công');
            return redirect('manager/user/create');
        }
        
    }

    public function changePassword(Request $request)
    {
        $input = $request->all();
        if($this->userService->changePassword($input)) {
            return "success";
        }else {
            return "error";
        }
    }

    public function delete($user_id)
    {
        if($this->userService->delete($user_id)) {
            Session::flash('success', 'Xóa user thành công');
            return redirect('manager/user/show');
        }else {
            Session::flash('error', 'Xóa user không thành công');
            return redirect('manager/user/show');
        }
    }

    public function trash()
    {
        $userTrash = $this->userService->getUserTrash();
        return view('backend.users.trash', compact('userTrash'));
    }

    public function restore($user_id)
    {
        if($this->userService->restoreUser($user_id)) {
            Session::flash('success', 'Khôi phục user thành công');
            return redirect('manager/user/trash');
        }else {
            Session::flash('error', 'Khôi phục user không thành công');
            return redirect('manager/user/show');
        }
    }

    public function changePasswordLogin(Request $request)
    {
        $input = $request->all();
        if($this->userService->changePasswordLogin($input)) {
            return "success";
        }else {
            return "error";
        }
    }

    public function deleteChoice(Request $request)
    {
        $input = $request->all();
        if($this->userService->deleteChoice($input)) {
            Session::flash('success', 'Xóa user thành công');
            return redirect('manager/user/show');
        }else {
            Session::flash('error', 'Bạn phải chọn user để xóa');
            return redirect('manager/user/show');
        }
    }

    public function edit($user_id)
    {
        $cities         = $this->userService->getCity();
        $user           = $this->userService->userEdit($user_id);
        $image_user     = $this->userService->checkImageEdit($user_id);
        $data           = $this->userService->getDataEdit($user_id);
        return view('backend.users.edit', compact('user', 'image_user', 'cities', 'data'));
    }

    public function updateUserEdit(Request $request)
    {
        $input = $request->all();
        if($this->userService->updateUserEdit($input)){
            return "success";
        }else{
            return "error";
        }
    }
}
