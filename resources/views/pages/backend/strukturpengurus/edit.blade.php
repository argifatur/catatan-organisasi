@extends('layouts.backend.master')

@section('title', 'Edit Struktur Pengurus — Catatan Organisasi')
@section('content')

<div class="container-fluid">

    <div class="page-title">
        <div class="card card-absolute mt-5 mt-md-4">
            <div class="card-header bg-primary">
                <h5 class="text-white">
                    📅📚 • Edit Struktur Pengurus
                </h5>
            </div>
            <div class="card-body">
                <p>
                    Dibawah ini adalah form untuk edit Struktur Pengurus.
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
                    <h5>Edit Struktur Pengurus</h5>
                </div>
                <form method="POST" action="{{route('struktur-pengurus.update', $item->id)}}" enctype="multipart/form-data"
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
                                <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
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
                                    <input id="nama" type="text" class="form-control"
                                        value="{{$item->nama}}" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="jabatan">Jabatan <span class="text-danger">*</span></label>
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
                                    <input id="jabatan" type="text" class="form-control"
                                        value="{{$item->jabatan}}" name="jabatan" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="angkatan">Angkatan <span class="text-danger">*</span></label>
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
                                    <input id="angkatan" type="text" class="form-control"
                                        value="{{$item->angkatan}}" name="angkatan" required>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value={{Auth::user()->email}}>
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