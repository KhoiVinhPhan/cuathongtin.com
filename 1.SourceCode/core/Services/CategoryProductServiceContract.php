<?php

namespace Core\Services;

interface CategoryProductServiceContract
{
    public function index();
    public function selectCategoryproduct($input);
}