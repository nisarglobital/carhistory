@extends('front.dashboard.layout')

@section('dashboard_page_title', 'Dashboard')

@push('styles')
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
@endpush

@section('dashboard_content')

    <div class="row">

        <!-- Reports Checked -->
        <div class="col-md-4">
            <div class="card text-center" style="background-color: #e0f7fa; border: none;">
                <div class="card-body">
                    <i class="fas fa-check-circle fa-3x mb-3" style="color: #0288d1;"></i>
                    <h5 class="card-title">Reports Checked</h5>
                    <p class="card-text" style="color: #01579b;">150</p>
                </div>
            </div>
        </div>

        <!-- Remaining Report Credit -->
        <div class="col-md-4">
            <div class="card text-center" style="background-color: #e1f5fe; border: none;">
                <div class="card-body">
                    <i class="fas fa-credit-card fa-3x mb-3" style="color: #0277bd;"></i>
                    <h5 class="card-title">Remaining Report Credit</h5>
                    <p class="card-text" style="color: #01579b;">50 Credits</p>
                </div>
            </div>
        </div>

        <!-- Active Plan -->
        <div class="col-md-4">
            <div class="card text-center" style="background-color: #e3f2fd; border: none;">
                <div class="card-body">
                    <i class="fas fa-tasks fa-3x mb-3" style="color: #039be5;"></i>
                    <h5 class="card-title">Active Plan</h5>
                    <p class="card-text" style="color: #0277bd;">Pro Plan</p>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
