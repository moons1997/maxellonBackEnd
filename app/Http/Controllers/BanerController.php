<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class BanerController extends Controller
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
        $baners = Baner::all();
        return view('baner.index', ['baners' => $baners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required',  //exm  'title' => ['required'], ['integer']
            'url' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();
        if ($image = $request->file('img')) {
            $newImgName = time().'__' .'slider'.'__'.'.'.$request->img->extension();
            $image->move(public_path('b_images/slider'), $newImgName);
            $input['img'] = "$newImgName";
        }



        Baner::create($input);


        return redirect('/admin/baner');

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

        $baner = Baner::find($id);
        return view('baner.edit', ['baner' => $baner]);
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
        $baner = Baner::find($id);

        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg'
        ]);

        $baner->title = $request->input('title');
        $baner->url = $request->input('url');

        if($request->hasFile('img')){
            $old_img = $baner->img;
            $img = $request->file('img');
            $newImgName = time().'__' .'slider'.'__'.'.'.$request->img->extension();

            if (!empty($old_img)){
                File::delete(public_path('b_images/slider/'.$old_img));
            }

            $img->move(public_path('b_images/slider/'), $newImgName);
            $baner->img = $newImgName;


        }
        $baner->update();

        return redirect('/admin/baner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baner = Baner::findOrFail($id);
        File::delete(public_path('b_images/slider/'.$baner->img));
        $baner->delete();
        return redirect('/admin/baner');
    }
}
