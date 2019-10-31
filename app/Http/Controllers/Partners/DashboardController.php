<?php

namespace App\Http\Controllers\Partners;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $partner = Auth::user();
        $tasks = Task::where('partner_id', $partner->id)
                                ->whereNotIn('status', [config('const.COMPLETE_STAFF'), config('const.TASK_CANCELED')])
                                ->get();

        $projectsAccordingTask;
        $projects = array();
     
        if ($tasks->count() !== 0) {
            foreach ($tasks as $task) {
                $projectsAccordingTask[$task->project->id] = $task->project;
            }
            foreach ($projectsAccordingTask as $project) {
                array_push($projects, $project);
            }
        }

        return view('partner/dashboard/index', compact(['projects', 'tasks']));
    }
}
