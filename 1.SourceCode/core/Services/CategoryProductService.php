<?php

namespace Core\Services;

use Core\Repositories\CategoryProductRepositoryContract;

class CategoryProductService implements CategoryProductServiceContract
{
    protected $categoryProductRepository;

    public function __construct(CategoryProductRepositoryContract $categoryProductRepository)
    {
        return $this->categoryProductRepository = $categoryProductRepository;
    }

    public function index()
    {
        return $this->categoryProductRepository->index();
    }

    public function selectCategoryproduct($input)
    {
        return $this->categoryProductRepository->selectCategoryproduct($input);
    }

}