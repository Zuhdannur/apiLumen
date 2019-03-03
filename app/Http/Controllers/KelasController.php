<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class KelasController extends Controller {

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'jurusan' => 'required'
        ]);
        if ($validator->fails()) {
            $erros = $validator->errors();
            return [
                'status' => 'error',
                'message' => $erros,
                'result' => null
            ];
        }
        $result = \App\Kelas::create($request->all());
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
        $result = \App\Kelas::all();
        return [
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function put(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'jurusan' => 'required'
        ]);
        if ($validator->fails()) {
            $erros = $validator->errors();
            return [
                'status' => 'error',
                'message' => $erros,
                'result' => null
            ];
        }
        $kelas = \App\Kelas::find($id);
        if (empty($kelas)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }
        $result = $kelas->update($request->all());
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
        $kelas = \App\Kelas::find($id);
        if (empty($kelas)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }
        $result = $kelas->delete($id);
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
