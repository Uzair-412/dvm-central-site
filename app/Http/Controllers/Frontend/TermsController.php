<?php

namespace App\Http\Controllers\Frontend;


/**
 * Class TermsController.
 */
class TermsController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Terms & Conditions';

        return view('frontend.pages.terms', compact('data'));
    }
}
