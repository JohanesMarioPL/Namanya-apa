@extends('layout.layout')
@section('title', 'Course Voting - User Mata Kuliah')

@section('content')
    <div class="m-4">

        <table class="table table-zebra mt-14 max-w-screen">
            <thead>
            <tr>
                <th scope="col">Polling Name</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Jumlah</th>
            </tr>
            </thead>
            <tbody>
            {{--            @foreach($pollings as $p)--}}
            {{--                <tr>--}}
            {{--                    <td>{{$p['poll_name']}}</td>--}}
            {{--                    @foreach($getMatkul as $GM)--}}
            {{--                        @if(@$GM['prodi_id'] == $p['prodi_id'])--}}
            {{--                            <td>{{$GM['nama_mata_kuliah']}}</td>--}}
            {{--                        @endif--}}
            {{--                    @endforeach--}}
            {{--                </tr>--}}


            {{--            @endforeach--}}




            </tbody>
        </table>
    </div>
@endsection
