<?php

namespace Core\Services;

use Core\Repositories\BannerSlideRepositoryContract;

class BannerSlideService implements BannerSlideServiceContract
{
    protected $bannerSlideRepository;

    public function __construct(BannerSlideRepositoryContract $bannerSlideRepository)
    {
        return $this->bannerSlideRepository = $bannerSlideRepository;
    }

    public function store($input)
    {
         return $this->bannerSlideRepository->store($input);
    }

    public function edit($banner_slide_id)
    {
         return $this->bannerSlideRepository->edit($banner_slide_id);
    }

    public function update($input)
    {
         return $this->bannerSlideRepository->update($input);
    }

    public function index()
    {
         return $this->bannerSlideRepository->index();
    }

    public function delete($banner_slide_id)
    {
         return $this->bannerSlideRepository->delete($banner_slide_id);
    }

}