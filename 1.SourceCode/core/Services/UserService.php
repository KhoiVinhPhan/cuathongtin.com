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

}