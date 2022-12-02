@extends('layouts.backend.master')

@section('title', 'Edit Jadwal Rapat — Catatan Organisasi')
@section('content')

@push('timepicker-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/timepicker.css')}}">
@endpush

<div class="container-fluid">

    <div class="page-title">
        <div class="card card-absolute mt-5 mt-md-4">
            <div class="card-header bg-primary">
                <h5 class="text-white">
                    📅📚 • Edit Jadwal Rapat
                </h5>
            </div>
            <div class="card-body">
                <p>
                    Dibawah ini adalah form untuk edit jadwal rapat.
                    <span class="d-none d-md-inline">
                        Data dibawah pastikan kamu isi dengan benar dan lengkap ya, nanti datanya akan kami simpan
                        dan dapat kamu akses dimana saja dan kapan saja.
                    </span>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Jadwal Rapat</h5>
                </div>
                <form method="POST" action="{{route('jadwal-rapat.update', $item->id)}}" enctype="multipart/form-data"
                    class="needs-validation">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>
                                    <h4>Ada error nih 😓</h4>
                                </li>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-2">
                                <label for="judul_rapat">Judul Rapat <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-book" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                                <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                                <line x1="3" y1="6" x2="3" y2="19"></line>
                                                <line x1="12" y1="6" x2="12" y2="19"></line>
                                                <line x1="21" y1="6" x2="21" y2="19"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <input id="judul_rapat" type="text" class="form-control"
                                        value="{{$item->judul_rapat}}" name="judul_rapat" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="agenda_rapat">Agenda Rapat <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-book" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                                <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                                <line x1="3" y1="6" x2="3" y2="19"></line>
                                                <line x1="12" y1="6" x2="12" y2="19"></line>
                                                <line x1="21" y1="6" x2="21" y2="19"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <input id="agenda_rapat" type="text" class="form-control"
                                        value="{{$item->agenda_rapat}}" name="agenda_rapat" required>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value={{Auth::user()->email}}>
                        </div>
                        <div class="form-row">
                            <!-- <div class="form-group col-md-6 mb-2">
                                <label for="hari">Hari <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="hari">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-calendar" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                                <line x1="16" y1="3" x2="16" y2="7"></line>
                                                <line x1="8" y1="3" x2="8" y2="7"></line>
                                                <line x1="4" y1="11" x2="20" y2="11"></line>
                                                <line x1="11" y1="15" x2="12" y2="15"></line>
                                                <line x1="12" y1="15" x2="12" y2="18"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <select class="custom-select" id="hari" name="hari">
                                        <option value="" disabled selected>Pilih ...</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group col-md-6 mb-2">
                                <label for="hari">Tanggal <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="hari">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-calendar" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                                <line x1="16" y1="3" x2="16" y2="7"></line>
                                                <line x1="8" y1="3" x2="8" y2="7"></line>
                                                <line x1="4" y1="11" x2="20" y2="11"></line>
                                                <line x1="11" y1="15" x2="12" y2="15"></line>
                                                <line x1="12" y1="15" x2="12" y2="18"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="date" name="tanggal" class="form-control" value="{{$item->tanggal}}">
                                </div>
                            </div>

                            <div class="form-group col-md-6 mb-2">
                                <label for="angkatan">Tempat <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-building-community" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8">
                                                </path>
                                                <line x1="13" y1="7" x2="13" y2="7.01"></line>
                                                <line x1="17" y1="7" x2="17" y2="7.01"></line>
                                                <line x1="17" y1="11" x2="17" y2="11.01"></line>
                                                <line x1="17" y1="15" x2="17" y2="15.01"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <input required id="kelas" type="text" value="{{$item->tempat}}" class="form-control"
                                        name="tempat">
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-success py-2" role="alert">
                            Klik pada textbox atau input waktu mulai & waktu selesai nantinya akan muncul jam untuk
                            memilih waktu
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-2">
                                <label for="waktu_mulai">Waktu Mulai <span class="text-danger">*</span></label>
                                <div class="input-group clockpicker mb-3 pull-center" data-placement="top"
                                    data-align="top" data-autoclose="true">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-clock" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <polyline points="12 7 12 12 15 15"></polyline>
                                            </svg>
                                        </span>
                                    </div>
                                    <input id="waktu_mulai" type="text" class="form-control"
                                        value="{{$item->waktu_mulai}}" name="waktu_mulai" readonly required>
                                </div>
                            </div>

                            <div class="form-group col-md-6 mb-2">
                                <label for="waktu_selesai">Waktu Selesai <span class="text-danger">*</span></label>
                                <div class="input-group clockpicker mb-3 pull-center" data-placement="top"
                                    data-align="top" data-autoclose="true">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-circle-check" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <path d="M9 12l2 2l4 -4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <input id="waktu_selesai" type="text" class="form-control"
                                        value="{{$item->waktu_selesai}}" name="waktu_selesai" readonly required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning m-r-15" type="submit">Edit</button>
                        <button class="btn btn-light" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('timepicker-scripts')
<script src="{{url('cuba/assets/js/time-picker/jquery-clockpicker.min.js')}}"></script>
<script src="{{url('cuba/assets/js/time-picker/highlight.min.js')}}"></script>
<script src="{{url('cuba/assets/js/time-picker/clockpicker.js')}}"></script>
@endpush

@endsection