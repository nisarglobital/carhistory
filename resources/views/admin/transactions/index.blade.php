
@extends('admin.layout.app')

@section('title', 'Dashboard | Transactions')

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
                    <h5 class="mb-0">Manage Transactions</h5>
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

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Dated</th>
                            <th scope="col">Payment link</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($data)>0)
                            @foreach ($data as $transaction)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->plan->category.' - '.$transaction->plan->name }}</td>
                                    <td>${{ number_format($transaction->amount / 100, 2) }} {{ strtoupper($transaction->currency) }}</td>
                                    <td>{{ ucfirst($transaction->status) }}</td>
                                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                    <td><a target="_blank" href="{{ $transaction->invoice_url }}" class="btn btn-link p-0">Pay Now</a></td>
                                    <td><a href="{{ $transaction->invoice_pdf_url }}" class="btn btn-link p-0">View</a></td>
                                    <td><a href="" class="btn btn-info btn-sm" title="View Details"><i class="ph-eye"></i></a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No Record Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <!-- /sitemap -->

    </div>
    <!-- /content area -->


@endsection
