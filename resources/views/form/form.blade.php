@extends('layouts.master')
@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Form Input Information</h3>
            <p class="text-subtitle text-muted">form information</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Input</li>
                </ol>
            </nav>
        </div>
    </div>
</div> 

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input Information</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Full Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Enter full name" id="first-name-icon" name="fullName">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Sex</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Enter sex" id="first-name-icon" name="sex">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Email Address</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="email" class="form-control"
                                            placeholder="Enter email" id="first-name-icon" name="email">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Mobile Number</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="number" class="form-control"
                                            placeholder="Enter phone number" name="phone_number">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Position</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Enter position" name="position">
                                        <div class="form-control-icon">
                                            <i class="bi bi-app-indicator"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Departement</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Enter departement" name="departement">
                                        <div class="form-control-icon">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Salary</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Enter salary" name="salary">
                                        <div class="form-control-icon">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Save</button>
                                <a  type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Cannel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection