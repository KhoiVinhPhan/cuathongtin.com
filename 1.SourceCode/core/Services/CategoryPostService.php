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

    public function addCategory($input)
    {
         return $this->categorypostRepository->addCategory($input);
    }

    public function editCategory($input)
    {
         return $this->categorypostRepository->editCategory($input);
    }

    public function deleteMutiCategory($input)
    {
         return $this->categorypostRepository->deleteMutiCategory($input);
    }

    public function store($input)
    {
         return $this->categorypostRepository->store($input);
    }

    public function getDataPost($post_id)
    {
         return $this->categorypostRepository->getDataPost($post_id);
    }

    public function getDataPostWithUser()
    {
         return $this->categorypostRepository->getDataPostWithUser();
    }

    public function changeStatusPost($input)
    {
         return $this->categorypostRepository->changeStatusPost($input);
    }

    public function update($input)
    {
         return $this->categorypostRepository->update($input);
    }

    public function deletePosts($input)
    {
         return $this->categorypostRepository->deletePosts($input);
    }

    public function getDataPostAll()
    {
         return $this->categorypostRepository->getDataPostAll();
    }

}