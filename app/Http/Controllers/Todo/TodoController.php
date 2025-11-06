<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{  
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = Todo::orderBy('task', 'asc')->get();
        // return view("todo.app", compact('data'));
        $query = Todo::query();

        // Search berdasarkan kata kunci
       if ($request->filled('search')) {
            $query->where('task', 'like', '%' . $request->search . '%');
       }

    //    filter berdasarkan status (0 = belum, 1= selesai)
       if ($request->filled('status')){
            $query->where('is_done', $request->status);
       }

       $data = $query->orderBy('task', 'asc')->get();
       return view("todo.app", compact('data'));


    }

    /**
     * Show the form for creating a new resource.
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
        $request->validate([
            'task' => 'required|min:3|max:35'
        ],[
            'task.required'=>'Isian task wajib diisikan',
            'task.min'=>'Minimal karakter yang haruus diisi 3 karakter',
            'task.max'=>'Maksimal karakter yang haruus diisi 25 karakter',

        ]);

        $data = [
            'task'=> $request->input('task')
        ];

        Todo::create($data);
        return redirect()->route('todo')->with('success', 'Berhasil menyimpan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|min:3|max:25'
        ],[
            'task.required'=>'Isian task wajib diisikan',
            'task.min'=>'Minimal karakter yang haruus diisi 3 karakter',
            'task.max'=>'Maksimal karakter yang haruus diisi 25 karakter',

        ]);

        $data = [
            'task' => $request->input('task'),
            'is_done'=> $request->input('is_done')
        ];

        Todo::where('id', $id)->update($data);
        return redirect('/todo')->with('success', 'Berhasil menyimpan perbaiki data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::where('id', $id)->delete();
        return redirect()->route('todo')->with('succes', 'Task berhasil dihapus');
    }
}
