<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;
use Illuminate\Support\Facades\DB;

class StructureController extends Controller
{
    public function index()
    {
        $title = 'Company Structure';
        $structures = Structure::paginate(10);
        return view('Admin.Pages.Structure.index', compact('structures','title'));
    }

    public function create()
    {
        $title = 'Tambah Gambar Struktur';
        return view('Admin.Pages.Structure.create',compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'message'=> 'string',
        ]);
    
        // Untuk gambar
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/'.$imageName;
        } else {
            // Jika tidak ada gambar yang diunggah
            return redirect()->back()->with('error', 'Tidak ada file gambar yang diunggah.');
        }
    
        $structure = Structure::create([
            'image' => $imagePath,
            'detail'=>$request->input('message'),
        ]);
    
        return redirect()->route('structures.index')->with('success', 'Gambar berhasil disimpan.');
    }

    public function show($id)
    {
        $structure = Structure::findOrFail($id);
        return response()->json($structure);
    }

    public function edit($id)
    {
        $structure = Structure::findOrFail($id);
        $title = 'Edit Struktur';
        return view('Admin.Pages.Structure.edit',compact('structure','title'));
    }
    
    public function update(Request $request, $id)
{
    $structure = Structure::findOrFail($id);

    $request->validate([
        'image' => 'nullable|image|max:2048',
        'message' => 'string|nullable',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $structure->image = 'images/'.$imageName;
    }
    $structure->detail = $request->input('message', $structure->detail);
    $structure->save();

    return redirect()->route('structures.index')->with('success', 'Gambar  berhasil diperbarui');
}

public function destroy($id)
{
    $structure = Structure::findOrFail($id);
    $structure->delete();

    return redirect()->route('structures.index')->with('success', 'Gambar Struktur berhasil dihapus');
}



}
