<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Resources\V1\TodoCollection;
use App\Http\Resources\V1\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return new TodoCollection(Todo::all());
    }

    public function show(Todo $todo)
    {
        return new TodoResource($todo);
    }

    public function store(StoreTodoRequest $request)
    {
        Todo::create($request->validated());
        return response()->json("Todo Created");
    }

    public function update(StoreTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
        return response()->json("Todo Updated");
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json("Todo Deleted");
    }
}
