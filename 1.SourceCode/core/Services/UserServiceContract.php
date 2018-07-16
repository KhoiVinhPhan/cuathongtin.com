<?php

namespace Core\Services;

interface UserServiceContract
{
    public function index();
    public function update($input);
    public function checkImage();
    public function getCity();
}