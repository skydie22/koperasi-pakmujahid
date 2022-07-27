<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas =  Siswa::get();

        return view('siswa.index' , compact('datas'));
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
        $this->validate($request , [
            'nis'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',

        ]);

        $datas = new Siswa();
        $datas->nis = $request->nis;
        $datas->nama = $request->nama;
        $datas->kelas = $request->kelas;
        $datas->jurusan = $request->jurusan;

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
        $datas = Siswa::where('id' , $id)->firstOrFail();

        $this->validate($request , [
            'nis'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',

        ]);

        $datas->nis = $request->nis;
        $datas->nama = $request->nama;
        $datas->kelas = $request->kelas;
        $datas->jurusan = $request->jurusan;

        $datas->update();

        return redirect()->back();
    }



    public function search (Request $request) {
        $datas = Siswa::where('nis' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('nama' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('kelas' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('jurusan' , 'Like' , '%' . $request->search . '%')
                        ->get();

                        return view('siswa.index' , compact('datas'));
    }   


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = Siswa::find($id);
        $datas->delete();

        return redirect()->back();
    }
}
