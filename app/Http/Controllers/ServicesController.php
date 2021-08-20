<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SectionCard;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
   public function traction_battery_rental(){

       $section_1 = Section::where('category_id', 'section-block')->where('type_id', 5)->where('order', 1)->first();
       $section_2 = Section::where('category_id', 'section-block')->where('type_id', 5)->where('order', 2)->first();
       $section_3 = SectionCard::where('type_id', 5)->where('order', 3)->get();

       return view('services.traction-battery-rental',[
           'section_1' => $section_1,
           'section_2' => $section_2,
           'section_3' => $section_3,
       ]);
   }

   public function warehouse_equipment_repair(){
       $section_1 = Section::where('category_id', 'section-block')->where('type_id', 6)->where('order', 1)->first();

       return view('services.warehouse-equipment-repair',[
           'section_1' => $section_1,
       ]);
   }

    public function training_consultation(){
        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 7)->where('order', 1)->first();

        return view('services.training-consultation',[
            'section_1' => $section_1,
        ]);
    }

    public function loader_rental(){
        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 8)->where('order', 1)->first();
        $section_2 = SectionCard::where('type_id', 8)->where('order', 2)->get();

        return view('services.loader-rental',[
            'section_1' => $section_1,
            'section_2' => $section_2,
        ]);
    }

    public function after_sales_service(){
        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 9)->where('order', 1)->first();

        return view('services.after-sales-service',[
            'section_1' => $section_1,
        ]);
    }

}
