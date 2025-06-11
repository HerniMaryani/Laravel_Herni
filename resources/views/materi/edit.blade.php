
@extends('main')

@section('title', 'Materi')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            {{-- form tambah Materi --}}
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Ubah Materi</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('materi.update', $sesi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="pertemuan" class="form-label">Pertemuan</label>
                        <input type="text" class="form-control" name="pertemuan" value="{{ old('pertemuan') ? old('pertemuan') : $materi->pertemuan }}">
                      </div>
                      <div class="mb-3">
                        <label for="pokok_bahasan" class="form-label">Pokok Bahasan</label>
                        <input type="text" class="form-control" name="pokok_bahasan" value="{{ old('pokok_bahasan') ? old('pokok_bahasan') : $materi->pokok_bahasan }}">
                      </div>
                      <div class="mb-3">
                        <label for="file_materi" class="form-label">File Materi</label>
                        <input type="text" class="form-control" name="file_materi" value="{{ old('file_materi') ? old('file_materi') : $materi->file_materi }}">
                      </div>
                      <div class="mb-3">
                        <label for="mataKuliah_id" class="form-label">Mata Kuliah</label>
                        <select name="mataKuliah_id" class="form-control">
                          @foreach ($mataKuliah as $item)
                            <option value="{{ $item->id }}" {{ old('mataKuliah_id') == $item->id ? 'selected' : ($materi->mataKuliah_id == $item->id ? 'selected' : null) }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="dosen_id" class="form-label">Dosen </label>
                        <select name="dosen_id" class="form-control">
                          @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" {{ old('dosen_id') == $item->id ? 'selected' : ($materi->dosen_id== $item->id ? 'selected' : null) }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
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
