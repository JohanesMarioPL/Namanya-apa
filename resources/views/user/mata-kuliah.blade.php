@extends('layout.layout')
@section('title', 'Course Voting - Admin Mata Kuliah')

@section('content')

    <div class="m-4">
        <table class="table table-zebra mt-20 max-w-screen">
            <thead>
            <tr>
                <th scope="col">ID Mata Kuliah</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">Kurikulum ID</th>
                <th scope="col">SKS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($getProdi as $p)
                @if(Auth::user()->prodi_id == $p['id'])
                    @foreach($matkul as $m)
                        <tr>
                            @if(Auth::user()->prodi_id == $m['prodi_id'])
                                <td>{{$m['id']}}</td>
                                <td>{{$m['nama_mata_kuliah']}}</td>
                                @foreach($getNamaKurikulum as $gnk)
                                    @if($gnk['id'] == $m['kurikulum_id'])
                                        <td>{{$gnk['nama_kurikulum']}}</td>
                                        <td>{{$m['sks']}}</td>
                                    @endif
                                @endforeach
                            @endif
                        </tr>
                    @endforeach
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
