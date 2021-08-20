<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SectionCard;
use Illuminate\Http\Request;

class About extends Controller
{
    public  function index(){
        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 1)->where('order', 1)->first();
        $section_2 = Section::where('category_id', 'section-bg')->where('type_id', 1)->where('order', 2)->first();
        $section_3 = Section::where('category_id', 'section-block')->where('type_id', 1)->where('order', 3)->first();
        $section_4 = SectionCard::where('type_id', 1)->where('order', 4)->get();
        return view('about',[
            'section_1' => $section_1,
            'section_2' => $section_2,
            'section_3' => $section_3,
            'section_4' => $section_4,
        ]);
    }

}
