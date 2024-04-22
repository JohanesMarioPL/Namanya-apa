@extends('layout.prodi')
@section('title', 'Course Voting - Polling')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="card shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
            <form class="card-body" action="{{route('prodi.edit-polling', ['polling_id' => $pollings['id']])}}" method="post">
                @csrf
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Kode Polling
                        <input id="id" name="id" type="text" class="grow" value="{{$pollings['id']}}" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama Polling
                        <input id="poll_name" name="poll_name" type="text" class="grow" value="{{$pollings['poll_name']}}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        End Date
                        <input id="end_date" name="end_date" type="date" class="grow" value="{{$pollings['end_date']}}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Program Studi
                        <select id="prodi_id" name="prodi_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-0">
                            <option>-- Pilih Program Studi --</option>
                            @foreach($getProdi as $g)
                                <option value="{{$g['id']}}">{{$g['nama_prodi']}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
