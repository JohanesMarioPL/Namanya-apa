@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Mata Kuliah')

@section('content')
    <div class="m-4">

        <table class="table table-zebra mt-14 max-w-screen">
            <thead>
            <tr>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Jumlah</th>
            </tr>
            </thead>
            <tbody>
                @foreach($getMatkul as $GM)
                    <tr>
                        @if($GM['prodi_id'] == $pollings['prodi_id'])
                            <td>{{$GM->nama_mata_kuliah}}</td>
                            <td>{{$jPolls[$GM->id]}}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
