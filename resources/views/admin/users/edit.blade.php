
@extends('admin.layout.app')

@section('title', 'Dashboard | Users')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="/panel" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active"> / </span>
                    <span class="breadcrumb-item active">Users</span>
                    <span class="breadcrumb-item active"> / </span>
                    <span class="breadcrumb-item active">Edit</span>
                </div>
                <a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block ms-lg-auto" id="breadcrumb_elements">
                <div class="d-lg-flex mb-2 mb-lg-0">
                    <a href="#" class="d-flex align-items-center text-body py-2">
                        <i class="ph-key-return me-2"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Sitemap -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-0">Manage Users - Edit</h5>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <!-- Flash messages -->
                    @if(session('success'))
                        <div class="alert alert-success p-2">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger p-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST"  autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class=" col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="name">Name:</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required >
                                </div>
                            </div>

                            <div class=" col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="name">Email:</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required >
                                </div>
                            </div>

                            <!-- Role Assignment Section -->
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="role" class="form-label">Assign Role:</label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="" disabled selected>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name }}" {{ ($user->getRoleNames()->first() == $role->name) ? 'selected' : '' }}  >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class=" col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="name">Password:</label>
                                    <input type="Password" name="Password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="user_type">User Type:</label>
                                    <div class="mt-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="user" value="user" {{ $user->type == 'user' ? 'checked' : '' }} required  >
                                            <label class="form-check-label" for="user">User (front-end users Free, Premium)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="admin" value="admin" {{ $user->type == 'admin' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="admin">Staff (Admin, Manager etc)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="name">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" >
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary btn-sm">Update User</button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>
        <!-- /sitemap -->

    </div>
    <!-- /content area -->


@endsection
