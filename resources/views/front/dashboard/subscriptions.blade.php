@extends('front.dashboard.layout')

@section('dashboard_page_title', 'Subscriptions')

@push('styles')
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
@endpush

@section('dashboard_content')

    <div class="row">

        <div class="col-12">

            <!-- Flash Messages -->
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
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Invoice</th>
                </tr>
                </thead>
                <tbody>
                @if(count($data) > 0)
                    @foreach ($data as $key=>$subscription)
                        <tr>
                            <th scope="row">{{ ($key+1) }}</th>
                            <td>{{ $subscription->user->name }}</td>
                            <td>{{ $subscription->plan->category . ' - ' . $subscription->plan->name }}</td>
                            <td>${{ number_format($subscription->price, 2) }}</td>
                            <td>{{ ucfirst($subscription->status) }}</td>
                            <td>{{ $subscription->start_date }}</td>
                            <td>{{ $subscription->end_date }}</td>
                            <td>
                                @if(!empty($subscription->transaction->invoice_pdf_url))
                                    <a target="_blank" href="{{ $subscription->transaction->invoice_pdf_url }}" class="btn btn-link p-0">View</a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" class="text-center">No Record Found</td>
                    </tr>
                @endif
                </tbody>
            </table>



        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
