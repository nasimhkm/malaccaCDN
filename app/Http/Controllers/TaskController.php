<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * (Tidak digunakan saat ini karena task ditampilkan di dashboard)
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * (Tidak digunakan karena kita menggunakan modal)
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari form modal
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:backlog,ongoing,done', // Memastikan statusnya valid
        ]);

        // Buat task baru di database
        Task::create($validated);

        // Kembali ke halaman dashboard dengan pesan sukses
        return redirect(route('admin.dashboard') . '#task')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     * (Tidak digunakan saat ini)
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * (Akan digunakan nanti untuk mengambil data untuk modal edit)
     */
    public function edit(Task $task)
    {
        // Mengembalikan data task sebagai JSON untuk diisi ke modal edit
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Validasi data yang masuk dari form edit
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:backlog,ongoing,done',
        ]);

        // Perbarui data task di database
        $task->update($validated);

        // Kembali ke halaman dashboard dengan pesan sukses
        return redirect(route('admin.dashboard') . '#task')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Hapus task dari database
        $task->delete();

        // Kembali ke halaman dashboard dengan pesan sukses
        return redirect(route('admin.dashboard') . '#task')->with('success', 'Task deleted successfully!');
    }
}
