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

}