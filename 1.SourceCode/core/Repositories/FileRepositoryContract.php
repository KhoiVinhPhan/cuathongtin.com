<?php

namespace Core\Repositories;

interface FileRepositoryContract
{
    public function index();
    public function edit($id);
    public function update($input);
    public function store($input);
}