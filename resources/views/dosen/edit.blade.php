@extends('main')
@section('title', 'Dosen')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            {{-- form tambah Dosen --}}
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Ubah Dosen</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $dosen->nama }}">
                      </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">NIDK</label>
                        <input type="text" class="form-control" name="singkatan" value="{{ old('nidk') ? old('nidk') : $dosen->nidk }}">
                      </div>
                      <div class="mb-3">
                        <label for="fakultas_id" class="form-label">Fakultas</label>
                        <select name="fakultas_id" class="form-control">
                          @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}" {{ old('fakultas_id') == $item->id ? 'selected' : ($dosen->fakultas_id == $item->id ? 'selected' : null) }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="prodi_id" class="form-label">Prodi</label>
                        <select name="prodi_id" class="form-control">
                          @foreach ($prodi as $item)
                            <option value="{{ $item->id }}" {{ old('prodi_id') == $item->id ? 'selected' : ($dosen->prodi_id == $item->id ? 'selected' : null) }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
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