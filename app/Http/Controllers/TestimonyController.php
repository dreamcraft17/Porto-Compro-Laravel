<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use Illuminate\Support\Facades\DB;

class TestimonyController extends Controller
{

    public function index()
    {
        $title='Testimoni';
        $testimonies = Testimony::paginate(10); // Mengambil data testimoni dengan paginasi
        return view('Admin.Pages.Testimony.index', compact('testimonies','title'));
    }

    public function create()
    {
        $title ='Tambah Visi';
        return view('Admin.Pages.Testimony.create',compact('title'));
    }
   //menyimpan testi 
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string',
           'message' => 'required|string',
           'image' => 'nullable|image|max:2048',
       ]);
   
       //untuk gambar
       if ($request->hasFile('image')) {
           $imageName = time().'.'.$request->image->extension(); // Perbaikan di sini
           $request->image->move(public_path('images'), $imageName);
           $imagePath = 'images/'.$imageName;
       } else {
           $imagePath = null;
       }
   
       $testimony = Testimony::create([
           'name' => $request->input('name'),
           'message' => $request->input('message'),
           'image' => $imagePath,
       ]);
   
       return redirect()->route('testimonies.index');
   }
   

    public function show($id)
    {
        $testimony = Testimony::findOrFail($id);
        return response()->json($testimony);
    }

    public function update(Request $request, $id)
    {
        $testimony = Testimony::findOrFail($id);

        
        $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
            'image' => 'nullable|image|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $testimony->image = 'images/'.$imageName;
        }

        $testimony->name = $request->input('name');
        $testimony->message = $request->input('message');
        $testimony->save();

        return response()->json($testimony);
    }

    public function destroy($id)
    {
        $testimony = Testimony::findOrFail($id);
        $testimony->delete();

        return redirect()->route('testimonies.index')->with('success', 'Testi berhasil diperbarui');
    }
}
