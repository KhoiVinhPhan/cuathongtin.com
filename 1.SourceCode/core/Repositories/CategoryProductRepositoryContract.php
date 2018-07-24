<?php

namespace Core\Repositories;

interface CategoryProductRepositoryContract
{
    public function index();
    public function selectCategoryproduct($input);
}