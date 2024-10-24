
@extends('admin.layout.app')

@section('title', 'Dashboard | Plans')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="/panel" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active"> / </span>
                    <span class="breadcrumb-item active">Plans</span>
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
                    <h5 class="mb-0">Manage Plans</h5>
                    <a href="{{ route('admin.plans.create') }}" class="btn btn-sm btn-outline-success float-end">+ Add</a>
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

                    <table class="table table-responsive table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Plan Type</th>
                            <th>No. of Reports</th>
                            <th>Price per Report</th>
                            <th>Total Cost</th>
                            <th>Discount (% | $)</th>
                            <th>Final Price</th>
                            <th>Billing Cycle</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plans as $key=>$plan)
                            <tr>
                                <td>{{ ($key + 1) }}</td>
                                <td>{{ $plan->name }}</td>
                                <td>{!! '<span class="badge badge-info '. (($plan->category=='B2C') ? 'bg-secondary' : 'bg-dark').'">'. $plan->category .'</span>' !!}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $plan->plan_type)) }}</td>
                                <td>{{ ($plan->plan_type == 'subscription_based' && $plan->number_of_reports) ? $plan->number_of_reports.' / month'  : $plan->number_of_reports }}</td>
                                <td>{{ $plan->price_per_report ? '$' . $plan->price_per_report : 'N/A' }}</td>
                                <td>${{ ($plan->total_cost * $plan->subscription_term) }}</td>
                                <td>{!! ($plan->discount > 0) ? '<span class="badge badge-info bg-info">'.$plan->discount.'%</span> <span class="badge badge-info bg-info">$'.($plan->total_savings * $plan->subscription_term).'</span>' : 'N/A' !!}</td>
                                <td><span class="badge badge-info bg-success">{{ '$'.$plan->price }}</span></td>
                                <td>{{ ucwords(str_replace('_',' ',$plan->billing_cycle)) ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.plans.edit', $plan->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <!-- /sitemap -->

    </div>
    <!-- /content area -->


@endsection
