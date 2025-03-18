<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyStructure;
use App\Models\Position;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class CompanyStructureController extends Controller
{
    public function index()
    {
        $title = 'Company Structure';
        $companystructures = CompanyStructure:: paginate(10);
        return view('Admin.Pages.CompanyStructure.Index', compact('companystructures','title'));
    }

    public function create()
    {
        $title='Masukkan Gambar Struktur';
        return view ('Admin.Pages.CompanyStructure.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:9999',
        ]);

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $imagePath = 'images/'.$imageName;
        }else{
            $imagePath = null;
        }

        $companystructure = CompanyStructure::create([
            'image'=>$imagePath,
        ]);

        return redirect()->route('companystructures.index');
    }

    public function show($id)
    {
        $companystructure = CompanyStructure::findOrFail($id);
        return response()->json($companystructure);
    }

    public function edit($id)
    {
        $companystructure= CompanyStructure::findOrFail($id);
        $title = 'Ganti Gambar';
        return view('Admin.Pages.CompanyStructure.edit',compact('companystructure','title'));
    }


    public function update(Request $request, $id)
    {
        $companystructure = CompanyStructure::findOrFail($id);

        $request->validate([
            'image'=>'nullable|image|max:99999',
        ]);

        if($request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $companystructure->image ='images/'.$imageName;
        }

        $companystructure->save();

        return redirect()->route('companystructure.index')->with('success', 'Gambar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $companystructure=CompanyStructure::findOrFail($id);
        $companystructure->delete();

        return redirect()->route('companystructures.index')->with('success', 'Gambar berhasil dihapus');
    }
}