<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    // Index
    public function index()
    {
        $types = Type::all();
        return view('type.index', compact('types'));
    }
    // Create
    public function create()
    {
        return view('type.create');
    }

    // Store
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        Type::create($request->all());
        return redirect()->route('type.index');
    }

    // Edit
    public function edit($type)
    {
        $type = Type::find($type);

        return view('type.edit', compact('type'));
    }

    // Update
    public function update(Request $request,$type)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $type = Type::find($type);
        $type->update($request->all());

        return redirect()->route('type.index');
    }

    // Delete
    public function delete($type)
    {
        $type = Type::find($type);
        $type->delete();
        return redirect()->route('type.index');
    }
}
