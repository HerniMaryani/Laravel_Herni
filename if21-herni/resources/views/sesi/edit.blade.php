
@extends('main')

@section('title', 'Sesi')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            {{-- form tambah sesi --}}
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Ubah sesi</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('sesi.update', $sesi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama sesi</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $sesi->nama }}">
                      </div>
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Row-->
@endsection
