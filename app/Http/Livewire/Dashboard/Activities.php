<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ActivityType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Activities extends Component
{
    public $page = 1;
    public $search = '';

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
