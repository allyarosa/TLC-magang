<?php

namespace App\Livewire\Asesi;

use App\Models\TaskSubmission;
use App\Repositories\AsesiRepository;
use App\Services\AsesiDashboardService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashboardStatsGrid extends Component
{
    public $daysSinceJoined = 0;
    public $hasAccess = false;
    protected $repository;
    public $maxCompletedTasks = 0;
    public $completedTasks = 0;

    public function mount(AsesiDashboardService $dashboardService, AsesiRepository $repository)
    {
        $dashboardData = $dashboardService->getData();
        $this->daysSinceJoined = $dashboardData['daysSinceJoined'] ?? 0;
        $this->repository = $repository;
        $this->checkAccess();
        $this->maxTaskCompleted();
        $this->checkCompletedTasks();
    }

    public function render()
    {
        return view('livewire.asesi.dashboard-stats-grid');
    }

    private function checkAccess()
    {
        $permissions = config('AccessPermission.permissions');
        $user = Auth::user();

        if (!$user) {
            return $this->hasAccess = false;
        }

        return $this->hasAccess = $user->hasAnyPermission($permissions);
    }

    private function maxTaskCompleted()
    {
        $user = Auth::user();

        if (!$user) {
            $this->maxCompletedTasks = 0;
            return;
        }

        if ($user->hasPermissionTo('access_level_A')) {
            $this->maxCompletedTasks = 12;
            return;
        }

        $this->maxCompletedTasks = 0;

        if ($user->hasPermissionTo('HOTS')) {
            $this->maxCompletedTasks += 4;
        }

        if ($user->hasPermissionTo('LITERASI')) {
            $this->maxCompletedTasks += 2;
        }

        if ($user->hasPermissionTo('NUMERASI')) {
            $this->maxCompletedTasks += 2;
        }

        if ($user->hasPermissionTo('PCK')) {
            $this->maxCompletedTasks += 4;
        }
    }

    private function checkCompletedTasks()
    {
        $user = Auth::user();
        
        if (!$user) {
            $this->completedTasks = 0;
            return;
        }
        
        $taskSubmission = TaskSubmission::where('user_id', $user->id)
                                        ->where('is_confirmed', true)
                                        ->count();
        return $this->completedTasks = $taskSubmission;
    }
}
