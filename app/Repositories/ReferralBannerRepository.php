<?php

namespace App\Repositories;

use App\Models\ReferralBanner;

class ReferralBannerRepository {
    public function getBannerData() {
        return ReferralBanner::where('is_active', true)->latest()->first();
    }

    public function getAllPaginated(int $perPage = 10, ?string $search = null) {
        $query = ReferralBanner::query();
        
        if ($search) {
            $query->search($search);
        }
        
        return $query->latest()->paginate($perPage);
    }

    public function findById(int $id) {
        return ReferralBanner::findOrFail($id);
    }

    public function create(array $data) {
        return ReferralBanner::create($data);
    }

    public function update(ReferralBanner $banner, array $data) {
        $banner->update($data);
        return $banner;
    }

    public function delete(ReferralBanner $banner) {
        return $banner->delete();
    }

    public function deactivateOthers(int $id) {
        ReferralBanner::where('id', '!=', $id)->update(['is_active' => false]);
    }
}