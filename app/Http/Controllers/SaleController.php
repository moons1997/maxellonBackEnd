<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SectionCard;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function sale_of_accumulators(){

        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 10)->where('order', 1)->first();
        $section_2 = SectionCard::where('type_id', 10)->where('order', 2)->get();
        return view('sale.sale-of-accumulators',[
            'section_1' => $section_1,
            'section_2' => $section_2,
        ]);
    }

    public function installment_of_accumulators(){

        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 11)->where('order', 1)->first();
        $section_2 = SectionCard::where('type_id', 11)->where('order', 2)->get();
        return view('sale.installment-of-accumulators',[
            'section_1' => $section_1,
            'section_2' => $section_2,
        ]);
    }

    public function test_drive(){

        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 12)->where('order', 1)->first();

        return view('sale.test-drive',[
            'section_1' => $section_1,
        ]);
    }


    public function sale_of_loader(){

        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 13)->where('order', 1)->first();

        return view('sale.sale-of-loader',[
            'section_1' => $section_1,
        ]);
    }

    public function loader_installments(){

        $section_1 = Section::where('category_id', 'section-block')->where('type_id', 14)->where('order', 1)->first();
        $section_2 = SectionCard::where('type_id', 14)->where('order', 2)->get();
        return view('sale.loader-installments',[
            'section_1' => $section_1,
            'section_2' => $section_2,
        ]);
    }
}
