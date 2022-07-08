<?php

namespace App\Http\Controllers;


use App\Models\Report;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $school_id = auth()->user()->school_id;

        $reports = Report::where('school_id', 'LIKE', $school_id)
                            ->paginate(15);

        return view('pages.show-report', [
            'reports' => $reports
        ]);
    }

    public function create() 
    {
        $schools = School::all();
        return view('pages.create-report', [
            'schools' => $schools
        ]);
    }

    public function store(Request $request)
    {

        $school_id = $request->school_id;
        if (auth()->user()->hasRole('admin')) {
            $school_id = auth()->user()->school_id;
        }
        
        Report::create([
            'school_id' => $school_id,
            'indicator_number' => $request->indicator_number,
            'indicator_name' => $request->indicator_name,
            'indicator_detail' => $request->indicator_detail,
            'score' => $request->score,
            'similar_national' => $request->similar_national,
            'average_city' => $request->average_city,
            'average_province' => $request->average_province,
            'average_national' => $request->average_national,
            'achievement_point' => $request->achievement_point,
            'achievement_point_detail' => $request->achievement_point_detail,
            'score_range' => $request->score_range,
            'level' => $request->level,
            'created_at' => $request->created_at
        ]);

        return redirect()->back()->with('message','Data berhasil ditambah');
    }

    public function edit(Report $report)
    {
        return view('pages.edit-report', compact('report'));
    }

    public function update(Report $report, Request $request)
    {
        $report->update([
            'indicator_number' => $request->indicator_number,
            'indicator_name' => $request->indicator_name,
            'indicator_detail' => $request->indicator_detail,
            'score' => $request->score,
            'similar_national' => $request->similar_national,
            'average_city' => $request->average_city,
            'average_province' => $request->average_province,
            'average_national' => $request->average_national,
            'achievement_point' => $request->achievement_point,
            'achievement_point_detail' => $request->achievement_point_detail,
            'score_range' => $request->score_range,
            'level' => $request->level,
            'created_at' => $request->created_at
        ]);

        return redirect()->back()->with('message','Data berhasil diubah');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return back();
    }


}
