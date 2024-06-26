@extends('layout.layout')
@section('title', 'Course Voting - User Profile')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Your Profile!</h1>
                <p class="py-6">Di sini Anda dapat melihat informasi profil Anda!</p>
                <p class="py-0">Silakan hubungi admin untuk memperbarui profil Anda.</p>
            </div>
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NIK/NRP</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="<?= Auth::user()->nrp ?>">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="<?= Auth::user()->name ?>">
                        <label class="label">
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" class="input input-bordered" disabled value="<?= Auth::user()->email ?>">
                        <label class="label">
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Role</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="<?= Auth::user()->role->name ?>">
                        <label class="label">
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
