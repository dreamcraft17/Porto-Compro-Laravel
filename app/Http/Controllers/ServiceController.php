<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $title='service';
        $services = Service::paginate(10); // Mengambil data testimoni dengan paginasi
        return view('Admin.Pages.Service.index', compact('services','title'));
    }

    public function create()
    {
        $title = 'Tambah Service';
        return view('Admin.Pages.Service.create',compact('title'));
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
    
        $service = Service::create([
            'name' => $request->input('name'),
            'detail' => $request->input('message'),
            'image' => $imagePath,
        ]);
    
        return redirect()->route('services.index');
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service);
    }


    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $title = 'Edit Produk';
        return view('Admin.Pages.Service.edit', compact('service', 'title'));
    }



    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        
        $request->validate([
            'name' => 'required|string',
            'detail' => 'required|string',
            'image' => 'nullable|image|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $service->image = 'images/'.$imageName;
        }

        $service->name = $request->input('name');
        $service->detail = $request->input('detail');
        $service->save();

        // return response()->json($service);

        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui');
    }
    
}
