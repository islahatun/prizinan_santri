@extends('layouts.navin')

@push('custom-style')
    <style>
        #datasantri .card {
            width: 70%;
            height: 85px;
            background-color: antiquewhite;
        }

        #datasantri .table {
            background-color: antiquewhite;
        }
    </style>
@endpush
@section('content')
    {{-- cdnlink --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <section>
        <div class="card col-6">
            <div class="card-header">
                Profle
            </div>
            <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
                <form action="/profile-edit" method="POST" id="editForm">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="">Nama </label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control"
                            placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="">E-Mail</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Masukkan e-Mail ">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukkan Password">
                    </div>
            </div>
            <div class="card-footer">

                                        <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

    </script>
@endsection
