<?php
namespace Core\Providers;
use Illuminate\Support\ServiceProvider;
use Core\Repositories\FileRepository;
use Core\Repositories\FileRepositoryContract;
use Core\Services\FileService;
use Core\Services\FileServiceContract;

class CoreServiceProvider extends ServiceProvider
{

    public function boot()
    {
        
    }

    public function register()
    {
    	$this->app->bind(FileRepositoryContract::class, FileRepository::class);
    	$this->app->bind(FileServiceContract::class, FileService::class);
    }
}