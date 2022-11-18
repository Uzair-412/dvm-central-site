<?php

namespace App\Http\Livewire\Frontend\Resource;

use App\Models\Programs\Association;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Country;

class Associations extends Component
{
    public $data;
    public $filter = [];
    public function render()
    {
        $data['Associations'] = Association::getAssociationFilter(
            $this->filter
        );

        $data['states'] = State::where('associations.status', 'Y')
            ->join('associations', 'associations.state_id', '=', 'states.id')
            ->select('states.*')
            ->groupBy('states.id')
            ->get();

        $data['countries'] = Country::where('associations.status', 'Y')
            ->join(
                'associations',
                'associations.country_id',
                '=',
                'countries.id'
            )
            ->select('countries.*')
            ->groupBy('countries.id')
            ->get();

        $data['cities'] = Association::where('associations.status', 'Y')
            ->select(DB::raw('DISTINCT city'))
            ->get();
        // $data['associations'] = Association::paginate(12);
        return view('livewire.frontend.resource.associations', $data);
    }
}
