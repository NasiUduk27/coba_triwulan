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
                            <li class="breadcrumb-item"><a href="#">Data indikator Kinerja</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">TAMBAH</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ $url_form }}">
                    @csrf
                    {!! isset($indikator_kinerja) ? method_field('PUT') : '' !!}

                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input class="form-control @error('nomor_rekening') is-invalid @enderror"
                            value="{{ isset($indikator_kinerja) ? $indikator_kinerja->nomor_rekening : old('nomor_rekening') }}"
                            name="nomor_rekening" type="text" />
                        @error('nomor_rekening')
                            <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Sub Kegiatan</label>
                        <input class="form-control @error('sub_kegiatan') is-invalid @enderror"
                            value="{{ isset($indikator_kinerja) ? $indikator_kinerja->sub_kegiatan : old('sub_kegiatan') }}"
                            name="sub_kegiatan" type="text" />
                        @error('sub_kegiatan')
                            <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Indikator</label>
                        <input class="form-control @error('indikator') is-invalid @enderror"
                            value="{{ isset($indikator_kinerja) ? $indikator_kinerja->indikator : old('indikator') }}"
                            name="indikator" type="text" />
                        @error('indikator')
                            <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Target</label>
                        <input class="form-control @error('target') is-invalid @enderror"
                            value="{{ isset($indikator_kinerja) ? $indikator_kinerja->target : old('target') }}"
                            name="target" type="text" />
                        @error('target')
                            <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Satuan</label>
                        <input class="form-control @error('satuan') is-invalid @enderror"
                            value="{{ isset($indikator_kinerja) ? $indikator_kinerja->satuan : old('satuan') }}"
                            name="satuan" type="text" />
                        @error('satuan')
                            <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Pagu</label>
                        <input class="form-control @error('pagu') is-invalid @enderror"
                            value="{{ isset($indikator_kinerja) ? $indikator_kinerja->pagu : old('pagu') }}"
                            name="pagu" type="text" />
                        @error('pagu')
                            <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
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
@endpush
