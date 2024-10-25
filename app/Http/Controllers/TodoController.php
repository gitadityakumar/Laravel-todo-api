<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json([
            'status' => 'success',
            'data' => $todos
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed'
        ]);

        $todo = Todo::create($validated);
        return response()->json([
            'status' => 'success',
            'data' => $todo
        ], 201);
    }

    public function show(Todo $todo)
    {
        return response()->json([
            'status' => 'success',
            'data' => $todo
        ]);
    }

    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed'
        ]);

        $todo->update($validated);
        return response()->json([
            'status' => 'success',
            'data' => $todo
        ]);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Todo deleted successfully'
        ]);
    }
}