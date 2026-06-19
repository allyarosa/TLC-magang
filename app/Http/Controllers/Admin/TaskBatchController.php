<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskBatchRequest;
use App\Models\TaskBatch;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskBatchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $batches = TaskBatch::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->latest()->paginate(10)->withQueryString();

        return view('admin.task-batches.index', compact('batches', 'search'));
    }

    public function create()
    {
        return view('admin.task-batches.create');
    }

    public function store(TaskBatchRequest $request)
    {
        TaskBatch::create($request->validated());
        Alert::toast('Angkatan/Batch berhasil ditambahkan', 'success')->autoClose(2500);
        return redirect()->route('admin.task-batches.index');
    }

    public function edit(TaskBatch $taskBatch)
    {
        return view('admin.task-batches.edit', compact('taskBatch'));
    }

    public function update(TaskBatchRequest $request, TaskBatch $taskBatch)
    {
        $taskBatch->update($request->validated());

        return redirect()->route('admin.task-batches.index')->with('success', 'Angkatan/Batch berhasil diperbarui.');
    }

    public function destroy(TaskBatch $taskBatch)
    {
        $taskBatch->delete();
        Alert::toast('Angkatan/Batch berhasil dihapus', 'success')->autoClose(2500);
        
        return redirect()->route('admin.task-batches.index')->with('success', 'Angkatan/Batch berhasil dihapus.');
    }
}
