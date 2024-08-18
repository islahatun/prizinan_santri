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
                                <th>id santri</th>
                                <th>id</th>
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
                                    <td>
                                        <form action="/perizinan-delete/{{ $item->id }}" method="get">
                                            <a href="/pelaporan-download/{{ $item->id }}" target="blank"
                                                class="btn btn-success">Download
                                                Formulir</a>
                                            <a href="#" class="btn btn-warning edit">Edit</a>
                                            <button class="btn btn-danger" type="submit"> Hapus</button>
                                        </form>
                                    </td>
                                    <td>{{ $item->santri->id }}</td>
                                    <td>{{ $item->id }}</td>
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
                                            <label for="">Tanggal Izin</label>
                                            <input type="date" name="tgl_pulang" value="{{ $tgl_pulang }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Balik</label>
                                            <input type="date" name="tgl_balik" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alasan izin</label>
                                            <select class="form-control" onchange="alasanIzin(this)" name="alasan_izin">
                                                <option value="null">--pilih Alasan Izin--</option>
                                                @foreach ($alasanIzin as $ai)
                                                    <option value="{{ $ai['alasan'] }}">{{ $ai['alasan'] }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" name="alasan_izin" class="form-control mt-3"
                                                id="alasanIzinCreate" placeholder="Masukkan alasan izin">
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


                    <!-- Modal edit data -->
                    <div class="modal fade form_modal" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data santri</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/perizinan-update" method="POST" id="editForm">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="" id="id"
                                                class="form-control">
                                            <label for="">Nama</label>
                                            <div>
                                                <select name="santri_id" id="santri_id" class="form-control inputbox">
                                                    <option value="null">--pilih Santri--</option>
                                                    @foreach ($santri as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Izin</label>
                                            <input type="date" name="tgl_pulang" id="tgl_pulang"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Balik</label>
                                            <input type="date" name="tgl_balik" id="tgl_balik" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alasan izin</label>
                                            <select class="form-control" id="alasanIzinUpdate"
                                                onchange="alasanIzinEdit(this)" name="alasan_izin">
                                                <option value="null">--pilih Alasan Izin--</option>
                                                @foreach ($alasanIzin as $ai)
                                                    <option value="{{ $ai['alasan'] }}">{{ $ai['alasan'] }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" name="alasan_izin" id="alasan_izin"
                                                class="form-control mt-3" placeholder="Masukkan alasan izin">
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
                    <!-- end modal edit -->
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
            $('#alasanIzinCreate').hide();
            $('#alasanIzin').hide();
            $('#santri').select2({
                dropdownParent: $('#exampleModal'),
                width: "100%"
            });
            $('#id_santri').select2({
                dropdownParent: $('#editModal'),
                width: "100%"
            });
        });

        function alasanIzin(obj) {
            var value = obj.value;
            if (value == "Lainnya") {
                $('#alasanIzinCreate').show();
            } else {
                $('#alasanIzinCreate').hide();

            }
        }

        function alasanIzinEdit(obj) {
            var value = obj.value;

            if (value == "Lainnya") {
                $('#alasan_izin').show();
            } else {
                $('#alasan_izin').hide();
                $('#alasan_izin').val(value);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabel1').DataTable({
                columnDefs: [{
                    target: 8,
                    visible: false,
                    searchable: false,
                }, {
                    target: 9,
                    visible: false,
                    searchable: false,
                }, ]
            });

            table.on('click', '.edit', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                $('#id').val(data[9]);
                $('#santri_id').val(data[8]);
                $('#tgl_pulang').val(data[3]);
                $('#tgl_balik').val(data[4]);
                var value = data[5];
                if (value == "Acara Pondok" || value == "Acara Keluarga" || value == "Sakit") {
                    $('#alasanIzinUpdate').val(value)
                    $('#alasan_izin').hide();
                } else {
                    $('#alasanIzinUpdate').val('Lainnya')
                    $('#alasan_izin').show();
                    $('#alasan_izin').val(data[5]);

                }


                $('#editForm').attr('action', '/perizinan-update');
                $('#editModal').modal('show');
            });
        });
    </script>
@endsection
