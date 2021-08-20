<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use App\Models\Car;
use App\Models\Section;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $sliders = Baner::all();
        $section_2 = Section::where('category_id', 'section-block')->where('type_id', 0)->where('order', 2)->first();
        $section_3 = Section::where('category_id', 'section-bg')->where('type_id', 0)->where('order', 3)->first();
        $section_4 = Section::where('category_id', 'section-block')->where('type_id', 0)->where('order', 4)->first();
        $cars = Car::all();
//        dd($cars);
        return view('index', [
            'baners' => $sliders,
            'section_2' => $section_2,
            'section_3' => $section_3,
            'section_4' => $section_4,
            'cars' => $cars
        ]);
    }
    public function contact(){
        return view('contact');
    }
}
