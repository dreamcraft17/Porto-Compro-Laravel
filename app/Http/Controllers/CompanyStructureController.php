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
        $companyStructure = CompanyStructure::with('positions.employees')->get();
        return view('Admin.Pages.CompanyStructure.Index', compact('companyStructure', 'title'));
    }

    public function create()
    {
        $title = 'Add Company Structure';
        $positions = Position::all();
        return view('Admin.Pages.CompanyStructure.create', compact('title', 'positions'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Create the company structure
        $companyStructure = CompanyStructure::create([
            'name' => $request->input('name'),
            // Add more fields as needed
        ]);

        // Attach positions to the company structure
        $companyStructure->positions()->attach($request->input('positions'));

        return redirect()->route('company_structure.index')->with('success', 'Company Structure added successfully');
    }

    // Add methods for edit, update, and destroy as needed
}
