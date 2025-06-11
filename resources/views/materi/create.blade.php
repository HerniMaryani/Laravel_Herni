@extends('main')

@section('title', 'Materi')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            {{-- form tambah Materi --}}
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Tambah Materi</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('materi.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="pertemuan" class="form-label"> Pertemuan</label>
                        <input type="text" class="form-control" name="pertemuan">
                      </div>
                       <div class="mb-3">
                        <label for="pokok_bahasan" class="form-label">Pokok Bahasan</label>
                        <input type="text" class="form-control" name="pokok_bahasan">
                      </div>
                         <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="form-control" name="file">
                        @error('file')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                     <div class="mb-3">
                        <label for="mataKuliah_id" class="form-label">Mata Kuliah</label>
                        <select name="mataKuliah_id" class="form-control">
                          @foreach ($mataKuliah as $item)
                             <option value="{{ $item->id }}" {{ old('mata_kuliah_id') == $item->id ? 'selected' : null }}> {{ $item->nama }}>
                                 {{ $item->nama }}
                              </option>
                          @endforeach
                        </select>
                        @error('prodi_id')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                     <div class="mb-3">
                        <label for="dosen_id" class="form-label">Dosen</label>
                        <select name="dosen_id" class="form-control">
                          @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" {{ old('dosen_id') == $item->id ? 'selected' :: null }}> {{ $item->nama }}>
                              {{ $item->nama }}
                            </option>
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
