@extends('layouts.master')
@section('menu')
    @extends('admin.sidebar.dashboard_admin')
@endsection
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Sortir
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Survei</th>
                                    <th>Jumlah Pertanyaan</th>
                                    <th>Jumlah Poin</th>
                                    <th>Target Responden</th>
                                    <th>Target Hari</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gerakan batam merdeka</td>
                                    <td>12</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>
                                        <a href="#">
                                            <span class="badge btn-danger" style="btn-danger">dibatalkan</span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('detail_dibatalkan') }}">
                                            <span class="badge" style="background-color: #D99004;">Detail</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Pengguna laptov lenovo</td>
                                    <td>12</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>
                                        <a href="#">
                                            <span class="badge btn-danger" style="btn-danger">dibatalkan</span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('detail_dibatalkan') }}">
                                            <span class="badge" style="background-color: #D99004;">Detail</span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>


            {{-- <section class="row">
                <div class="col-12 col-lg-9">
                </div>
                <div class="col-3 col-lg-3">

                    {{-- user profile modal --}}

            {{-- end user profile modal --}}

            {{-- </div> --}}
            {{-- </section> --}}

        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center align-items-end">
                <div class="float-start">
                    <p>2023 &copy; Aplikasi Survey dan Analisa Data</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
