<?php

namespace Core\Services;

interface BannerSlideServiceContract
{
    public function store($input);
    public function edit($banner_slide_id);
    public function update($input);
    public function index();
    public function delete($banner_slide_id);
}