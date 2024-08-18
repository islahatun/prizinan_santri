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
                                <h4 class="fw-bold">JUMLAH SANTRI</h4>
                                <h4 class=" mx-5 fw-bold">{{ $santricount }}</h4>
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

                        <button type="button" class="btn btn-warning fw-semibold mx-4">Reset Data <- </button>
                    </div>
                </div>
                <div class="mt-3" style="max-width: 100%">
                    {{-- height: 100px; overflow-y:scroll --}}
                    <h3 class="text-center">DATA SANTRI</h3>
                    <table id="tabel1" class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">ID</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">TANGGAL LAHIR</th>
                                <th scope="col">TEMPAT LAHIR</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">NAMA WALI</th>
                                <th scope="col">NO HP</th>
                                <th scope="col">TANGGAL MASUK</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ID WALI</th>
                                <th scope="col">AKSI</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santri as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th>{{ $item->id }}</th>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tgl_lahir }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->user ? $item->user->name : '' }}</td>
                                    <td>{{ $item->no_telepon }}</td>
                                    <td>{{ $item->tgl_masuk }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->orang_tua }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning edit">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal tambah data -->
                    <div class="modal fade modalUser" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data santri</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('dataSantri-add') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">NISN</label>
                                            <input type="text" name="nisn" class="form-control"
                                                placeholder="Masukkan nisn">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Masukkan nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select class="form-select" name="jenis_kelamin"
                                                aria-label="Default select example">
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control"
                                                placeholder="Masukkan tempat lahir">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="alamat" class="form-control"
                                                placeholder="Masukkan alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kelas</label>
                                            <input type="text" name="kelas" class="form-control"
                                                placeholder="Masukkan kelas">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Masuk</label>
                                            <input type="date" name="tgl_masuk" class="form-control"
                                                placeholder="Masukkan Tanggal Masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Orang tua</label>
                                            {{-- <input type="text" name="orang_tua" class="form-control"
                                                placeholder="Masukkan nama orang tua"> --}}
                                            <select name="orang_tua" class="form-control orang_tua">
                                                <option value=""></option>
                                                @foreach ($user as $u)
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Telepon</label>
                                            <input type="number" name="no_telepon" class="form-control"
                                                placeholder="Masukkan nomor telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-select" name="status"
                                                aria-label="Default select example">
                                                <option selected>Pilih Status</option>
                                                <option value="bpulang">sedang dipesantren</option>
                                                <option value="tbpulang">sedang pulang</option>
                                            </select>
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
                    <div class="modal fade modalUser" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data santri</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/datasantri-edit" method="POST" id="editForm">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label for="">NISN</label>
                                            <input type="text" name="nisn" id="nisn" class="form-control"
                                                placeholder="Masukkan nisn">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="Masukkan nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin"
                                                aria-label="Default select example">
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal lahir</label>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control" placeholder="Masukkan tempat lahir">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" class="form-control"
                                                placeholder="Masukkan alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kelas</label>
                                            <input type="text" name="kelas" id="kelas" class="form-control"
                                                placeholder="Masukkan kelas">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Masuk</label>
                                            <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control"
                                                placeholder="Masukkan Tanggal Masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Orang tua</label>
                                            {{-- <input type="text" name="orang_tua" id="orang_tua" class="form-control"
                                                placeholder="Masukkan nama orang tua"> --}}
                                            <select name="orang_tua" id="orang_tua" class="form-control orang_tua">
                                                <option value=""></option>
                                                @foreach ($user as $u)
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Telepon</label>
                                            <input type="number" name="no_telepon" id="no_telepon" class="form-control"
                                                placeholder="Masukkan nomor telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-select" name="status" id="status"
                                                aria-label="Default select example">
                                                <option selected>Pilih Status</option>
                                                <option value="bpulang">sedang dipesantren</option>
                                                <option value="tbpulang">sedang pulang</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Update data</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabel1').DataTable({
                columnDefs: [{
                    target: 1,
                    visible: false,
                    searchable: false,
                }, {
                    target: 4,
                    visible: false,
                    searchable: false,
                }, {
                    target: 5,
                    visible: false,
                    searchable: false,
                }, {
                    target: 6,
                    visible: false,
                    searchable: false,
                }, {
                    target: 7,
                    visible: false,
                    searchable: false,
                }, {
                    target: 12,
                    visible: false,
                    searchable: false,
                }, {
                    target: 13,
                    visible: false,
                    searchable: false,
                }, ],
            });

            // start edit record

            table.on('click', '.edit', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                

                var data = table.row($tr).data();
                console.log(data);
                $('#id').val(data[1]);
                $('#nisn').val(data[2]);
                $('#nama').val(data[3]);
                $('#jenis_kelamin').val(data[4]);
                $('#tgl_lahir').val(data[5]);
                $('#tempat_lahir').val(data[6]);
                $('#alamat').val(data[7]);
                $('#kelas').val(data[8]);
                $('#orang_tua').val(data[13]);
                $('#no_telepon').val(data[10]);
                $('#status').val(data[12]);
                $('#tgl_masuk').val(data[11]);
                $('#editForm').attr('action', '/datasantri-edit');
                $('#editModal').modal('show');
            });
        });
    </script>
@endsection
