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
                            <input type="checkbox" id="matkul{{ $m['id'] }}" class="matakuliah-checkbox" name="selectedValues[]" value="{{ $m['id'] }}">
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
    <script>
        document.getElementById('voting-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            var selectedValues = [];
            var checkboxes = document.getElementsByName('selectedValues[]');

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    selectedValues.push(checkbox.value);
                }
            });

            if (selectedValues.length === 0) {
                // No checkbox is checked
                return; // Exit function
            }

            var formData = new FormData();
            selectedValues.forEach(function(value) {
                formData.append('selectedValues[]', value);
            });

            fetch('{{ route("user-voting-submit", ["polling_id" => $pollings["id"]]) }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            })
                .then(response => {
                    if (response.ok) {
                        window.location.href = 'user/polling-view';
                    } else {
                        // Handle error
                    }
                })
                .catch(error => {
                    // Handle error
                });
        });
    </script>
@endsection
