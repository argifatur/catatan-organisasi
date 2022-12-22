@extends('layouts.backend.master')

@section('title', 'Catatan Kegiatan — Learnity')
@section('content')

@push('datatable-styles')
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/scrollbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('cuba/assets/css/vendors/datatable-extension.css')}}">
@endpush

<div class="container-fluid">
    <div class="page-title">
        <div class="card card-absolute mt-5 mt-md-4">
            <div class="card-header bg-primary">
                <h5 class="text-white">📝 • Catatan Kegiatan Organisasi</h5>
            </div>
            @if(Auth::user()->name == 'Superadmin')
            <div class="card-body">
                <p>
                    Dibawah ini adalah catatan Kegiatan yang telah kamu buat dan tulis. <span
                        class="d-none d-md-inline">
                        Catatan dibawah juga bisa kamu
                        kamu baca atau lihat dengan menekan logo mata berwarna hijau, edit dengan menekan logo
                        pencil
                        berwarna ungu dan hapus dengan menekan logo sampah berwarna merah. Ingin menambahkan
                        catatan?
                        tambah
                        catatanmu
                        <a href="{{route('catatan-kegiatan.create')}}">disini ⇾</a>
                    </span>
                </p>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display" id="auto-fill">
                            <thead>
                                <tr>
                                    <th>Author/Penulis</th>
                                    <th>Judul</th>
                                    <th>Nama Agenda</th>
                                    <th>Tanggal</th>
                                    <th>Konten</th>
                                    @if(Auth::user()->name == 'Superadmin')
                                    <th>Opsi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex py-1 align-items-center">
                                            <div class="flex-fill">
                                                <div class="font-weight-bold">{{$item->author}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="font-weight-bold">{{$item->judul}}</td>
                                    <td>{{$item->nama_agenda}}</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>{{substr(strip_tags(htmlspecialchars_decode($item->content)),0,20)}}<a
                                            href="{{route('catatan-kegiatan.show', $item->id)}}"> ...</a></td>
                                    @if(Auth::user()->name == 'Superadmin')
                                    <td>
                                        <a href="{{route('catatan-kegiatan.show', $item->id)}}" class="btn btn-success px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-eye" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="{{route('catatan-kegiatan.edit', $item->id)}}" class="btn btn-info px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3">
                                                </path>
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                                <line x1="16" y1="5" x2="19" y2="8"></line>
                                            </svg>
                                        </a>
                                        <form action="{{route('catatan-kegiatan.destroy', $item->id)}}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger px-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="16" height="16"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @push('datatable-scripts')
    <script src="{{url('cuba/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
    <script src="{{url('cuba/assets/js/datatable/datatable-extension/custom.js')}}"></script>
    <script src="{{url('cuba/assets/js/tooltip-init.js')}}"></script>
    @endpush

    @endsection