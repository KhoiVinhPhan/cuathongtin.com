<?php

namespace Core\Services;

use Core\Repositories\FileRepositoryContract;

class FileService implements FileServiceContract
{
    protected $fileRepository;

    public function __construct(FileRepositoryContract $fileRepository)
    {
        return $this->fileRepository = $fileRepository;
    }

    public function index()
    {
        return $this->fileRepository->index();
    }

    public function edit($id)
    {
        return $this->fileRepository->edit($id);
    }

    public function update($input)
    {
        return $this->fileRepository->update($input);
    }

}