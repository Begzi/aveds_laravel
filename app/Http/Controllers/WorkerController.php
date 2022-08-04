<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use Illuminate\Support\Facades\Storage;

class WorkerController extends Controller
{
    public function __construct(Request $request)
    {
        dump($request->route()->getName());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        return view('workers.index', ['workers'=> $workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'age' => 'required',
            'environment' => 'required',
            'avarage_salary' => 'required',
            'photo' => 'required|image',
        ]);
        $folder = date('Y-m-d');
        $photo = $request->file('photo')->store("images/{$folder}");
        Worker::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'age' => $request->age,
            'environment' => $request->environment,
            'avarage_salary' => $request->avarage_salary,
            'photo' => $photo,
        ]);
        return redirect('/workers/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker_1 = Worker::find($id);
        return view('workers.show', ['worker_1'=> $worker_1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker_1 = Worker::find($id);
        dump($worker_1->fullname);
        return view('workers.edit', ['worker_1'=> $worker_1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'age' => 'required',
            'environment' => 'required',
            'avarage_salary' => 'required',
            'photo' => 'nullable|image',
        ]);
        if ($request->file('photo') != null){
            $folder = date('Y-m-d');
            $photo = $request->file('photo')->store("images/{$folder}", 'public'); 
            $worker = Worker::find($id);
            Storage::disk('local')->delete($worker->photo);
            $worker->fill([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'age' => $request->age,
                'environment' => $request->environment,
                'avarage_salary' => $request->avarage_salary,
                'photo' => $photo,
            ]);  
            $worker->save();         
        }
        else{
            $worker = Worker::find($id);
            $worker->fill([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'age' => $request->age,
                'environment' => $request->environment,
                'avarage_salary' => $request->avarage_salary,
            ]);
            $worker->save();  
        }
        return redirect('/workers/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        Storage::disk('local')->delete($worker->photo);
        $worker->delete();
        return redirect('/workers/');
    }
}
