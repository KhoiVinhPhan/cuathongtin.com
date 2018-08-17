<?php

namespace Core\Repositories;

interface CategoryPostRepositoryContract
{
	public function getDataCategoryNew();
	public function addCategoryPost($input);
	public function addCategory($input);
	public function editCategory($input);
	public function deleteMutiCategory($input);
	public function store($input);
	public function getDataPost($post_id);
	public function getDataPostWithUser();
	public function changeStatusPost($input);
}