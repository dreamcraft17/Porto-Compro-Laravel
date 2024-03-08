<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Vision;

class VisionController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Visi';
       
        $visions = Vision::paginate(10);

       
        return view('Admin.Pages.Vision.index', compact('visions','title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Tambah Visi';
       
        return view('Admin.Pages.Vision.create',compact('title'));
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
     
        
         $vision = Vision::create($validatedData);
     
         return redirect()->route('visi.index')->with('success', 'Visi berhasil disimpan');
     }
     
     
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function show(Vision $vision)
    {
        
        return view('vision.show', ['vision' => $vision]);
    }


    
    

    /**
     * Display visions in the guest layout.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayInGuestLayout()
    {
        $title = 'Visi';
        
        $visionsGuest = Vision::all();

       
        return view('Guest.Layouts.Index', compact('visionsGuest', 'title'));
    }
 
   /**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Vision  $vision
 * @return \Illuminate\Http\Response
 */
public function destroy(Vision $vision)
{
    $vision->delete();

    return redirect()->route('visi.index')->with('success', 'Visi berhasil dihapus');
}

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Vision  $vision
 * @return \Illuminate\Http\Response
 */

 public function edit(Vision $vision)
 {
     $title = 'Edit Misi';
     return view('Admin.Pages.Vision.edit', compact('vision', 'title'));
 }
 
 public function update(Request $request, Vision $vision)
 {
     $validatedData = $request->validate([
         'body' => 'required|string',
     ]);
 
     $validatedData['body'] = strip_tags($validatedData['body']);
 
     $vision->update($validatedData);
 
     return redirect()->route('visi.index')->with('success', 'visi berhasil diperbarui');
 }
}
?>