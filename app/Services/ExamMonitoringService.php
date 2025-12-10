<?php

namespace App\Services;
use App\DTO\ExamMonitoringDTO;
use App\Repositories\AsesiRepository;
use App\Repositories\CategoryRepository;

class ExamMonitoringService {
    protected $asesiRepo;
    protected $categoryRepo;

    public function __construct(
        AsesiRepository $asesiRepo,
        CategoryRepository $categoryRepo
    ) {
        $this->asesiRepo = $asesiRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function getMonitoringData() {
        $asesi = $this->asesiRepo->getAsesi();
        $passingScore = $this->categoryRepo->getCategoryAPassingScore();

        // Hitung jumlah pengguna akses level A
        $userLevelACount = $asesi->filter(
            fn ($u) => $u->hasPermissionTo('access_level_A')
        )->count();

        // Remedial
        $asesiRemidialCount = $this->asesiRepo->countRemidialA($passingScore);

        // Lulus semua kategori
        $asesiLulusSemuaCount = $asesi->filter(
            fn ($u) => $u->hasPermissionTo('level_A_completed')
        )->count();

        return new ExamMonitoringDTO(
            $userLevelACount,
            $asesiRemidialCount,
            $asesiLulusSemuaCount ?? 0  
        );
    }
}
