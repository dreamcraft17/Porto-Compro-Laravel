<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $title='Product';
        $products = Product::paginate(10); // Mengambil data testimoni dengan paginasi
        return view('Admin.Pages.Product.index', compact('products','title'));
    }

    public function create()
    {
        $title ='Tambah Produk';
        return view('Admin.Pages.Product.create',compact('title'));
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
    
        $product = Product::create([
            'name' => $request->input('name'),
            'detail' => $request->input('message'),
            'image' => $imagePath,
        ]);
    
        return redirect()->route('products.index');
    }

     public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $title = 'Edit Produk';
        return view('Admin.Pages.Product.edit', compact('product', 'title'));
    }



    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        
        $request->validate([
            'name' => 'required|string',
            'detail' => 'required|string',
            'image' => 'nullable|image|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $product->image = 'images/'.$imageName;
        }

        $product->name = $request->input('name');
        $product->detail = $request->input('detail');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }
}
