<?php

namespace Core\Services;

use Core\Repositories\UserRepositoryContract;

class UserService implements UserServiceContract
{
    protected $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        return $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->index();
    }

    public function update($input)
    {
    	return $this->userRepository->update($input);
    }

    public function checkImage()
    {
        return $this->userRepository->checkImage();
    }

    public function getCity()
    {
        return $this->userRepository->getCity();
    }

    public function getData()
    {
        return $this->userRepository->getData();
    }

    public function show()
    {
        return $this->userRepository->show();
    }

    public function getPermission()
    {
        return $this->userRepository->getPermission();
    }

    public function changePermission($input)
    {
        return $this->userRepository->changePermission($input);
    }

    public function store($input)
    {
        return $this->userRepository->store($input);
    }

    public function changePassword($input)
    {
        return $this->userRepository->changePassword($input);
    }

    public function delete($user_id)
    {
        return $this->userRepository->delete($user_id);
    }

    public function getUserTrash()
    {
        return $this->userRepository->getUserTrash();
    }

    public function restoreUser($user_id)
    {
        return $this->userRepository->restoreUser($user_id);
    }

    public function changePasswordLogin($input)
    {
        return $this->userRepository->changePasswordLogin($input);
    }

}