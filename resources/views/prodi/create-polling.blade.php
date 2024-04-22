@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Mata Kuliah')

@section('content')
    <div class="m-4">
        <a class="btn btn-primary mt-16" onclick="my_modal_5.showModal()">Tambah Data</a>

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
                            <a class="badge badge-error text-white" onclick="modal_{{$p['id']}}.showModal()">Hapus</a>
                            <a class="badge badge-primary text-white" href="{{ route('prodi.editPoll', ['polling_id' => $p['id']]) }}">Edit</a>
                        </td>

                        {{--    Hapus Data Modal--}}
                        <dialog id="modal_{{$p['id']}}" class="modal">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Peringatan!</h3>
                                <p class="py-4">Ingin menghapus {{$p['id']}} ?</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <a href="/prodi/{{$p['id']}}/delete" class="btn btn-error">Hapus</a>
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                        {{--    End Hapus Data Polling  --}}
                    </tr>


    @endforeach
                </tbody>
            </table>
    </div>


    {{--    Add Mata Kuliah--}}
    <dialog id="my_modal_5" class="modal">
        <div class="modal-box">
            <h2 class="font-bold text-lg mb-5">Tambah Data Polling!</h2>
                <form method="post" action="{{route('add-polling')}}">
                    <div>
                        <label class="input input-bordered flex items-center gap-2 mb-5">
                            ID Polling
                            <input id="id" name="id" type="text" class="grow" placeholder="GJL2223" />
                        </label>
                        {{-- Id Polling --}}
                        <label class="input input-bordered flex items-center gap-2 mb-5">
                            Nama Polling
                            <input id="poll_name" name="poll_name" type="text" class="grow" placeholder="Ganjil 2022/2023" />
                        </label>
                        {{-- Tanggal Polling --}}
                        <label class="input input-bordered flex items-center gap-2 mb-5">
                            End_date
                            <input id="end_date" name="end_date" type="date" class="grow" placeholder="2024-04-22" />
                        </label>
                        {{-- Mata Kuliah --}}
                        <select id="prodi_id" name="prodi_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5">
                            <option>-- Pilih Program Studi --</option>
                            @foreach($getProdi as $g)
                                <option value="{{$g['id']}}">{{$g['nama_prodi']}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" type="button" onclick="my_modal_5.close()">✕</button>
                        </form>
                        <div>
                            @csrf
                            <button class="btn btn-outline btn-primary" type="submit">Tambah Data</button>
                        </div>
                    </div>
                </form>
        </div>


    </dialog>


    {{--    End Add Mata Kuliah--}}

@endsection
