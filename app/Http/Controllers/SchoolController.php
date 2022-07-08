<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\School;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $subdistricts = Subdistrict::all();

        if ($request->has('search')) {
            $schools = School::where('name', 'LIKE', '%'. $request->search . '%')
                            ->orderBy('name')
                            ->paginate(5);
        } else {
            $schools = School::paginate(10);
        }


        return view('pages.show-school', [
            'schools' => $schools, 
            'subdistricts' => $subdistricts
        ]);
    }

    public function store(Request $request) 
    {
        School::create([
            'name' => $request->name, 
            'address' => $request->address, 
            'subdistrict_id' => $request->subdistrict_id
        ]);

        return redirect()->back()->with('message', 'Berhasil Menambah Sekolah');
    }


    // Show Report!
    public function show(School $school)
    { 
        $reports = $school->reports()->paginate(15);
        
        return view('pages.show-school-report', [
            'reports' => $reports
        ]);
    }

}
