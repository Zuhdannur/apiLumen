<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswasController extends Controller
{

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|max:10',
            'nama_lengkap' => 'required|max:10',
            'jenis_kelamin' => 'required|max:1',
            'alamat' => 'required|string'
        ]);
        if ($validator->fails()) {
            $erros = $validator->errors();
            return [
                'status' => 'error',
                'message' => $erros,
                'result' => null
            ];
        }
        $result = \App\Siswa::create($request->all());
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data Berhasil ditambahkan',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data Gagal ditambahkan',
                'result' => null
            ];
        }
    }

    public function all()
    {
        $result = \App\Siswa::all();
        return [
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function put(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|max:10',
            'nama_lengkap' => 'required|max:10',
            'jenis_kelamin' => 'required|max:1',
            'alamat' => 'required|string'
        ]);
        if ($validator->fails()) {
            $erros = $validator->errors();
            return [
                'status' => 'error',
                'message' => $erros,
                'result' => null
            ];
        }
        $siswa = \App\Siswa::find($id);
        if (empty($siswa)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }
        $result = $siswa->update($request->all());
        if($result){
            return [
                'status'=>'success',
                'message'=> 'Data Berhasil Diubah',
                'result'=>null
            ];
        } else{
            return [
                'status'=> 'error',
                'message' =>'Data Gagal diubah',
                'result'=> null
            ];
        }
    }

    public function remove($id)
    {
        $siswa = \App\Siswa::find($id);
        if (empty($siswa)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }
        $result = $siswa->delete($id);
        if($result){
            return [
                'status'=>'success',
                'message'=> 'Data Berhasil Dihapus',
                'result'=>null
            ];
        } else{
            return [
                'status'=> 'error',
                'message' =>'Data Gagal Dihapus',
                'result'=> null
            ];
        }
    }
}
