<?php

namespace App\Http\Livewire\Frontend\Resource;

use App\Models\Country;
use Livewire\Component;
use App\Models\Program;
use App\Models\Programs\Institute;
use App\Models\Programs\Types;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Programs extends Component
{   
    // use WithPagination;
    public $data;
    public $filter = [];
    public function render()
    {
        $data['Programs'] = Program::getProgramsFilter($this->filter);
        $data['types'] = Types::where('programs_types.status', 'Y')
            ->join('programs', 'programs.type_id', '=', 'programs_types.id')
            ->select('programs_types.id', 'programs_types.name')
            ->groupBy('programs_types.id')
            ->get();

        $data['states'] = State::where('programs_institutes.status', 'Y')
            ->join(
                'programs_institutes',
                'programs_institutes.state_id',
                '=',
                'states.id'
            )
            ->select('states.*')
            ->groupBy('states.id')
            ->get();

        $data['countries'] = Country::where('programs_institutes.status', 'Y')
            ->join(
                'programs_institutes',
                'programs_institutes.country_id',
                '=',
                'countries.id'
            )
            ->select('countries.*')
            ->groupBy('countries.id')
            ->get();

        $data['cities'] = Institute::where('programs_institutes.status', 'Y')
            ->select(DB::raw('DISTINCT city'))
            ->get();
        return view('livewire.frontend.resource.programs', $data);
    }
}
