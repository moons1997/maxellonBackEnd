<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Section;
use Illuminate\Http\Request;
use File;

class SectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderBy('created_at', 'DESC')->get();
        $pages = Menu::all();

        return view('section.index', ['sections' => $sections, 'pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryes = ['section-bg', 'section-block'];
        $types = Menu::all();
        return view('section.create',['categoryes' => $categoryes, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = new Section();

        $request->validate([
            'category_id' => 'required',
            'type_id' => 'required|integer',
            'title' => 'required',
            'order' => 'required|integer',
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $section->title = $request->input('title');
        $section->category_id = $request->input('category_id');
        $section->type_id = $request->input('type_id');
        $section->info = $request->input('info');
        $section->order = $request->input('order');

        $img = $request->file('img');
        if($img){
            $newImgName = time().'__' .'section'.'__'.'.'.$request->img->extension();

            $img->move(public_path('./b_images/section/'),$newImgName);

            $section->img = $newImgName;
        }
        $section->save();
        return redirect('/admin/section');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
        $categoryes = ['section-bg', 'section-block'];
        $types = Menu::all();
        return view('section.edit', ['section' => $section, 'categoryes' => $categoryes, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = Section::find($id);

        $request->validate([
            'category_id' => 'required',
            'type_id' => 'required|integer',
            'title' => 'required',
            'info' => 'required',
            'order' => 'required|integer',
            'img' => 'image|mimes:jpeg,png,jpg',
        ]);

        $section->title = $request->input('title');
        $section->category_id = $request->input('category_id');
        $section->type_id = $request->input('type_id');
        $section->info = $request->input('info');
        $section->order = $request->input('order');

        if($request->hasFile('img')){

            $old_img = $section->img;
            $img = $request->file('img');

            $newImgName = time().'__' .'section'.'__'.'.'.$request->img->extension();



            if (!empty($old_img)){
                File::delete(public_path('b_images/section/'.$old_img));
            }

            $img->move(public_path('./b_images/section/'),$newImgName);

            $section->img = $newImgName;
        }
        $section->update();
        return redirect('/admin/section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        File::delete(public_path('b_images/section/'.$section->img));
        $section->delete();
        return redirect('/admin/section');
    }
}
