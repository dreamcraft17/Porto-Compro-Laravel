<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Facades\DB;
class AchievementController extends Controller
{
    //

    public function index()
    {
        $title='Achievement';
        $achievements= Achievement::paginate(10);
        return view('Admin.Pages.Achievement.index', compact('achievements','title'));
    }

    public function create()
    {
        $title ='Tambah Penghargaan';
        return view('Admin.Pages.Achievement.create',compact('title'));
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
    
        $achievement = Achievement::create([
            'name' => $request->input('name'),
            'detail' => $request->input('message'),
            'image' => $imagePath,
        ]);
    
        return redirect()->route('achievements.index');
    }

    public function show($id)
    {
        $achievement = Achievement::findOrFail($id);
        return response()-> json($achievement);
    }

    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        $title = 'Edit Penghargaan';
        return view('Admin.Pages.Achievement.edit', compact('achievement', 'title'));
    }

    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);

        
        $request->validate([
            'name' => 'required|string',
            'detail' => 'required|string',
            'image' => 'nullable|image|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $achievement->image = 'images/'.$imageName;
        }

        $achievement->name = $request->input('name');
        $achievement->detail = $request->input('detail');
        $achievement->save();

        return redirect()->route('achievements.index')->with('success', 'Penghargaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement-> delete();

        return redirect()->route('achievements.index')->with('success', 'Penghargaan berhasil diperbarui');
    }
}
