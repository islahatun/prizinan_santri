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
    <section id="datasantri">
        <div class="container">
            <div class="row">
                {{-- START DASHBOARD --}}
                <div class="col-10 justify-content-center d-inline-flex align-content-center">
                    <div class="card">
                        <div class="d-inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor"
                                class="bi bi-person-badge mt-2" viewBox="0 0 16 16">
                                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path
                                    d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                            </svg>
                            <div class=" d-inline-flex mt-4 mx-5">
                                <h4 class="fw-bold">JUMLAH PERILAKU </h4>
                                <h4 class=" mx-5 fw-bold">{{ $perilakuCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END DASHBOARD --}}

                <div class="col-12 mt-5 d-inline-flex">
                    <div class="placebutton m-3">
                        <!-- Button trigger modal tambah -->
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <button type="button" class="btn btn-primary text-black fw-semibold" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Data +
                        </button>
                    </div>
                </div>
                <div class="mt-3" style="max-width: 100%">
                    {{-- height: 100px; overflow-y:scroll --}}
                    <h3 class="text-center">DATA PERILAKU</h3>
                    <table id="tabel1" class="table table-bordered border-dark">
                        <thead>
                            <tr style="align-content: center">
                                <th scope="col">NO</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA SANTRI</th>
                                <th scope="col">NILAI JUJUR</th>
                                <th scope="col">NILAI RAJIN</th>
                                <th scope="col">NILAI BERSIH</th>
                                <th scope="col">NILAI SOPAN SANTUN</th>
                                <th scope="col">NILAI ISTIKOMAH</th>
                                <th scope="col">ID</th>
                                <th scope="col">ID SANTRI</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perilaku as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->santri?$item->santri->nisn:""}}</td>
                                    <td>{{ $item->santri?$item->santri->nama:""}}</td>
                                    <td>{{ $item->nilai_jujur }}</td>
                                    <td>{{ $item->nilai_rajin}}</td>
                                    <td>{{ $item->nilai_bersih }}</td>
                                    <td>{{ $item->nilai_sopan_santun }}</td>
                                    <td>{{ $item->nilai_istikomah }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->id_santri }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning edit">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal tambah data -->
                    <div class="modal fade form_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data santri</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('perilakuAdd') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="">Nama Santri</label>
                                            {{-- <input type="number" name="skor_pelanggaran" id="skor_pelanggaran" class="form-control"
                                                placeholder="Masukkan Nilai skor pelanggaran"> --}}
                                                <select name="id_santri" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($santri as $s )
                                                    <option value="{{ $s->id }}">{{ $s->nisn }}-{{ $s->nama }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Jujur</label>
                                            <input type="number" name="nilai_jujur" class="form-control"
                                                placeholder="Masukkan Nilai Jujur">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Rajin</label>
                                            <input type="number" name="nilai_rajin" class="form-control"
                                                placeholder="Masukkan Nilai Rajin ">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Bersih</label>
                                            <input type="number" name="nilai_bersih" class="form-control"
                                                placeholder="Masukkan Nilai Bersih">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Sopan Santun</label>
                                            <input type="number" name="nilai_sopan_santun"  class="form-control"
                                                placeholder="Masukkan Nilai Sopan Santun ">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Istikomah</label>
                                            <input type="number" name="nilai_istikomah"class="form-control"
                                                placeholder="Masukkan Nilai Istikomah ">
                                        </div>


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
                                <form action="/perilaku-update" method="POST" id="editForm">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="id" id="id">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama Santri</label>
                                            {{-- <input type="number" name="skor_pelanggaran" id="skor_pelanggaran" class="form-control"
                                                placeholder="Masukkan Nilai skor pelanggaran"> --}}
                                                <select name="id_santri" id="id_santri" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($santri as $s )
                                                    <option value="{{ $s->id }}">{{ $s->nisn }}-{{ $s->nama }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Jujur</label>
                                            <input type="number" name="nilai_jujur" id="nilai_jujur" class="form-control"
                                                placeholder="Masukkan Nilai Jujur">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Rajin</label>
                                            <input type="number" name="nilai_rajin" id="nilai_rajin" class="form-control"
                                                placeholder="Masukkan Nilai Rajin ">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Bersih</label>
                                            <input type="number" name="nilai_bersih" id="nilai_bersih" class="form-control"
                                                placeholder="Masukkan Nilai Bersih">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Sopan Santun</label>
                                            <input type="number" name="nilai_sopan_santun" id="nilai_sopan_santun" class="form-control"
                                                placeholder="Masukkan Nilai Sopan Santun ">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Istikomah</label>
                                            <input type="number" name="nilai_istikomah" id="nilai_istikomah" class="form-control"
                                                placeholder="Masukkan Nilai Istikomah ">
                                        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabel1').DataTable({
                columnDefs: [
                {
                    target: 8,
                    visible: false,
                    searchable: false,
                },
                {
                    target: 9,
                    visible: false,
                    searchable: false,
                },
            ]

            });
            // $('#id_santri').select2({
            //     dropdownParent: $('#exampleModal'),
            //     width: "100%"
            // });
            // $('#id_pelanggaran').select2({
            //     dropdownParent: $('#exampleModal'),
            //     width: "100%"
            // });


            // start edit record

            table.on('click', '.edit', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                $('#id').val(data[8]);
                $('#id_santri').val(data[9]);
                $('#nilai_jujur').val(data[3]);
                $('#nilai_rajin').val(data[4]);
                $('#nilai_bersih').val(data[5]);
                $('#nilai_sopan_santun').val(data[6]);
                $('#nilai_istikomah').val(data[7]);


                $('#editForm').attr('action', '/perilaku-update');
                $('#editModal').modal('show');
            });
        });
    </script>
@endsection
