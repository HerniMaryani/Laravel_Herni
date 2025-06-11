@extends('main')
@section('title', 'Dosen')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            {{-- form tambah dosen --}}
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Tambah Dosen</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('dosen.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $dosen->nama }}">
                      </div>
                      <div class="mb-3">
                        <label for="nidk" class="form-label">NIDK</label>
                        <input type="text" class="form-control" name="nidk" value="{{ old('nidk') ? old('nidk') : $dosen->nidk }}">
                      </div>
                      <div class="mb-3">
                        <label for="fakultas_id" class="form-label">Fakultas/label>
                        <select name="fakultas_id" class="form-control">
                          @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}" {{ old('fakultas_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                        @error('fakultas_id')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                     <div class="mb-3">
                        <label for="prodi_id" class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-control">
                          @foreach ($prodi as $item)
                            <option value="{{ $item->id }}" {{ old('prodi_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                        @error('prodi_id')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
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