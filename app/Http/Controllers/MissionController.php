<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use Illuminate\Support\Facades\DB;

class MissionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $title ='Misi';
        $missions = Mission::paginate(10);

        return view('Admin.Pages.Mission.index', compact('missions','title'));
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
        $title = 'Tambah Misi';
        return view('Admin.Pages.Mission.create',compact('title'));
     }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
        $validatedData = $request->validate([
            'body' => 'required|string',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['body'] = strip_tags($validatedData['body']);

        $missions = Mission::create($validatedData);
        return redirect()->route('misi.index')->with('success', 'Misi berhasil disimpan');
     }

      
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */

     public function show(Mission $mission)
     {
        return view('mission.show', ['mission' => $mission]);
     }

     /**
     * Display visions in the guest layout.
     *
     * @return \Illuminate\Http\Response
     */

     public function displayInGuestLayout()
{
    $title = 'Misi';
    $missionsGuest = Mission::all();
 
    return view('Guest.Layouts.Index', compact('missionsGuest', 'title'));
}


   /**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Mission  $mission
 * @return \Illuminate\Http\Response
 */
public function destroy(Mission $mission)
{
    $mission->delete();

    return redirect()->route('misi.index')->with('success', 'Misi berhasil dihapus');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Mission  $mission
 * @return \Illuminate\Http\Response
 */

 public function edit(Mission $mission)
 {
     $title = 'Edit Misi';
     return view('Admin.Pages.Mission.edit', compact('mission', 'title'));
 }
 
 public function update(Request $request, Mission $mission)
 {
     $validatedData = $request->validate([
         'body' => 'required|string',
     ]);
 
     $validatedData['body'] = strip_tags($validatedData['body']);
 
     $mission->update($validatedData);
 
     return redirect()->route('misi.index')->with('success', 'Misi berhasil diperbarui');
 }


     
}
