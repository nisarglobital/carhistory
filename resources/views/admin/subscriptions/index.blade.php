
@extends('admin.layout.app')

@section('title', 'Dashboard | Subscriptions')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="/panel" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active"> / </span>
                    <span class="breadcrumb-item active">Transactions</span>
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
                    <h5 class="mb-0">Manage Subscriptions</h5>
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
                            <th>User</th>
                            <th>Category</th>
                            <th>Plan Type</th>
                            <th>Status</th>
                            <th>Rem./Total Reports <i class="ph-question" title="Remaining vs Total Reports"></i></th>
                            <th>Price per Report</th>
                            <th>Total Cost</th>
                            <th>Dis. (% | $)  <i class="ph-question" title="Discount in Percentage & Dollar"></i></th>
                            <th>Final Price</th>
                            <th>Billing Cycle</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$row)
                            <tr>
                                <td>{{ ($key + 1) }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->plan->category . ' - ' . $row->plan->name }}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $row->plan->plan_type)) }}</td>
                                <td><span class="badge badge-info bg-info">{{ ucwords($row->status) }}</span></td>
                                <td>
                                    {{ ($row->plan_type == 'subscription_based' && $row->number_of_reports) ? $row->remaining_reports.' / month'  : $row->remaining_reports }}
                                    /
                                    {{ ($row->plan_type == 'subscription_based' && $row->number_of_reports) ? $row->total_reports.' / month'  : $row->total_reports }}
                                </td>
                                <td>{{ $row->subscription_data->price_per_report ? '$' . $row->subscription_data->price_per_report : 'N/A' }}</td>
                                <td>{{ $row->subscription_data->total_cost ? '$' . $row->subscription_data->total_cost : 'N/A' }}</td>
                                <td>{!! ($row->discount > 0) ? '<span class="badge badge-info bg-info">'.$row->discount.'%</span> <span class="badge badge-info bg-info">$'.($row->total_savings * $row->subscription_term).'</span>' : 'N/A' !!}</td>
                                <td><span class="badge badge-info bg-success">{{ '$'.$row->price }}</span></td>
                                <td>{{ ucwords(str_replace('_',' ',$row->subscription_data->billing_cycle)) ?? 'N/A' }}</td>
                                <td><a href="" class="btn btn-info btn-sm" title="View Details"><i class="ph-eye"></i></a></td>
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
