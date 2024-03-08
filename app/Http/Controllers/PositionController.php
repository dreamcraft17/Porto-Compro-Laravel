<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
class PositionController extends Controller
{
    public function index()
    {
        $title="Daftar Posisi";
        $positions = Position::paginate(10);
        return view('Admin.Pages.Position.index', compact('positions','title'));
    }

    public function create()
    {
        $title="Tambah Posisi";
        return view('Admin.Pages.Position.create',compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);
    
        //untuk gambar
      
    
        $position = Position::create([
            'title' => $request->input('title'),
        ]);
    
        return redirect()->route('positions.index');
    }
}
