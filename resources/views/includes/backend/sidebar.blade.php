<div class="sidebar-wrapper h-100">
    <nav class="sidebar-main">
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#">
                        <img class="img-fluid" src="#" alt="">
                    </a>
                    <div class="mobile-back text-right">
                        <span>Back</span>
                        <i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="sidebar-main-title pt-0">
                    <div class="text-center">
                        <img src="{{asset('cuba/assets/images/umkt.png')}}" width="25%"><br>
                    </div>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('dashboard')}}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-main-title">
                    <div>
                        <h6>Kelola Data Organisasi</h6>
                        <p>Rapat, Catatan, Docs & File</p>
                    </div>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/dashboard/file-tugas')}}">
                        <i data-feather="layers"></i>
                        <span>Struktur Organisasi</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('jadwal-rapat.index')}}">
                        <i data-feather="book"></i>
                        <span>Jadwal Rapat</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('catatan-kegiatan.index')}}">
                        <i data-feather="edit"></i>
                        <span>Catatan Kegiatan</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/dashboard/file-tugas')}}">
                        <i data-feather="paperclip"></i>
                        <span>File Manager</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <i data-feather="image"></i>
                        <span>Galeri Dokumentasi</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{url('/dashboard/galeri-foto')}}">
                                Semua Galeri Dokumentasi
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard/galeri-foto/tambah-foto')}}">
                                Upload Foto Baru
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-main-title">
                    <div>
                        <h6>Kelola Todolist & Bookmark</h6>
                        <p>Todolist, Kalender & Bookmark</p>
                    </div>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/dashboard/todolist')}}">
                        <i data-feather="check-square"></i>
                        <span>Todolist</span>
                    </a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/dashboard/calendar')}}">
                        <i data-feather="calendar"></i>
                        <span>Kalender</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>