<?php

namespace App\Http\Controllers;

use App\Models\Seragam; 
use Illuminate\Http\Request;

class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Seragam::get();

        return view('seragam.index' , compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request  ,[
            'nama'=>'required',
            'harga'=>'required',
            'ukuran'=>'required'



        ]);

        $datas = new Seragam();
        $datas->nama = $request->nama;
        $datas->harga = $request->harga;
        $datas->ukuran = $request->ukuran;


        $datas->save();

        return redirect()->back();
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
        //
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
        $datas = Seragam::where('id' , $id)->firstOrFail();

        $this->validate($request  ,[
            'ukuran'=>'required',
            'nama'=>'required',
            'harga'=>'required'


        ]);

        $datas->ukuran = $request->ukuran;
        $datas->nama = $request->nama;
        $datas->harga = $request->harga;

        $datas->update();

        return redirect()->back();
    }




    public function search (Request $request) {
        $datas = Seragam::where('ukuran' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('nama' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('harga' , 'Like' , '%' . $request->search . '%')
                        ->get();

                        return view('seragam.index' , compact('datas'));
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = Seragam::find($id);
        $datas->delete();

        return redirect()->back();
    }
}
