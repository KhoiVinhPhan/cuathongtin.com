<?php

namespace Core\Repositories;

interface UserRepositoryContract
{
    public function index();
    public function update($input);
    public function checkImage();
    public function getCity();
    public function getData();
}