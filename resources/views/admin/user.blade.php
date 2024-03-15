@extends('layout.admin')
@section('title', 'Course Voting - Admin Users')

@section('content')
    <div class="m-4">
        <a class="btn btn-primary mt-16" onclick="addModal.showModal()">Tambah Data</a>

        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
                <tr>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u['nrp'] }}</td>
                        <td>{{ $u['name'] }}</td>
                        <td>{{ $u['email'] }}</td>
                        @foreach ($getRole as $gr)
                            @if ($gr['id'] == $u['role_id'])
                                <td>{{ $gr['name'] }}</td>
                            @endif
                        @endforeach
                        <td>
                            <button class="badge badge-error text-white">Hapus</button>
                            <button class="badge badge-primary" onclick="editModal.showModal()">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

{{--    Tambah Data Modal --}}
    <dialog id="addModal" class="modal">
        <div class="modal-box">
            <h2 class="font-bold text-lg mb-5">Tambah Data User</h2>
            <form method="post" action="{{route('add-user')}}">
                <div>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        NRP
                        <input id="nrp" name="nrp" type="text" class="grow" placeholder="e.g 2272028" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama
                        <input id="name" name="name" type="text" class="grow" placeholder="e. g John Doe" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Email
                        <input id="email" name="email" type="email" class="grow" placeholder="e.g abc@example" />
                    </label>
                    <select id="role_id" name="role_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a Role</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="modal-action">
                    @csrf
                    <button class="btn btn-outline btn-primary" type="submit">Tambah Data</button>
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" type="button" onclick="addModal.close()">✕</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>
{{--    End Tambah Data Modal--}}

{{--    Edit Data Modal--}}
    <dialog id="editModal" class="modal">
        <div class="modal-box">
            <h2 class="font-bold text-lg mb-5">Edit Data User</h2>
            <form method="post" action="{{route('add-user')}}">
                <div>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        NRP
                        <input id="nrp" name="nrp" type="text" class="grow" placeholder="e.g 2272028" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama
                        <input id="name" name="name" type="text" class="grow" placeholder="e. g John Doe" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Email
                        <input id="email" name="email" type="email" class="grow" placeholder="e.g abc@example" />
                    </label>
                    <select id="role_id" name="role_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a Role</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="modal-action">
                    @csrf
                    <button class="btn btn-outline btn-primary" type="submit">Tambah Data</button>
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" type="button" onclick="editModal.close()">✕</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>
{{--    End Edit Data Modal--}}


@endsection
