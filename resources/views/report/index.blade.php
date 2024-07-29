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
    <section id="datasantri">
        <div class="container">
            <div class="row">


                <div class="col-12 mt-5 d-inline-flex">
                    <div class="placebutton m-3">
                        <!-- Button trigger modal tambah -->
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif

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
                                <th scope="col">STATUS</th>
                                <th scope="col">Download</th>
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
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->no_telepon }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="/report-data/{{ $item->id  }}" target="blank" class="btn btn-warning edit">Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
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
                    target: 11,
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
                $('#orang_tua').val(data[9]);
                $('#no_telepon').val(data[10]);
                $('#status').val(data[11]);
                $('#editForm').attr('action', '/datasantri-edit');
                $('#editModal').modal('show');
            });
        });
    </script>
@endsection
