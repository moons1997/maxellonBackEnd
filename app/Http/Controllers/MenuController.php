<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use File;

class MenuController extends Controller
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

        $menus = Menu::orderBy('created_at', 'DESC')->get();
        $menuName = Menu::all();
        return view('menu.index', [
            'menus' => $menus,
            'menuName' => $menuName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
//        dd($menus);
        return view('menu.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'parent_id' => 'required|integer',
            'img' => 'image|mimes:jpeg,png,jpg'
        ]);

        $menu->name = $request->input('name');
        $menu->url = $request->input('url');
        $menu->parent_id = $request->input('parent_id');
//        dd($request->input('parent_id'));
        if($request->input('parent_id') != 0){
            $menu->type = 1;
        }
        $img = $request->file('img');
        if($img){
            $newImgName = time().'__' .$request->input('name').'__'.'.'.$request->img->extension();

            $img->move(public_path('./b_images/menu/'),$newImgName);

            $menu->img = $newImgName;
        }
        $menu->save();

        return redirect('/admin/menu');
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
        $menu = Menu::find($id);
        $menus = Menu::all();
        return view('menu.edit', ['menu' => $menu, 'menus' => $menus]);
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
        $menu = Menu::find($id);
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'parent_id' => 'required|integer',
            'img' => 'image|mimes:jpeg,png,jpg'
        ]);

        $menu->name = $request->input('name');
        $menu->url = $request->input('url');
        $menu->parent_id = $request->input('parent_id');

        if($request->hasFile('img')){
            $old_img = $menu->img;
            $img = $request->file('img');

            $newImgName = time().'__' .$request->input('name').'__'.'.'.$request->img->extension();



            if (!empty($old_img)){
                File::delete(public_path('b_images/menu/'.$old_img));
            }

            $img->move(public_path('./b_images/menu/'),$newImgName);

            $menu->img = $newImgName;
        }
        $menu->update();

        return redirect('/admin/menu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        File::delete(public_path('b_images/menu/'.$menu->img));
        $menu->delete();
        return redirect('/admin/menu');
    }
}
