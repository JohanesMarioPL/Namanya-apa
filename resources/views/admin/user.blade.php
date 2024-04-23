@extends('layout.admin')
@section('title', 'Course Voting - Admin Users')

@section('content')
    <div class="m-4">
        <div class="flex flex-col">
            <a class="btn btn-primary mt-16 w-40" onclick="addModal.showModal()">Tambah Data</a>
            <div class="mt-2"></div>
            <label class="input input-bordered flex items-center gap-2 w-40">
                <input id="searchInput" type="text" class="w-full" placeholder="Search" oninput="searchUser(this.value)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
            </label>
        </div>
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
                    @if(Auth::user()->nrp != $u['nrp'])
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
                                <a class="badge badge-error text-white" onclick="modal_{{$u['nrp']}}.showModal()">Hapus</a>
                                <a class="badge badge-primary text-white" href="{{ route('admin.edit', ['nrp' => $u->nrp]) }}">Edit</a>
                            </td>

                            {{--    Hapus Data Modal--}}
                            <dialog id="modal_{{$u['nrp']}}" class="modal">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">Peringatan!</h3>
                                    <p class="py-4">Ingin menghapus {{$u['name']}}?</p>
                                    <div class="modal-action">
                                        <form method="POST" action="/admin/{{$u['nrp']}}/delete">
                                            @csrf
                                            @method('DELETE') <!-- Tambahkan ini jika menggunakan metode DELETE -->
                                            <button type="submit" class="btn btn-error">Hapus</button>
                                        </form> <!-- Menutup tag form yang seharusnya -->
                                        <button type="button" class="btn" onclick="closeModal('modal_{{$u['nrp']}}')">Close</button>
                                    </div>
                                </div>
                            </dialog>
                            {{--    End Hapus Data Modal--}}
                        </tr>
                    @endif
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
                        <option value="2">Program Studi</option>
                        <option value="3">User</option>
                    </select>
                    <select id="prodi" name="prodi" class="block w-full px-4 py-6 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a Program Studi</option>
                        <option value="1">S1 Teknik Informatika</option>
                        <option value="2">S1 Sistem Informasi</option>
                    </select>
                </div>
                <div class="modal-action">
                    @csrf
                    <button class="btn btn-outline btn-primary" type="submit" id="">Tambah Data</button>
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" type="button" onclick="addModal.close()">✕</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>
    <script>
        function searchUser(keyword) {
            keyword = keyword.toLowerCase();
            const rows = document.querySelectorAll("table.table tbody tr");

            rows.forEach(row => {
                const nrp = row.cells[0].textContent.toLowerCase();
                const name = row.cells[1].textContent.toLowerCase();
                const email = row.cells[2].textContent.toLowerCase();

                if (nrp.includes(keyword) || name.includes(keyword) || email.includes(keyword)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>

    <script>
        function closeModal(modalId) {
            // Mengambil dialog/modal berdasarkan ID
            var modal = document.getElementById(modalId);
            // Menutup dialog/modal dengan mengubah atribut "open" menjadi false
            modal.close();
        }
    </script>
{{--    End Tambah Data Modal--}}

@endsection

