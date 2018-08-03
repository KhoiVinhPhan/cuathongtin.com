<?php

namespace Core\Repositories;

interface BannerSlideRepositoryContract
{
    public function store($input);
    public function edit($banner_slide_id);
    public function update($input);
    public function index();
    public function delete($banner_slide_id);
}