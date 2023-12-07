<?php

namespace App\Livewire\Dashboard;

use App\Gamify\Points\ActivityCreated;
use App\Models\Activity;
use App\Models\ActivityType;
use Livewire\Component;

class Activities extends Component
{
    public $page = 1;

    public $search = '';

    public function addActivity(int $activityTypeId)
    {
        if (! ActivityType::query()->where('id', $activityTypeId)->exists()) {
            return;
        }

        $activity = Activity::create([
            'activity_type_id' => $activityTypeId,
            'user_id' => auth()->user()->id,
        ]);

        if ($activity) {
            givePoint(new ActivityCreated($activity));
        }
    }

    public function resetSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $activityTypes = ActivityType::query()
            ->where('label', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->get();

        return view('livewire.dashboard.activities', ['activityTypes' => $activityTypes]);
    }
}
