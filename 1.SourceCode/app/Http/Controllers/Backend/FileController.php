<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\FileServiceContract;
use Auth;

class FileController extends Controller
{
	protected $fileService;

	public function __construct(FileServiceContract $fileService)
    {
        $this->fileService = $fileService;
    }


    public function index()
    {
    	$files = $this->fileService->index();
    	return view('backend.files.index', compact('files'));
    }

    public function edit($id)
    {
    	$file = $this->fileService->edit($id);
        if($file->user_id_maked !== Auth::user()->user_id){        
            return redirect('/login');
        }
    	return view('backend.files.edit', compact('file'));
    }

    //Update with ajax
    public function update(Request $request)
    {
    	$input = $request->all();
    	$data = $this->fileService->update($input);
        return $data;
    }

    public function create()
    {
        return view('backend.files.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($file_id = $this->fileService->store($input)){
            return redirect('/manager/file/'.$file_id.'/edit')->with(['checkCreate' => 'success']);
        }else{
            return redirect('/manager/file')->with(['checkCreate' => 'error']);
        }
    }
}
