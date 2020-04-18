<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TaskStatus[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return TaskStatus::all();
    }
}
