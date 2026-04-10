<?php

namespace App\Services;

use App\Models\ReferralBanner;
use App\Repositories\ReferralBannerRepository;

class ReferralBannerService
{
    protected $repo;
    public function __construct(ReferralBannerRepository $repo) {
        $this->repo = $repo;
    }

    public function getBannerData() {
        return $this->repo->getBannerData();
    }

    public function getAllPaginated(?string $search) {
        return $this->repo->getAllPaginated(10, $search);
    }

    public function store(array $data) {
        $data['is_active'] = isset($data['is_active']) ? true : false;
        return $this->repo->create($data);
    }

    public function update(int $id, array $data) {
        $banner = $this->repo->findById($id);
        $data['is_active'] = isset($data['is_active']) ? true : false;
        $this->repo->deactivateOthers($id);
        return $this->repo->update($banner, $data);
    }

    public function delete(int $id) {
        $banner = $this->repo->findById($id);
        return $this->repo->delete($banner);
    }

    public function toggleActive(int $id) {
        $banner = $this->repo->findById($id);
        return $this->repo->update($banner, ['is_active' => !$banner->is_active]);
    }

}