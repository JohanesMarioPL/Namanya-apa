<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class PollingDetailController extends Controller
{

    public function getPolDetail()
    {
        $getUser = user::select(['id','nrp'])->get();
        $getMatkul = MataKuliah::select(['id', 'nama_mata_kuliah'])->get();
        $pollings = Polling::select(['id','poll_name','end_date', 'prodi_id'])->get();
        $getProdi = Prodi::select(['id','nama_prodi'])->get();

        return Response()->view('prodi.create-polling-view',
            ['pollings' => $pollings,
                'getMatkul' => $getMatkul,
                'getUser' => $getUser,
                'getProdi' => $getProdi]);

    }

    public function getPolDetailUser()
    {
        $getUser = user::select(['id','nrp'])->get();
        $getMatkul = MataKuliah::select(['id', 'nama_mata_kuliah'])->get();
        $pollings = Polling::select(['id','poll_name','end_date', 'prodi_id'])->get();
        $getProdi = Prodi::select(['id','nama_prodi'])->get();

        return Response()->view('user.polling-view',
            ['pollings' => $pollings,
                'getMatkul' => $getMatkul,
                'getUser' => $getUser,
                'getProdi' => $getProdi]);

    }

    public function getVoteUser()
    {
        return Response()->view('user.user-vote-polling');
    }

    public function deletePollingDetail(Request $request, PollingDetail $pollingDetail, $id)
    {
        $pollingDetail = PollingDetail::where('id', '=', $id);
        $pollingDetail->delete();

        return redirect()->route('prodi-polling-detail', ['pollingId' => $pollingDetail->polling_id]);
    }
}
