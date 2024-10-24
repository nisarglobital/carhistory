
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
                    <span class="breadcrumb-item active">Plans</span>
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
                    <h5 class="mb-0">Manage Plans - Edit</h5>
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

                    <form action="{{ route('admin.plans.update', $plan->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Specify PUT method for updating -->

                        <div class="row">

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="name">Plan Name: <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $plan->name }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="number_of_reports">Number of Reports (For Report-Based Plans):</label>
                                            <input type="number" name="number_of_reports" id="number_of_reports" class="form-control" value="{{ $plan->number_of_reports }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="price_per_report">Price per Report: </label>
                                            <input type="number" name="price_per_report" id="price_per_report" class="form-control" step="0.01" value="{{ $plan->price_per_report }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="billing_cycle">Billing Cycle (For Subscription-Based Plans): <span class="text-danger">*</span></label>
                                    <select name="billing_cycle" id="billing_cycle" class="form-control" required>
                                        <option value="" selected disabled>Select an Option</option>
                                        <option value="allowed_numbers" {{ $plan->billing_cycle == 'allowed_numbers' ? 'selected' : '' }}>Allowed Numbers</option>
                                        <option value="one_time" {{ $plan->billing_cycle == 'one_time' ? 'selected' : '' }}>One Time</option>
                                        <option value="monthly" {{ $plan->billing_cycle == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="annually" {{ $plan->billing_cycle == 'annually' ? 'selected' : '' }}>Annually</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="subscription_term">Subscription Term (No. of Months, For Subscription-Based Plans):</label>
                                    <input type="number" name="subscription_term" id="subscription_term" class="form-control" value="{{ $plan->subscription_term }}">
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="category">Plan Category: <span class="text-danger">*</span></label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="B2C" {{ $plan->category == 'B2C' ? 'selected' : '' }}>B2C</option>
                                                <option value="B2B" {{ $plan->category == 'B2B' ? 'selected' : '' }}>B2B</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="plan_type">Plan Type: <span class="text-danger">*</span></label>
                                            <select name="plan_type" id="plan_type" class="form-control" required>
                                                <option value="report_based" {{ $plan->plan_type == 'report_based' ? 'selected' : '' }}>Report-Based</option>
                                                <option value="subscription_based" {{ $plan->plan_type == 'subscription_based' ? 'selected' : '' }}>Subscription-Based</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="monthly_cost">Monthly Cost: </label>
                                            <input type="number" name="monthly_cost" id="monthly_cost" class="form-control" step="0.001" value="{{ $plan->monthly_cost }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="discount">Discount (%): <span class="text-danger">*</span></label>
                                            <input type="number" name="discount" id="discount" class="form-control" step="0.001" required value="{{ $plan->discount }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="total_cost">Total Cost per Month: <span class="text-danger">*</span></label>
                                            <input type="number" name="total_cost" id="total_cost" class="form-control" step="0.001" required value="{{ $plan->total_cost }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="total_savings">Total Savings per Month: <span class="text-danger">*</span></label>
                                            <input type="number" name="total_savings" id="total_savings" class="form-control    " step="0.001" value="{{ $plan->total_savings }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="price">Final Price: <span class="text-danger">*</span></label>
                                            <input type="number" name="price" id="price" class="form-control bg-light" step="0.001" required value="{{ $plan->price }}" >
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="features">Features (One per line or comma separated): <span class="text-danger">*</span></label>
                                    <textarea name="features" id="features" class="form-control" rows="4" required>{{ $plan->features }}</textarea>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="description">Description: <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $plan->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Update Plan</button>
                                </div>
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

@push('scripts')
    <script type="text/javascript">


        $(document).ready(function() {
            // Attach events to dynamically manage form fields and calculate costs
            $('#number_of_reports, #price_per_report, #discount, #monthly_cost, #subscription_term').on('change', function() {
                manageFormFields();
            });

            // Calculate total cost on page load if values are already set
            manageFormFields();
        });

        // Function to calculate total cost based on number_of_reports and price_per_report
        function calculateTotalCost() {
            var numberOfReports = parseFloat($('#number_of_reports').val()) || 0;
            var pricePerReport = parseFloat($('#price_per_report').val()) || 0;
            var discount = parseFloat($('#discount').val()) || 0;
            var subscriptionTerm = parseFloat($('#subscription_term').val()) || 0;

            // Calculate total cost before discount
            var totalCost = numberOfReports * pricePerReport;

            // Set total cost to the total_cost input field
            $('#total_cost').val(totalCost.toFixed(2));

            // Calculate total savings based on discount
            var totalSavings = totalCost * (discount / 100);
            $('#total_savings').val(totalSavings.toFixed(2));

            // Calculate final price and update #price field
            updateFinalPrice(totalCost, totalSavings, subscriptionTerm);
        }

        // Function to calculate total cost based on monthly cost
        function calculateTotalCostBasedOnMonthlyCost() {
            var monthlyCost = parseFloat($('#monthly_cost').val()) || 0;
            var discount = parseFloat($('#discount').val()) || 0;
            var subscriptionTerm = parseFloat($('#subscription_term').val()) || 0;

            // Set total cost to the total_cost input field
            $('#total_cost').val(monthlyCost.toFixed(2));

            // Calculate total savings based on discount
            var totalSavings = monthlyCost * (discount / 100);
            $('#total_savings').val(totalSavings.toFixed(2));

            // Calculate final price and update #price field
            updateFinalPrice(monthlyCost, totalSavings, subscriptionTerm);
        }

        // Function to manage the form fields based on input
        function manageFormFields() {
            var numberOfReports = $('#number_of_reports').val();
            var pricePerReport = $('#price_per_report').val();
            var monthlyCost = $('#monthly_cost').val();

            // If number_of_reports or price_per_report is entered, calculate based on that
            if (numberOfReports || pricePerReport) {
                calculateTotalCost();
            }

            // If monthly_cost is entered, calculate based on that
            if (monthlyCost) {
                calculateTotalCostBasedOnMonthlyCost();
            }
        }

        // Function to calculate and update final price (total_cost - total_savings)
        function updateFinalPrice(totalCost, totalSavings, subscriptionTerm) {
            var finalPrice = totalCost - totalSavings;

            // If subscription_term is greater than 0, multiply the final price by subscription_term
            if (subscriptionTerm > 0) {
                finalPrice = finalPrice * subscriptionTerm;
            }

            $('#price').val(finalPrice.toFixed(2));  // Set the final price to the #price input
        }

    </script>

@endpush
