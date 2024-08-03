@extends('layouts.navin')

@push('custom-style')
    <style>
        #perizinan .card {
            width: 70%;
            height: 85px;
            background-color: antiquewhite;
        }

        #perizinan .table {
            background-color: antiquewhite;
        }
    </style>
@endpush
@section('content')
    {{-- cdnlink --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <section id="perizinan">
        <div class="container">
            <div class="row">
                {{-- START DASHBOARD --}}
                <div class="col-10 justify-content-center d-inline-flex align-content-center">
                    <div class="card">
                        <div class="d-inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor"
                                class="bi bi-journal-album mt-2" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 4a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5zm1 7a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg>
                            <div class="d-inline-flex mt-4 mx-5">
                                <h4 class="fw-bold">JUMLAH PERIZINAN</h4>
                                <h4 class="mx-5 fw-bold">{{ $perizinancount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END DASHBOARD --}}

                <div class="col-12 mt-5 d-inline-flex">
                    <div class="placebutton m-3">
                        <!-- Button trigger modal tambah -->
                        @if (Session('message'))
                            <div class="alert {{ session('alert-class') }}">
                                {{ Session('message') }}
                            </div>
                        @endif
                        <button type="button" class="btn btn-primary text-black fw-semibold" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Perizinan +
                        </button>
                    </div>
                </div>
                <div class=" mt-3" style="max-width: 100%">
                    <h3 class="text-center">DATA PERIZINAN</h3>
                    <table id="tabel1" class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">TANGGAL IZIN</th>
                                <th scope="col">TANGGAL BALIK</th>
                                <th scope="col">ALASAN IZIN</th>
                                <th scope="col">TERTANDA</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perizinan as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->santri->nisn }}</td>
                                    <td>{{ $item->santri->nama }}</td>
                                    <td>{{ $item->tgl_pulang }}</td>
                                    <td>{{ $item->tgl_balik }}</td>
                                    <td>{{ $item->alasan_izin }}</td>
                                    <td>{{ $item->user ? $item->user->name : '' }}</td>
                                    <td><a href="/pelaporan-download/{{ $item->id }}" target="blank"
                                            class="btn btn-warning edit">Download
                                            Formulir</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal tambah data -->

                    {{ $tgl_pulang = Carbon\Carbon::now()->toDateString() }}

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Perizinan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="{{ route('perizinan-add') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <div>
                                                <select name="santri_id" id="santri" class="form-control inputbox">
                                                    <option value="null">--pilih Santri--</option>
                                                    @foreach ($santri as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Pulang</label>
                                            <input readonly type="date" name="tgl_pulang" value="{{ $tgl_pulang }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Balik</label>
                                            <input type="date" name="tgl_balik" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alasan izin</label>
                                            <input type="text" name="alasan_izin" class="form-control"
                                                placeholder="Masukkan alasan izin">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="">Tertanda</label>
                                            <select name="user_id" id="" class="form-control inputbox">
                                                <option value="">--pilih Pemberi--</option>
                                                @foreach ($user as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal tambah -->
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.inputbox').select2({
                dropdownParent: $('#exampleModal'),
                width: "100%"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabel1').DataTable({});
        });
    </script>
@endsection
