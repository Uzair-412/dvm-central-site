<?php

namespace App\Http\Controllers\ApisV2\Resources;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Program;
use App\Models\Programs\Institute;
use App\Models\Programs\Types;
use App\Models\State;
use DB;
use Illuminate\Http\Request;

class EducationalProgramsController extends Controller
{
    public function programs()
    {
        $data['programs'] = Program::getProgramsFilter();
        $data['types'] = Types::where('programs_types.status', 'Y')
        ->join('programs', 'programs.type_id', '=', 'programs_types.id')
        ->select('programs_types.id', 'programs_types.name')
        ->groupBy('programs_types.id')
        ->get();
        
        
        $data['states'] = State::where('programs_institutes.status', 'Y')
        ->join('programs_institutes', 'programs_institutes.state_id', '=', 'states.id')
        // ->select('states.*')
        ->select('states.id','states.name')
        ->groupBy('states.id')
        ->get();
        
        $data['countries'] = Country::where('programs_institutes.status', 'Y')
        ->join('programs_institutes', 'programs_institutes.country_id', '=', 'countries.id')
        // ->select('countries.*')
        ->select('countries.id','countries.name')
        ->groupBy('countries.id')
        ->get();
        
        $data['cities'] = Institute::where('programs_institutes.status', 'Y')
        ->select(DB::raw('DISTINCT city'))->get();
        return response()->json($data, 200);
    }

    public function filterPrograms(Request $request)
    {
        $programs = Program::getProgramsFilter($request->all());
        return response()->json($programs, 200);
    }
}