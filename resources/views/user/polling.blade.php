@extends('layout.layout')
@section('title', 'Course Voting - Prodi Mata Kuliah')

@section('content')
    <div class="m-4 py-6">
        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
            <tr>
                <th scope="col">Nama Polling</th>
                <th scope="col">End Date</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pollings as $p)
                <tr>
                    <td>{{$p['poll_name']}}</td>
                    <td>{{ \Carbon\Carbon::parse($p['end_Date'])->format('d-m-Y') }}</td>
                    @foreach($getProdi as $g)
                        @if($p['prodi_id'] == $g['id'])
                            <td>{{$g['nama_prodi']}}</td>
                        @endif
                    @endforeach
                    <td>
                        <a class="badge badge-error text-white" href={{route('user-voting-detail')}}>Vote</a>
                        <a class="badge badge-primary text-white" href="{{ route('user-polling-detail') }}">View</a>
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>

@endsection
