<?php

namespace App\Http\Controllers;
use App\Models\Crud;
use Illuminate\Http\Request;

class Crudcontroller extends Controller
{
    public function index()
    {
        $students = Crud::all();
        return view ('crud.index')->with('crud', $students);
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Student::create($input);
        return redirect('crud')->with('flash_message', 'crud Addedd!');
    }

    public function show($id)
    {
        $student = Crud::find($id);
        return view('crud.show')->with('crud', $student);
    }

    public function edit($id)
    {
        $student = Crud::find($id);
        return view('crud.edit')->with('crud', $student);
    }

    public function update(Request $request, $id)
    {
        $student = Crud::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('crud')->with('flash_message', 'crud Updated!');
    }

    public function destroy($id)
    {
        Crud::destroy($id);
        return redirect('crud')->with('flash_message', 'crud deleted!');
    }
}
