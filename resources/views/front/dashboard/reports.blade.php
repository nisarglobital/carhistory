@extends('front.dashboard.layout')

@section('dashboard_page_title', 'Reports')

    @push('styles')
        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    @endpush

    @section('dashboard_content')

        <div class="row">
            <div class="col-12">

                <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">VIN Code</th>
                                    <th scope="col">Refresh Count</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-start">{{ $report->vin_code }}</td>
                                        <td class="text-start">{{ $report->refresh_count }}</td>
                                        <td class="text-start">{{ $report->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="text-start">
                                            <button class="btn btn-info btn-sm view-vin" data-vin="{{ $report->vin_code }}">View</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                </div>


            </div>
        </div>


        <!-- Modal to Show VIN Report -->
        <div class="modal fade" id="vinModal" tabindex="-1" aria-labelledby="vinModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vinModalLabel">VIN Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped" id="vinReportTable"></table>
                    </div>
                </div>
            </div>
        </div>


    @endsection

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.view-vin').on('click', function() {
                    var vinCode = $(this).data('vin');
                    $('#vinModal').modal('show');
                    $('#vinReportTable').html('<tr><td>Loading...</td></tr>'); // Initial loading message

                    $.ajax({
                        url: '/vin-report/' + vinCode,
                        type: 'GET',
                        success: function(response) {
                            var report = response.report;
                            var tableContent = '<thead><tr><th>Specification </th><th>Value</th></tr></thead><tbody>';

                            // Function to convert snake_case or underscore_case to Camel Case
                            function toCamelCase(str) {
                                return str.replace(/([-_][a-z])/g, function (group) {
                                    return group.toUpperCase().replace('-', ' ').replace('_', ' ');
                                }).replace(/^\w/, c => c.toUpperCase());
                            }

                            // Iterate over JSON data to create table rows with Camel Case labels
                            $.each(report, function(key, value) {
                                var camelCaseKey = toCamelCase(key);
                                tableContent += '<tr><td class="text-start">' + camelCaseKey + '</td><td class="text-start">' + value + '</td></tr>';
                            });

                            tableContent += '</tbody>';

                            // Insert table content into the modal
                            $('#vinReportTable').html(tableContent);
                        },
                        error: function(xhr) {
                            $('#vinReportTable').html('<tr><td>Error loading report</td></tr>');
                        }
                    });
                });
            });
        </script>

    @endpush
