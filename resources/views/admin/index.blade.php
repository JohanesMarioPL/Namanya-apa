@extends('layout.admin')
@section('title', 'Course Voting - Admin Dashboard')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-4xl font-bold">Hello, {{Auth::user()->name}}</h1>
                <h1 class="text-lg font-bold py-2">Selamat datang di halaman Admin Course Voting</h1>
                <p class="py-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid debitis, dignissimos ipsam laborum mollitia perspiciatis quod! Ad autem cumque delectus dolor eveniet, ex facere maiores nam qui reprehenderit sed, voluptatum.</p>
                <a class="btn btn-primary btn-md" href="admin/create-polling">Let's Start</a>
            </div>
        </div>
    </div>
@endsection
