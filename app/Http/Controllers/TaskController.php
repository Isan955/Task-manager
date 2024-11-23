<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Middleware;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->with('category')->get(); // Menampilkan task dengan kategori
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $users = User::all(); 
        $kategori = Category::all(); 
        return view('tasks.create', compact('users', 'kategori'));
    }
        public function store(StoreTaskRequest $request)
    {
        // Validasi input termasuk category_id
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'nullable|string',
            'category_id' => 'required|integer', // Pastikan category_id valid
        ]);

        $validated['user_id'] = auth()->id();
        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dibuat');
    }


    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $users = User::all(); 
        $kategori = Category::all(); 
        $tasks = Task::findOrFail($id);
        return view('tasks.edit', compact('tasks', 'users', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus');
    }
    public function overdueTasks()
    {
        // Menggunakan scope untuk mendapatkan task yang overdue
        $overdueTasks = Task::overdue()->get();
        return view('tasks.overdue', compact('overdueTasks'));
    }

    public function softDelete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('message', 'Task berhasil dihapus.');
    }

    // Mengembalikan data yang dihapus
    public function restore($id)
    {
        $task = Task::withTrashed()->find($id);
        $task->restore();
        return redirect()->back()->with('message', 'Task berhasil dipulihkan.');
    }
    public function forceDelete($id)
    {
        $task = Task::withTrashed()->find($id);
        $task->forceDelete();
        return redirect()->back()->with('message', 'Task dihapus secara permanen.');
    }

    // Menampilkan semua task termasuk yang dihapus
    public function indexWithTrashed()
    {
        $tasks = Task::withTrashed()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Menampilkan hanya task yang dihapus
    public function onlyTrashed()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('tasks.index', compact('tasks'));
    }
    

    public function getTasksByCategory($categoryName)
    {
        $tasks = DB::table('tasks')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('categories.name', $categoryName)
            ->select('tasks.*', 'categories.name as category_name')
            ->get();

        return view('tasks.by_category', compact('tasks', 'categoryName'));
    }
}
