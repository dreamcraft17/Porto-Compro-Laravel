<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\Testimony;
use App\Models\Product;
use App\Models\Service;
use App\Models\Achievement;
use App\Models\Structure;
use App\Models\Career;

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
        $achievements = Achievement::paginate(10);
        return view('Guest.Index', compact('testimonies','products','services','achievements','title'));
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

    public function guestIndex3()
    {
        $title = 'Achievements';
        $achievements = Achievement::paginate(10); // Mengambil data produk dengan paginasi
        return view('Guest.Achievement', compact('achievements', 'title'));
    }

    public function guestIndex4()
    {
        $title ='Company Strucutre';
        $structures = Structure::paginate(10);
        return view('Guest.Structure',compact('structures','title'));
    }

    public function guestIndex5()
    {
        $title ='Careers';
        $careers = Career::paginate(10);
        return view('Guest.Career',compact('careers','title'));
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
/**
     * Search posts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $title = 'Search Results';
        $searchQuery = $request->input('query');
    

        $products = Product::where('name', 'like', "%$searchQuery%")
                    ->orWhere('detail', 'like', "%$searchQuery%")
                    ->get();
    
        
        $achievements = Achievement::where('name', 'like', "%$searchQuery%")
                    ->orWhere('detail', 'like', "%$searchQuery%")
                    ->get();
    
        
        $services = Service::where('name', 'like', "%$searchQuery%")
                    ->orWhere('detail', 'like', "%$searchQuery%")
                    ->get();
    
        
        $allResults = $products->merge($achievements)->merge($services);
    
        
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageSearchResults = $allResults->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $searchResults = new LengthAwarePaginator($currentPageSearchResults, count($allResults), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
    
        return view('Guest.SearchResults', compact('searchResults', 'title', 'searchQuery'));
    }
    

    
}
