<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SilsilahKeluargaResource;
use App\Models\SilsilahKeluargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SilsilahKeluargaAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pgw = SilsilahKeluargaModel::all();

        return new SilsilahKeluargaResource(true, 'Data Silsilah Keluarga Budi', $pgw);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'Nama' => 'required',
            'Jenis_Kelamin' => 'required|in:Laki-Laki,Perempuan'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        
        $pgw = SilsilahKeluargaModel::create($request->all());

        return new SilsilahKeluargaResource(true, 'Data berhasil disimpan', $pgw);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pgw = SilsilahKeluargaModel::find($id);

        if($pgw){
            return new SilsilahKeluargaResource(true, 'Data ditemukan',$pgw);
        }else{
            return response()->json([
                'message'=> 'Data tidak ada'
            ], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){

        $pgw = SilsilahKeluargaModel::findOrFail($id);

        $validatedData = $request->validate([
            'Nama' => 'required',
            'Jenis_Kelamin' => 'required|in:Laki-Laki,Perempuan'
        ]);
    
        $pgw->update($validatedData);
    
        return response()->json([
            'data' => $pgw,
            'message' => 'Data berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         $pgw = SilsilahKeluargaModel::find($id);
 
         if ($pgw) {
             $pgw->delete();
     
             return new SilsilahKeluargaResource(true,'Data berhasil di hapus', '');
         } else {
             return response()->json([
                 'message' => 'Data not found'
             ]);
         }
     }
     
}