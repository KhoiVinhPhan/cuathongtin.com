<?php

namespace Core\Services;

use Core\Repositories\CategoryPostRepositoryContract;

class CategoryPostService implements CategoryPostServiceContract
{
    protected $categorypostRepository;

    public function __construct(CategoryPostRepositoryContract $categorypostRepository)
    {
        return $this->categorypostRepository = $categorypostRepository;
    }

    public function getDataCategoryNew()
    {
         return $this->categorypostRepository->getDataCategoryNew();
    }

    public function addCategoryPost($input)
    {
         return $this->categorypostRepository->addCategoryPost($input);
    }

    public function addCategory($input)
    {
         return $this->categorypostRepository->addCategory($input);
    }

    public function editCategory($input)
    {
         return $this->categorypostRepository->editCategory($input);
    } 

    public function deleteCategory($input)
    {
         return $this->categorypostRepository->deleteCategory($input);
    }

    public function deleteMutiCategory($input)
    {
         return $this->categorypostRepository->deleteMutiCategory($input);
    }

}