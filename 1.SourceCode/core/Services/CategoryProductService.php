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

    public function store($input)
    {
        return $this->categoryProductRepository->store($input);
    }

    public function deleteSecCategoryProduct($input)
    {
        return $this->categoryProductRepository->deleteSecCategoryProduct($input);
    }

    public function deleteCategoryProduct($input)
    {
        return $this->categoryProductRepository->deleteCategoryProduct($input);
    }

    public function getCategoryProduct()
    {
        return $this->categoryProductRepository->getCategoryProduct();
    }

}