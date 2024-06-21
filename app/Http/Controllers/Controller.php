<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Education;
use App\Models\Experiences;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Team;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        $services = Service::latest()->get();
        $teams = Team::latest()->get();
        $user = User::find(1);
        $technologies = Technology::latest()->get();
        $educations = Education::latest('start_date')->get();
        $experiences = Experiences::latest('start_date')->get();
        $skills = Skill::latest()->get();
        $portfolios = Portfolio::latest()->get();
        $categories = Category::latest()->get();
        $blogs = Blog::latest()->get();
        return view('home.index', compact(
            'user',
            'services',
            'teams',
            'technologies',
            'educations',
            'experiences',
            'skills',
            'portfolios',
            'categories',
            'blogs',
        ));
    }
}
