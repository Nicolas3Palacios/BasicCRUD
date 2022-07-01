<?php

namespace App\Http\Controllers;

use App\Models\shark;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class sharkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the sharks
        $sharks = shark::all();

        //load the view and pass the sharks
        return view('sharks.index',['sharks'=> $sharks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form
        return view('sharks.create');
    }
    public function vue()
    {
         // get all the sharks
        $sharks = shark::get();
        // load the create form
        return view('vue.index',compact('sharks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'age' => 'required|numeric|max:105'
        // ]); -->blade
        $shark =new shark($request->all());
        $shark->save();
        return response()->json([
            'saved'=>true,
            'person'=>$shark
        ]);
        // return redirect('/person')->with('message','Information saved'); -->blade
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'age' => 'required|numeric|max:105'
        // ]);
        // $shark = shark::find($id);
        // $shark->update($request->all());
        // return view('sharks.index',['sharks' => shark::all(), 'message' => 'Information update']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($person)
    {
        $shark = shark::find($person);
        return view('vue.edit',['shark'=> $shark] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $person)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'age' => 'required|numeric|max:105'
        // ]);
        $shark = shark::find($person);

        // $shark=shark::find($id);
        $shark->update($request->all());
        return response()->json([
            'updated' => true
        ]);
        // return redirect('/person')->with('message','Information updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($person)
    {
        $shark = shark::find($person);
        $shark->delete();
        return response()->json([
            'deleted' => true
        ]);
        // return redirect('/person')->with('message','Information deleted');

    }
}
