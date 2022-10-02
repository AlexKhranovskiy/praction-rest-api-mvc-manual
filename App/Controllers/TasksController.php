<?php


namespace App\Controllers;


use App\Config\Database;
use App\Models\Task;

class TasksController extends Controller
{
    private $taskModel = null;

    public function __construct()
    {
        $this->taskModel = new Task();
    }
    public function index()
    {
        return $this->taskModel->index();
    }

    public function create()
    {
        $this->taskModel->create();
        return 'created';
    }

    public function store($description = null, $file = null, $finishDate = null, $urgently = null, $type = null)
    {
        $this->taskModel->store($description, $file, $finishDate, $urgently, $type);
        return 'stored';
    }

    public function show()
    {
        return 'show';
    }

    public function edit()
    {
        return 'edit';
    }

    public function update()
    {
        return 'update';
    }

    public function destroy()
    {
        return 'delete';
    }

}