<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function getMataKuliah(MataKuliah $matkul)
    {
        $getNamaKurikulum = Kurikulum::select(['id', 'nama_kurikulum'])->get();
        $matkul = MataKuliah::select(['id','nama_mata_kuliah','kurikulum_id', 'sks'])->get();
        return Response()->view('admin.mata-kuliah', ['matkul' => $matkul, 'getNamaKurikulum' => $getNamaKurikulum]);
    }

    public function getMataKuliahUser(MataKuliah $matkul)
    {
        $getNamaKurikulum = Kurikulum::select(['id', 'nama_kurikulum'])->get();
        $matkul = MataKuliah::select(['id','nama_mata_kuliah','kurikulum_id', 'sks'])->get();
        return Response()->view('user.mata-kuliah', ['matkul' => $matkul, 'getNamaKurikulum' => $getNamaKurikulum]);
    }

    public function addMatkul(Request $request)
    {
        $id_matkul = MataKuliah::where('id', $request->input('id'))->first();
        $nama_matkul = MataKuliah::where('nama_mata_kuliah', $request->input('nama_mata_kuliah'))->first();

        if (!empty($id_matkul)) {
            return back()->withInput()->withErrors(['error' => 'ID Mata Kuliah sudah ada!']);
        } else if (!empty($nama_matkul)) {
            return back()->withInput()->withErrors(['error' => 'Nama Mata Kuliah sudah ada!']);
        } else {
            MataKuliah::create([
                'id' => $request->input('id'),
                'nama_mata_kuliah' => $request->input('nama_mata_kuliah'),
                'kurikulum_id' => $request->input('kurikulum_id'),
                'sks' => $request->input('sks')
            ]);
        }

        return redirect('/admin/mata-kuliah');
    }
}
