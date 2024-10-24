@extends('front.dashboard.layout')

@section('dashboard_page_title', 'Transactions')

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
                        <th scope="col">Dated</th>
                        <th scope="col">Pay Now</th>
                        <th scope="col">Invoice</th>
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

    @endsection

    @push('scripts')
        <script type="text/javascript">

        </script>
    @endpush
