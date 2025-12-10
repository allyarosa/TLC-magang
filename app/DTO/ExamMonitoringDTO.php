<?php
namespace App\DTO;
use App\Models\User;
use App\Models\ExamA;

class ExamMonitoringDTO
{
    public function __construct(
        public int $userCount,
        public int $remidialCount,
        public int $lulusSemuaCount,
        public $asesiDataWithPermission,
    ) {}
}

