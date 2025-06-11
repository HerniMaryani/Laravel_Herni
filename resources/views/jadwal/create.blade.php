@extends('main')
@section('title', 'Jadwal')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            {{-- form tambah jadwal --}}
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Tambah Jadwal</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                        <input type="text" class="form-control" name="tahun_akademik" value="{{ old('tahun_akademik') ? old('tahun_akademik') : $jadwal->tahun_akademik }}">
                      </div>
                      <div class="mb-3">
                        <label for="kode_smt" class="form-label">Kode Semester</label>
                        <input type="text" class="form-control" name="kode_smt" value="{{ old('kode_smt') ? old('kode_smt') : $jadwal->kode_smt }}">
                      </div>
                     <div class="mb-3">
                        <label for="mataKuliah_id" class="form-label">Mata Kuliah</label>
                        <select name="mataKuliah_id" class="form-control">
                          @foreach ($mataKuliah as $item)
                            <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                      </div>
                     <div class="mb-3">
                        <label for="dosen_id" class="form-label">Dosen</label>
                        <select name="dosen_id" class="form-control">
                          @foreach ($dosen as $item)
                            <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                      </div>
                     <div class="mb-3">
                        <label for="sesi_id" class="form-label">Sesi</label>
                        <select name="sesi_id" class="form-control">
                          @foreach ($sesi as $item)
                            <option value="{{ $item->id }}"> {{ $item->nama }} </option>
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