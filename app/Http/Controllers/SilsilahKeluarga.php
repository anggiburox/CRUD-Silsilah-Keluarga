<?php

namespace App\Http\Controllers;

use App\Models\SilsilahKeluargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SilsilahKeluarga extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pgw = DB::table('silsilah_keluarga_budi')->get();
    	// mengirim data  ke view index
        return view('/index',['pgw' => $pgw]);
    }

    public function family_tree()
    {   
    	// mengirim data  ke view index
        return view('/family-tree');
    }

    public function search(Request $request)
{
    $query = $request->input('search');

    $pgw = DB::table('silsilah_keluarga_budi')
        ->where('Nama', 'LIKE', '%'.$query.'%')
        ->orWhere('Jenis_Kelamin', 'LIKE', '%'.$query.'%')
        ->get();

    return view('/index', ['pgw' => $pgw]);
}



    public function store(Request $request){
	// insert data ke table 
	DB::table('silsilah_keluarga_budi')->insert([
		'Nama' => $request->nama,
        'Jenis_Kelamin' => $request->jk
	]);
	// alihkan halaman ke halaman 
	return redirect('index')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data  berdasarkan id yang dipilih
		$pgw = DB::table('silsilah_keluarga_budi')->where('Nama',$id)->get();
		// passing data  yang didapat ke view edit.blade.php
		return view('edit',['pgw' => $pgw]);
	}

	// update data 
	public function update(Request $request){
		// update data 
		DB::table('silsilah_keluarga_budi')->where('Nama',$request->nama_lama)->update([
            'Nama' => $request->nama,
            'Jenis_Kelamin' => $request->jk
		]);
		// alihkan halaman ke halaman 
		return redirect('index')->withSuccess('Data berhasil diperbaharui');
	}

	// method untuk hapus data 
	public function hapus($id){
		// menghapus data  berdasarkan id yang dipilih
		DB::table('silsilah_keluarga_budi')->where('Nama',$id)->delete();
		
		// alihkan halaman ke halaman 
		return redirect('index')->withDanger('Data berhasil dihapus');
	}
}