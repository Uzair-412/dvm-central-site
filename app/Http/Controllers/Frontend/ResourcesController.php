<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Country;
use App\Models\NewsPost;
use App\Models\Page;
use App\Models\AnimalPet;
use App\Models\CommonDisease;
use App\Models\Program;
use App\Models\Programs\Association;
use App\Models\Programs\Institute;
use App\Models\Programs\Types;
use App\Models\SurgicalProceduresArticle;
use App\Models\SurgicalProceduresCategory;
use Illuminate\Http\Request;
use App\Models\Redirect;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class HomeController.
 */
class ResourcesController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Resources';
        $data['News'] = NewsPost::where('status', 'Y')
            ->limit(4)
            ->orderBy('publish_date', 'DESC')
            ->get();
        $data['Program'] = Program::where('status', 'Y')
            ->limit(3)
            ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.resources.index', compact('data'));
    }

    public function news()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = '<a href="/resources/news">News</a>';
        $data['News'] = NewsPost::where('status', 'Y')
            ->orderBy('publish_date', 'DESC')
            ->paginate(20);
        return view('frontend.resources.news', compact('data'));
    }

    public function common_diseases($slug = '')
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Animal Pets';
        $data['animals'] = AnimalPet::all();
        $data['pet_slug'] = $slug;
        return view('frontend.resources.pet-animals', compact('data'));
    }
    public function shows_detail($slug)
    {
        $data['animals'] = AnimalPet::where('slug', $slug)->first();
        return view('frontend.resources.pet-animals', compact('data'));
    }
    public function pets_diseases($pet_slug = '', $disease_slug = '')
    {
        $data['disease_slug'] = $disease_slug;
        $data['pet_slug'] = $pet_slug;
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Pet Diseases';
        return view('frontend.resources.pet-diseases', compact('data'));
    }
    public function single_news($slug)
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = '<a href="/resources/news">News</a>';
        $data['News'] = NewsPost::where([
            ['slug', $slug],
            ['status', 'Y'],
        ])->first();
        $data['RelatedNews'] = NewsPost::relatedNews($data['News']);
        $data['breadcrumbs'][] = $data['News']->name;
        return view('frontend.resources.news_list', compact('data'));
    }

    public function programs()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Educational Programs';
        // $data['Programs'] = Program::getProgramsFilter();
        // $data['types'] = Types::where('programs_types.status', 'Y')
        // ->join('programs', 'programs.type_id', '=', 'programs_types.id')
        // ->select('programs_types.id', 'programs_types.name')
        // ->groupBy('programs_types.id')
        // ->get();

        // $data['states'] = State::where('programs_institutes.status', 'Y')
        // ->join('programs_institutes', 'programs_institutes.state_id', '=', 'states.id')
        // ->select('states.*')
        // ->groupBy('states.id')
        // ->get();

        // $data['countries'] = Country::where('programs_institutes.status', 'Y')
        // ->join('programs_institutes', 'programs_institutes.country_id', '=', 'countries.id')
        // ->select('countries.*')
        // ->groupBy('countries.id')
        // ->get();

        // $data['cities'] = Institute::where('programs_institutes.status', 'Y')
        // ->select(DB::raw('DISTINCT city'))->get();
        return view('frontend.resources.programs', compact('data'));
    }

    public function filter_programs(Request $request)
    {
        $programs = Program::getProgramsFilter($request->all());
        $show = '';
        foreach ($programs as $program) {
            $show .=
                '
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text text-capitalize font-weight-bold heading">
                                ' .
                $program->type->name .
                ' - ' .
                $program->institute->name .
                '
                            </p>
                            <p class="text-capitalize">' .
                $program->institute->state->name .
                '</p>
                            <p>' .
                $program->institute->address_line_1 .
                ' ' .
                $program->institute->address_line_2 .
                ' ' .
                $program->institute->city .
                ', ' .
                $program->institute->zip .
                '</p>';
            if ($program->institute->url != '') {
                $show .=
                    "<p> <a class='text-primary' href='" .
                    $program->institute->url .
                    "'>" .
                    $program->institute->url .
                    '</a></p>';
            }
            $show .=
                '<p><span class="font-weight-bold heading">Program Director:</span> ' .
                $program->director->name .
                '</p>
                            <p><span class="font-weight-bold heading">Discipline Code:</span> ' .
                $program->discipline_code .
                '</p>
                            <p><span class="font-weight-bold heading">Accreditation Status:</span> ' .
                $program->accreditation_status->name .
                '</p>
                            <p><span class="font-weight-bold heading">Last Accreditation Visit:</span> ' .
                $program->last_accreditation_visit .
                '</p>
                            <p><span class="font-weight-bold heading">Next Accreditation Visit:</span> ' .
                $program->next_accreditation_visit .
                '</p>
                        </div>
                    </div>
                </div>
            ';
        }
        $pagination = $programs->appends(request()->except('page'))->links();
        if (!empty(trim($pagination))) {
            $show .=
                '<div class="col-md-12">
                <div class="ps-pagination">
                    ' .
                $programs->appends(request()->except('page'))->links() .
                '
                </div>
            </div>';
        }
        $data['show'] = $show;
        $data['pagination'] = $programs->links();
        return json_encode($data);
    }
    public function online_resources()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Online Resources';
        return view('frontend.resources.online-resources', compact('data'));
    }

    public function associations()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Associations';
        // $data['Associations'] = Association::getAssociationFilter();

        // $data['states'] = State::where('associations.status', 'Y')
        // ->join('associations', 'associations.state_id', '=', 'states.id')
        // ->select('states.*')
        // ->groupBy('states.id')
        // ->get();

        // $data['countries'] = Country::where('associations.status', 'Y')
        // ->join('associations', 'associations.country_id', '=', 'countries.id')
        // ->select('countries.*')
        // ->groupBy('countries.id')
        // ->get();

        // $data['cities'] = Association::where('associations.status', 'Y')
        // ->select(DB::raw('DISTINCT city'))->get();
        return view('frontend.resources.associations', compact('data'));
    }

    public function filter_associations(Request $request)
    {
        $associations = Association::getAssociationFilter($request->all());
        $show = '';
        foreach ($associations as $Association) {
            $show .=
                '
                <div class="col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><span class="font-weight-bold heading"></span><img src="' .
                asset('up_data/associations/' . $Association->image) .
                '" 
                                    height="auto;" alt=""  max-width: 100%;/></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="card-text text-capitalize font-weight-bold heading"> ' .
                $Association->name .
                ' </p>
                                    <p class="text-capitalize">' .
                $Association->state->name .
                '</p>
                                    <p>' .
                $Association->address_line_1 .
                ' ' .
                $Association->address_line_2 .
                ' ' .
                $Association->city .
                ', ' .
                $Association->zip .
                '</p>';
            if ($Association->url != '') {
                $show .=
                    '<p><a href="' .
                    $Association->url .
                    '" class="text-primary">' .
                    $Association->url .
                    '</a></p>';
            }
            $show .=
                '<p><span class="font-weight-bold heading">Description: </span>' .
                $Association->description .
                '</p>  
                                    <p><span class="font-weight-bold heading">Phone Number: </span>' .
                $Association->phone_number .
                '</p> 
                                    <p><span class="font-weight-bold heading">UAN: </span>' .
                $Association->uan .
                '</p>  
                                    <p><span class="font-weight-bold heading">FAX: </span>' .
                $Association->fax_number .
                '</p>  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
        $pagination = $associations
            ->appends(request()->except('page'))
            ->links();
        if (!empty(trim($pagination))) {
            $show .=
                '<div class="col-md-12">
                <div class="ps-pagination">
                    ' .
                $associations->appends(request()->except('page'))->links() .
                '
                </div>
            </div>';
        }
        $data['show'] = $show;
        $data['pagination'] = $associations->links();
        return json_encode($data);
    }

    public function surgical_procedures()
    {
        $data['page'] = Page::find(7);

        $data['meta_title'] = $data['page']->meta_title;
        $data['meta_keywords'] = $data['page']->meta_keywords;
        $data['meta_description'] = $data['page']->meta_description;

        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Resources';
        $data['breadcrumbs'][] = 'Surgical Procedures';

        $data['categories'] = SurgicalProceduresCategory::where('status', 'Y')
            ->orderBy('name', 'asc')
            ->get();

        $data['section'] = 'page';

        return view('frontend.surgical-procedures.index', compact('data'));
    }

    public function surgical_procedures_category($category)
    {
        $data['category'] = SurgicalProceduresCategory::where(
            'slug',
            $category
        )->first();

        $data['meta_title'] = $data['category']->name;
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';

        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Resources';
        $data['breadcrumbs'][] = 'Surgical Procedures';
        $data['breadcrumbs'][] = $data['category']->name;

        $data['categories'] = SurgicalProceduresCategory::where('status', 'Y')
            ->orderBy('name', 'asc')
            ->get();
        $data['articles'] = SurgicalProceduresArticle::where([
            'status' => 'Y',
            'category_id' => $data['category']->id,
        ])
            ->orderBy('name', 'asc')
            ->get();

        $data['section'] = 'categories';

        return view('frontend.surgical-procedures.index', compact('data'));
    }

    public function surgical_procedures_article($category, $article)
    {
        $category = SurgicalProceduresCategory::where(
            'slug',
            $category
        )->first();
        $data['article'] = SurgicalProceduresArticle::where(
            'slug',
            $article
        )->first();

        $data['meta_title'] = $data['article']->meta_title;
        $data['meta_keywords'] = $data['article']->meta_keywords;
        $data['meta_description'] = $data['article']->meta_description;

        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Resources';
        $data['breadcrumbs'][] = 'Surgical Procedures';
        $data['breadcrumbs'][] = $category->name;
        $data['breadcrumbs'][] = $data['article']->name;

        $data['categories'] = SurgicalProceduresCategory::where('status', 'Y')
            ->orderBy('name', 'asc')
            ->get();

        $data['section'] = 'articles';

        return view('frontend.surgical-procedures.index', compact('data'));
    }
}
