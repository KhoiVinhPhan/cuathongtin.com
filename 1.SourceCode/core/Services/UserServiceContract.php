<?php

namespace Core\Services;

interface UserServiceContract
{
    public function index();
    public function update($input);
    public function checkImage();
    public function getCity();
    public function getData();
    public function show();
    public function getPermission();
    public function changePermission($input);
    public function store($input);
    public function changePassword($input);
    public function delete($user_id);
    public function getUserTrash();
    public function restoreUser($user_id);
}