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
}
