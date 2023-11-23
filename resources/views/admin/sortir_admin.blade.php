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
                        Daftar Survei
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
                                    <th>Target hari</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Pergaulan Remaja</td>
                                    <td>12</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>
                                        <span class="badge bg-success">Detail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>E-Commerce Benefit</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>
                                        <span class="badge bg-success">Detail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Perkuliahan Hybrid</td>
                                    <td>15</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>
                                        <span class="badge bg-danger">Detail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Globalisasi</td>
                                    <td>14</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>
                                        <span class="badge bg-warning">Detail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Politik Menjelang Pemilu politeknik negeri batam</td>
                                    <td>10</td>
                                    <td>50</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>
                                        <span class="badge bg-dark">Detail</span>
                                        <span class="badge bg-dark">Detail</span>
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
