<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Perpustakaan | Koleksi</title>
    @include('template.head')
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar-peminjam')
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="card-title">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <section class="content">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card-content mb-2">
                        <div class="row">
                            @foreach ($data as $a)
                                <div class="col-md-3">
                                    <div class="card mb-4 shadow" style="cursor: pointer">
                                        <div class="container mt-2">

                                            <img src="gambar/{{ $a->buku->gambar }}" alt="{{ $a->buku->judul }}"
                                                class="card-img-top" width="300" height="400">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $a->buku->judul }}</h5>
                                                <p class="card-text">{{ $a->buku->penulis }}</p>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button data-toggle="modal" href="#modalShow{{ $a->id }}"
                                                class="btn btn-link btn-success">
                                                <i class="fas fa-eye text-white"></i>
                                            </button>
                                            <a type="button" href="/koleksi-pribadi/destroy/{{ $a->id }}"
                                                class="btn btn-danger">
                                                <i></i> Hapus Koleksi
                                            </a>
                                            <a type="button" href="/pinjam/tambah/{{ $a->buku->id }}"
                                                class="btn btn-primary">
                                                <i></i>Pinjam
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                {{-- form modal show detail --}}
                @foreach ($data as $b)
                    <div class="modal fade" id="modalShow{{ $b->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                @csrf
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row justify-content-center">
                                                    <img src="{{ url('gambar') . '/' . $b->buku->gambar }}"
                                                        alt="" width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <table class="table text-nowarp">
                                                    <tbody>
                                                        <tr>
                                                            <th>Judul</th>
                                                            <td>:</td>
                                                            <td>{{ $b->buku->judul }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penulis</th>
                                                            <td>:</td>
                                                            <td>{{ $b->buku->penulis }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penerbit</th>
                                                            <td>:</td>
                                                            <td>{{ $b->buku->penerbit->nama_penerbit }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kategori</th>
                                                            <td>:</td>
                                                            <td>{{ $b->buku->kategori->nama_kategori }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Stok</th>
                                                            <td>:</td>
                                                            <td>{{ $b->buku->stok }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('template.footer')
    </div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('template.script')

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>