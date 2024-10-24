
@extends('admin.layout.app')

@section('title', 'Dashboard | Roles')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="/panel" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active"> / </span>
                    <span class="breadcrumb-item active">Permissions</span>
                    <span class="breadcrumb-item active"> / </span>
                    <span class="breadcrumb-item active">Create</span>
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
                    <h5 class="mb-0">Manage Permissions - Create</h5>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <!-- Display validation errors, if any -->
                    @if ($errors->any())
                        <div class="alert alert-danger p-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form for creating a new permission -->
                    <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Permission Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="category">Category</label>
                            <select name="category" class="form-control" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categoriesWithPermissions as $category => $permissions)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-sm">Create Permission</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- /sitemap -->

    </div>
    <!-- /content area -->


@endsection
