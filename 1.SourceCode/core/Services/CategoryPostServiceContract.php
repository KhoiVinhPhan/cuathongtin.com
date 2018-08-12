<?php

namespace Core\Services;

interface CategoryPostServiceContract
{
    public function getDataCategoryNew();
    public function addCategoryPost($input);
    public function addCategory($input);
    public function editCategory($input);
    public function deleteMutiCategory($input);
    public function store($input);
}