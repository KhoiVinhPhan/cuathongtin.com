<?php

namespace Core\Services;

interface CategoryPostServiceContract
{
    public function getDataCategoryNew();
    public function addCategoryPost($input);
    public function addCategory($input);
}