@extends('layout.template')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Indikator Kinerja</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Data Indikator Kinerja</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">LIST</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="/indikator_kinerja" method="GET">
                                <input type="indikator_kinerja" id="indikator_kinerja" name="indikator_kinerja" class="form-control"
                                    placeholder="Cari...">
                            </form>
                        </div>
                    </div>


                    <a href="{{ url('indikator_kinerja/create') }}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Rekening </th>
                                <th>Nama Sub Kegiatan</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Satuan</th>
                                <th>Pagu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($indikator_kinerja->count() > 0)
                                @foreach ($indikator_kinerja as $i => $t)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $t->nomor_rekening }}</td>
                                        <td>{{ $t->sub_kegiatan }}</td>
                                        <td>{{ $t->indikator }}</td>
                                        <td>{{ $t->target }}</td>
                                        <td>{{ $t->satuan }}</td>
                                        <td>{{ $t->pagu }}</td>
                                        <td>
                                            <!-- Bikin tombol edit dan delete -->
                                            <a href="{{ url('/indikator_kinerja/' . $t->id . '/edit') }}"
                                                class="btn btn-sm btn-warning">edit</a>

                                            <form method="POST" action="{{ url('/indikator_kinerja/' . $t->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete()">hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ada</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ $indikator_kinerja->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Terima Kasih
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection

@push('custom_css')
    <style>
        th {}

        /* .card{
              background:green;
              color:aliceblue;
              transition: 0.5s;
          }

          .card:hover{
              background: aqua;
              color: blue;
              transform:scale(0.9);
          } */
    </style>
@endpush

@push('custom_js')
    {{-- <script>
  alert('Halaman Home')
</script> --}}

    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin? Data akan dihapus. Apakah Anda ingin melanjutkan?')) {
                document.getElementById('form').submit();
            }else {
                event.preventDefault();
            }
        }
    </script>
@endpush

