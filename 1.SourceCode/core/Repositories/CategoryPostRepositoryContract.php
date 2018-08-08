<?php

namespace Core\Repositories;

interface CategoryPostRepositoryContract
{
	public function getDataCategoryNew();
	public function addCategoryPost($input);
	public function addCategory($input);
}