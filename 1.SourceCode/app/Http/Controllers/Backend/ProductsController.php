<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Services\FileServiceContract;
use Auth;

class ProductsController extends Controller
{
	protected $fileService;

	public function __construct(FileServiceContract $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create()
    {
        return view('backend.products.create');
    }
    
}
