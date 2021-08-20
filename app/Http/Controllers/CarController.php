<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use File;

class CarController extends Controller
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
        $cars = Car::all();
        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
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
            'sub_title' => 'required',
            'title' => 'required',
            'info' => 'required',
            'img_visible' => 'required|image|mimes:jpeg,png,jpg',
            'img_hiddin' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();
        $img_visible = $request->file('img_visible');
        $img_hiddin = $request->file('img_hiddin');

        if($img_visible && $img_hiddin){
            $newImgVisible = time().'__visible__' .$request->title.'__'.'.'.$request->img_visible->extension();
            $newImgHidden = time().'__hidden__' .$request->title.'__'.'.'.$request->img_hiddin->extension();

            $img_visible->move(public_path('./b_images/section/'),$newImgVisible);
            $img_hiddin->move(public_path('./b_images/section/'),$newImgHidden);

            $input['img_visible'] = $newImgVisible;
            $input['img_hiddin'] = $newImgHidden;
        }

        Car::create($input);

        return redirect('/admin/car');
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
        $car = Car::find($id);

        return view('car.edit', ['car' => $car]);
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
        $car = Car::find($id);

        $request->validate([
            'sub_title' => 'required',
            'title' => 'required',
            'info' => 'required',
            'img_visible' => 'image|mimes:jpeg,png,jpg',
            'img_hiddin' => 'image|mimes:jpeg,png,jpg',
        ]);


        $car->sub_title = $request->input('sub_title');
        $car->title = $request->input('title');
        $car->info = $request->input('info');

        if($request->hasFile('img_visible')){
            $carVisblOldImg = $car->img_visible;
            $img_visible = $request->file('img_visible');

            if (!empty($carVisblOldImg)){
                File::delete(public_path('b_images/section/'.$carVisblOldImg));
            }

            $newImgVisible = time().'__visible__' .$request->title.'__'.'.'.$request->img_visible->extension();
            $img_visible->move(public_path('./b_images/section/'),$newImgVisible);
            $car->img_visible = $newImgVisible;
        }
        if($request->hasFile('img_hiddin')){
            $carHiddinOldImg = $car->img_hiddin;
            $img_hiddin = $request->file('img_hiddin');

            if (!empty($carHiddinOldImg)){
                File::delete(public_path('b_images/section/'.$carHiddinOldImg));
            }

            $newImgHidden = time().'__hidden__' .$request->title.'__'.'.'.$request->img_hiddin->extension();
            $img_hiddin->move(public_path('./b_images/section/'),$newImgHidden);
            $car->img_hiddin = $newImgHidden;
        }

        $car->update();

        return redirect('/admin/car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        File::delete(public_path('b_images/section/'.$car->img_visible));
        File::delete(public_path('b_images/section/'.$car->img_hiddin));

        $car->delete();
        return redirect('/admin/car');

    }
}
