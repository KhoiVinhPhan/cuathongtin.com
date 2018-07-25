<?php

namespace Core\Repositories;

interface CategoryProductRepositoryContract
{
    public function index();
    public function selectCategoryproduct($input);
    public function store($input);
    public function deleteSecCategoryProduct($input);
}