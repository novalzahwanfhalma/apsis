@extends('layouts.master')
@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User Management Control</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Mangement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    User Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Role Name</th>
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="id">{{ $item->id }}</td>
                                    <td class="name">{{ $item->name }}</td>
                                    <td class="email">{{ $item->email }}</td>
                                    <td class="phone_number">{{ $item->phone_number }}</td>
                                    @if($item->status =='Active')
                                    <td class="status"><span class="badge bg-success">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status ==null)
                                    <td class="status"><a href="javascript:void(0)" class="badge badge-pill badge-danger">{{ $item->status }}</a></td>
                                    @endif
                                    @if($item->role_name =='Admin')
                                    <td class="role_name"><a href="javascript:void(0)" class="badge badge-pill badge-success">{{ $item->role_name }}</a></td>
                                    @endif
                                    @if($item->role_name =='Normal User')
                                    <td class="role_name"><a href="javascript:void(0)" class="badge badge-pill badge-secondary">{{ $item->role_name }}</a></td>
                                    @endif
                                    @if($item->role_name =='')
                                    <td class="role_name"><span class="badge bg-warning">{{'[N/A]'}}</span></td>
                                    @endif
                                    <td class="text-center">
                                        <a href="#" class="m-r-15 text-muted userView" data-toggle="modal" data-id="'.$item->id.'"data-bs-toggle="modal"
                                            data-bs-target="#animation">
                                            <span class="badge bg-success">View</span>
                                        </a>  
                                        <a href="#" class="m-r-15 text-muted userUpdate" data-bs-toggle="modal" data-id="'.$item->id.'" data-bs-target="#UserUpdate">
                                            <span class="badge bg-info">Edit</span>
                                        </a>
                                        <a href="{{ url('role/delete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger">Delete</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal View-->
    <div class="modal text-left" id="animation" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel6" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel6">View Detail
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registration" action="" method = "post"><!-- form add -->
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" id="v_id" name="id" value=""/>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Full Name</label>
                                <div class="col-sm-8">
                                    <input type="text" id="v_name"name="name" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email Address</label>
                                <div class="col-sm-8">
                                    <input type="text" id="v_email"name="email" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="tel" id="v_phone_number"name="mobile" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="text" id="v_status"name="status" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Role Name</label>
                                <div class="col-sm-8">
                                    <input type="text" id="v_role_name"name="role_name" class="form-control" value=""/>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- form add end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal View-->

    <!-- Modal Update-->
<div class="modal fade" id="UserUpdate" tabindex="-1" aria-labelledby="update" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update">Update</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="registration" action="" method = "post"><!-- form add -->
                {{ csrf_field() }}
                <div class="modal-body">
               
                    <input type="hidden" class="form-control" id="e_id" name="id" value=""/>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Full Name</label>
                            <div class="col-sm-8">
                                <input type="text" id="e_name" name="name" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email Address</label>
                            <div class="col-sm-8">
                                <input type="text" id="e_email" name="email" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-sm-8">
                                <input type="tel" id="e_phone_number" name="phone_number" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="v_status" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Disable">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Role Name</label>
                            <div class="col-sm-8">
                                <input type="text" id="e_role_name" name="role_name" class="form-control" value="" />
                            </div>
                        </div>
                    </div>
                    <!-- form add end -->
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" id=""name="" class="btn btn-success  waves-light"><i class="icofont icofont-check-circled"></i>Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Update-->

@endsection