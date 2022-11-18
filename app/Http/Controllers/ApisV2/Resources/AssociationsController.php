<?php

namespace App\Http\Controllers\ApisV2\Resources;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Programs\Association;
use App\Models\State;
use DB;
use Illuminate\Http\Request;

class AssociationsController extends Controller
{
    public function associations()
    {
        $data['Associations'] = Association::getAssociationFilter();

        $data['states'] = State::where('associations.status', 'Y')
        ->join('associations', 'associations.state_id', '=', 'states.id')
        // ->select('states.*')
        ->select('states.id','states.name')
        ->groupBy('states.id')
        ->get();

        $data['countries'] = Country::where('associations.status', 'Y')
        ->join('associations', 'associations.country_id', '=', 'countries.id')
        // ->select('countries.*')
        ->select('countries.id','countries.name')
        ->groupBy('countries.id')
        ->get();

        $data['cities'] = Association::where('associations.status', 'Y')
        ->select(DB::raw('DISTINCT city'))->get();
        return response()->json($data, 200);
    }

    public function filterAssociations(Request $request)
    {
        $associations = Association::getAssociationFilter($request->all());
        return response()->json($associations, 200);
    }
}