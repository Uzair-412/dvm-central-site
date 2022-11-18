<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'My Courses';
        $data['page'] = 'courses';
        $view = 'my_courses';
        return view('frontend.user.courses.index', compact('data', 'view'));
    }
}
