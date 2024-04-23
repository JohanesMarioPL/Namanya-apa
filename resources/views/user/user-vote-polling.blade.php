@extends('layout.layout')
@section('title', 'Course Voting - User Mata Kuliah')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form id="voting-form" class="card-body" action="{{ route('user-voting-submit', ['polling_id' => $pollings['id']]) }}" method="POST">
                    @csrf
                    <div>
                        @foreach($getMatkul as $m)
                            <input type="checkbox" id="matkul{{ $m['id'] }}" class="matakuliah-checkbox" name="matakuliah[]" value="{{ $m['id'] }}">
                            <label for="matkul{{ $m['id'] }}">{{ $m['nama_mata_kuliah'] }}</label><br>
                        @endforeach
                    </div>
                    <br>
                    <button class="badge badge-primary text-white" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#voting-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission behavior

                let selectedValues = [];

                $('.matakuliah-checkbox:checked').each(function() {
                    selectedValues.push($(this).val());
                });

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), // Use the form's action attribute as the URL
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "selectedValues": selectedValues
                    },
                    success: function(response) {
                        console.log('Response from server:', response);
                        // Redirect to user-polling-detail route if needed
                        // window.location.href = '{{ route("user-polling-detail") }}';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
