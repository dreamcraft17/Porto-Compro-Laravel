<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    public function index()
    {
        $title='Career';
        $careers = Career::paginate(10); // Mengambil data testimoni dengan paginasi
        return view('Admin.Pages.Career.index', compact('careers','title'));
    }

    public function create()
    {
        $title ='Tambah Produk';
        return view('Admin.Pages.Career.create',compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
    
        //untuk gambar
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/'.$imageName;
        } else {
            $imagePath = null;
        }
    
        $career = Career::create([
            'name' => $request->input('name'),
            'detail' => $request->input('message'),
            'image' => $imagePath,
        ]);
    
        return redirect()->route('careers.index');
    }

     public function show($id)
    {
        $career = Career::findOrFail($id);
        return response()->json($career);
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        $title = 'Edit Produk';
        return view('Admin.Pages.Career.edit', compact('Career', 'title'));
    }



    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        
        $request->validate([
            'name' => 'required|string',
            'detail' => 'required|string',
            'image' => 'nullable|image|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $career->image = 'images/'.$imageName;
        }

        $career->name = $request->input('name');
        $career->detail = $request->input('detail');
        $career->save();

        return redirect()->route('careers.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return redirect()->route('careers.index')->with('success', 'Produk berhasil dihapus');
    }
}
