<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\Testimony;
use App\Models\Product;
use App\Models\Service;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index6()
    {
        $title = 'Home';
        $testimonies = Testimony::paginate(10);
        $products = Product::paginate(10);
        $services = Service::paginate(10);
        return view('Guest.Index', compact('testimonies','products','services','title'));
    }

    public function guestIndex()
    {
        $title = 'Product';
        $products = Product::paginate(10); // Mengambil data produk dengan paginasi
        return view('Guest.Products', compact('products', 'title'));
    }

    public function guestIndex2()
    {
        $title = 'Services';
        $services = Service::paginate(10); // Mengambil data produk dengan paginasi
        return view('Guest.Services', compact('services', 'title'));
    }
     public function index()
    {
        return view('Guest.Posts', [
            'title' => 'Company Achievement',
            "posts" => Post::query()->where('category_id', '=', 1)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    // public function index1()
    // {
    //     return view('Guest.Posts', [
    //         'title' => 'Products',
    //         "posts" => Post::query()->where('category_id', '=', 3)->where('is_published', true)->latest()->paginate(7)
    //     ]);
    // }
    public function index2()
    {
        return view('Guest.Posts', [
            'title' => 'Contact Us',
            "posts" => Post::query()->where('category_id', '=', 4)->where('is_published', true)->latest()->paginate(7)
        ]);
    }
    public function index3()
    {
        return view('Guest.Posts', [
            'title' => 'Careers',
            "posts" => Post::query()->where('category_id', '=', 2)->where('is_published', true)->latest()->paginate(7)
        ]);
    }

    // public function index4()
    // {
    //     $title = 'Testimoni';
    //     $testimonies = Testimony::paginate(10);
    //     return view('Guest.index', compact('testimonies', 'title'));
    // }

    public function index5()
    {
        
        $visions = Vision::all();
        $missions = Mission::all();
        
        return view('Guest.About', [
            'title' => 'About Us',
            'visions' => $visions,
            'missions'=> $missions
        ]);
    }

        public function index8()
    {
        
        $visions = Vision::all();
        $missions = Mission::all();
        
        return view('Guest.Partnership', [
            'title' => 'Our Partner',
            'visions' => $visions,
            'missions'=> $missions
        ]);
    }
    

    // public function index6()
    // {
    //     $missions = Mission::all();

    //     return view('Guest.About',[
    //         'title'=> 'About Us',
    //         'missions' => $missions
    //     ]);
    // }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('Guest.Post', [
            "title" => $post->title,
            "post" => $post
        ]);
    }
    
}
