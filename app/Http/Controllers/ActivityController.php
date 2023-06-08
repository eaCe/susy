<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function activities(Request $request): View
    {
        return view('dashboard.activities', ['activityTypes' => ActivityType::all()]);
    }
}
