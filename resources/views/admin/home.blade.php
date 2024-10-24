@extends('admin.layout.app')

@section('title', 'Dashboard')

@push('styles')

@endpush

@section('content')

    <!-- Page header / breadcrumbs -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="/panel" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active"> / </span>
                    <span class="breadcrumb-item active">Sample Page</span>
                </div>
                <a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block ms-lg-auto" id="breadcrumb_elements">
                <div class="d-lg-flex mb-2 mb-lg-0">
                    <a href="#" class="d-flex align-items-center text-body py-2">
                        <i class="ph-key-return me-2"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center">
                        <i class="ph-hand-pointing ph-2x text-success me-3"></i>

                        <div class="flex-fill text-end">
                            <h4 class="mb-0">652,549</h4>
                            <span class="text-muted">total clicks</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center">
                        <i class="ph-users-three ph-2x text-indigo me-3"></i>

                        <div class="flex-fill text-end">
                            <h4 class="mb-0">245,382</h4>
                            <span class="text-muted">total visits</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h4 class="mb-0">54,390</h4>
                            <span class="text-muted">total comments</span>
                        </div>

                        <i class="ph-chats ph-2x text-primary ms-3"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h4 class="mb-0">389,438</h4>
                            <span class="text-muted">total orders</span>
                        </div>

                        <i class="ph-package ph-2x text-danger ms-3"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-fill">
                            <h6 class="mb-0">Server maintenance</h6>
                            <span class="text-muted">Until 1st of June</span>
                        </div>

                        <i class="ph-gear ph-2x text-indigo opacity-75 ms-3"></i>
                    </div>

                    <div class="progress mb-2" style="height: 0.125rem;">
                        <div class="progress-bar bg-indigo" style="width: 67%"></div>
                    </div>

                    <div>
                        <span class="float-end">67%</span>
                        Re-indexing
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-fill">
                            <h6 class="mb-0">Services status</h6>
                            <span class="text-muted">April, 19th</span>
                        </div>

                        <i class="ph-activity ph-2x text-danger opacity-75 ms-3"></i>
                    </div>

                    <div class="progress mb-2" style="height: 0.125rem;">
                        <div class="progress-bar bg-danger" style="width: 80%"></div>
                    </div>

                    <div>
                        <span class="float-end">80%</span>
                        Partly operational
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="ph-gear ph-2x text-primary opacity-75 me-3"></i>

                        <div class="flex-fill">
                            <h6 class="mb-0">Server maintenance</h6>
                            <span class="text-muted">Until 1st of June</span>
                        </div>
                    </div>

                    <div class="progress mb-2" style="height: 0.125rem;">
                        <div class="progress-bar bg-primary" style="width: 67%"></div>
                    </div>

                    <div>
                        <span class="float-end">67%</span>
                        Re-indexing
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="ph-activity ph-2x text-success opacity-75 me-3"></i>

                        <div class="flex-fill">
                            <h6 class="mb-0">Services status</h6>
                            <span class="text-muted">April, 19th</span>
                        </div>
                    </div>

                    <div class="progress mb-2" style="height: 0.125rem;">
                        <div class="progress-bar bg-success" style="width: 80%"></div>
                    </div>

                    <div>
                        <span class="float-end">80%</span>
                        Partly operational
                    </div>
                </div>
            </div>
        </div>

        <!-- Sitemap -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Sitemap</h5>
            </div>

            <div class="card-body">
                <div class="row">


                </div>
            </div>
        </div>
        <!-- /sitemap -->

    </div>
    <!-- /content area -->

@endsection

@push('scripts')

@endpush
