<?php

namespace Core\Services;

interface FileServiceContract
{
    public function index();
    public function edit($id);
    public function update($input);
}