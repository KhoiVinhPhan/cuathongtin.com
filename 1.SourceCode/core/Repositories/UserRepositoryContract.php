<?php

namespace Core\Repositories;

interface UserRepositoryContract
{
    public function index();
    public function update($input);
    public function checkImage();
    public function getCity();
    public function getData();
    public function show();
    public function getPermission();
    public function changePermission($input);
}