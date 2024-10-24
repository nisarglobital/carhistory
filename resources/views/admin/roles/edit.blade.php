
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
                    <span class="breadcrumb-item active">Roles</span>
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
                    <h5 class="mb-0">Manage Roles - Edit</h5>
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

                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="permissions" class="form-label">Assign Permissions:</label>
                            @foreach ($categoriesWithPermissions as $category => $permissions)
                                <h6 class="m-0 p-0">{{ $category }}</h6>
                                <div class="row mx-1 mb-2">
                                        @foreach ($permissions as $permission)
                                        <div class="col-3">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="{{ $permission }}"
                                                    {{ in_array($permission, $rolePermissions) ? 'checked' : '' }}>
                                                {{ $permission }}
                                            </label>
                                        </div>
                                        @endforeach
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
        <!-- /sitemap -->

    </div>
    <!-- /content area -->


@endsection
