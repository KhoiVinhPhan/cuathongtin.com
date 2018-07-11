<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\FileServiceContract;

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
    	return view('backend.files.edit', compact('file'));
    }

    public function update(Request $request)
    {
    	echo "string";exit;
    }
}
