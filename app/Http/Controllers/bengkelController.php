<?php

namespace App\Http\Controllers;

use App\Models\bengkel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Http\Request;

class bengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if(strlen($katakunci)){
            $data = bengkel::where('id','like',"%$katakunci%")
                ->orWhere('nama_barang','like',"%$katakunci%")
                ->orWhere('stok_barang','like',"%$katakunci%")
                ->orWhere('harga_barang','like',"%$katakunci%")
                ->paginate($jumlahbaris);
        } else{
            $data = bengkel::orderby('id','desc')->paginate($jumlahbaris);
        }
        
        return view('bengkel.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bengkel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id',$request->id);
        Session::flash('kode_barang',$request->kode_barang);
        Session::flash('nama_barang',$request->nama_barang);
        Session::flash('deskripsi',$request->deskripsi);
        Session::flash('stok_barang',$request->stok_barang);
        Session::flash('harga_barang',$request->harga_barang);
        

        $request->validate([
            'id'=>'required|numeric|unique:bengkel,id',
            'kode_barang'=>'required|numeric|unique:bengkel,kode_barang',
            'nama_barang'=>'required',
            'deskripsi'=>'required',
            'stok_barang'=>'required',
            'harga_barang'=>'required',
        ],[
            'id.required'=> 'ID wajib diisi',
            'id.numeric'=> 'ID wajib angka',
            'id.unique'=> 'ID yang diisi sudah ada di database',
            'kode_barang.required'=> 'Kode Barang wajib diisi',
            'kode_barang.numeric'=> 'Kode Barang wajib angka',
            'kode_barang.unique'=> 'Kode Barang yang diisi sudah ada di database',
            'nama_barang.required'=> 'Nama Barang wajib diisi',
            'deskripsi.required'=> 'Deskripsi Barang wajib diisi',
            'stok_barang.required'=> 'Stok Baraag wajib diisi',
            'harga_barang.required'=> 'Harga Barang wajib diisi',

        ]);
        $data = [
            'id'=>$request->id,
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'deskripsi'=>$request->deskripsi,
            'stok_barang'=>$request->stok_barang,
            'harga_barang'=>$request->harga_barang,

        ];
        bengkel::create($data);

        return redirect()->to('bengkel')->with('success','Data sudah diinput');
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
        $data = bengkel::where('id', $id)->first();
        return view('bengkel.edit')->with('data', $data);
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
        $request->validate([
            
            
            'nama_barang'=>'required',
            'deskripsi'=>'required',
            'stok_barang'=>'required',
            'harga_barang'=>'required',
        ],[
            
            'kode_barang.required'=> 'Kode Barang wajib diisi',
            'kode_barang.numeric'=> 'Kode Barang wajib angka',
            'kode_barang.unique'=> 'Kode Barang yang diisi sudah ada di database',
            'nama_barang.required'=> 'Nama Barang wajib diisi',
            'deskripsi.required'=> 'Deskripsi Barang wajib diisi',
            'stok_barang.required'=> 'Stok Baraag wajib diisi',
            'harga_barang.required'=> 'Harga Barang wajib diisi',

        ]);
        $data = [
           
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'deskripsi'=>$request->deskripsi,
            'stok_barang'=>$request->stok_barang,
            'harga_barang'=>$request->harga_barang,

        ];
        bengkel::where('id',$id)->update($data);

        return redirect()->to('bengkel')->with('success','Data sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        bengkel::where('id',$id)->delete();
        return redirect()->to('bengkel')->with('success','Berhasil delete data');
    }
}
