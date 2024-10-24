
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
                    <span class="breadcrumb-item active">Settings</span>
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
                    <h5 class="mb-0">Manage Permissions - Edit</h5>
                    <div class="alert alert-info p-2 m-0">
                        <span><strong>Alert:</strong> Don't change the existing keys, that may generate malfunctioning in the application.</span>
                    </div>
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

                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div id="dynamic-settings">
                            <div class="row bg-light pt-2">
                                <div class="col-3">
                                    <div class="form-group pl-4">
                                        <h6>Key</h6>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <h6>Input Type</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group input-field">
                                        <h6>Value of key</h6>
                                    </div>
                                </div>
                            </div>
                            @foreach($settings as $setting)
                                <div class="row bg-light my-2 py-2">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input type="text" name="keys[]" class="form-control" value="{{ $setting->key }}" placeholder="key to use in code" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <select name="input_types[]" class="input-type-selector form-control">
                                                <option value="text" {{ $setting->input_type == 'text' ? 'selected' : '' }}>Text</option>
                                                <option value="textarea" {{ $setting->input_type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                                <option value="number" {{ $setting->input_type == 'number' ? 'selected' : '' }}>Number</option>
                                                <option value="float" {{ $setting->input_type == 'float' ? 'selected' : '' }}>Float</option>
                                                <option value="date" {{ $setting->input_type == 'date' ? 'selected' : '' }}>Date</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group input-field">
                                            <!-- Populate fields based on input type -->
                                            @if ($setting->input_type == 'textarea')
                                                <textarea name="values[]" class="form-control">{{ $setting->value }}</textarea>
                                            @else
                                                <input class="form-control" name="values[]"
                                                       value="{{ $setting->value }}"
                                                       type="{{ $setting->input_type == 'float' ? 'number' : $setting->input_type }}"
                                                            {{ $setting->input_type == 'float' ? 'step=0.01' : '' }}
                                                            {{ $setting->input_type == 'date' ? 'placeholder=Y-m-d pattern=[0-9]{4}-[0-9]{2}-[0-9]{2}' : '' }}
                                                />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <button type="button" class="btn btn-sm btn-outline-success" onclick="addSetting()">Add More +</button>
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-sm">Save Settings</button>
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
        const inputTemplates = {
            text: '<input type="text" name="values[]" class="form-control" />',
            textarea: '<textarea name="values[]" class="form-control"></textarea>',
            number: '<input type="number" name="values[]" class="form-control" />',
            float: '<input type="number" step="0.01" name="values[]" class="form-control" />',
            date: '<input type="date" name="values[]" class="form-control" placeholder="Y-m-d" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />',
        };

        function renderInputField(type) {
            return inputTemplates[type] || inputTemplates.text;
        }

        function attachChangeListener(selector) {
            selector.addEventListener('change', function () {
                const inputFieldContainer = this.parentElement.parentElement.nextElementSibling.querySelector('.form-group');
                inputFieldContainer.innerHTML = renderInputField(this.value);
            });
        }

        function addSetting() {
            const container = document.getElementById('dynamic-settings');
            const newSetting = document.createElement('div');
            newSetting.classList.add('row', 'bg-light', 'my-2', 'py-2');
            newSetting.innerHTML = `
            <div class="col-3">
                <div class="form-group">
                    <input type="text" name="keys[]" class="form-control" placeholder="key to use in code" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <select name="input_types[]" class="input-type-selector form-control">
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="number">Number</option>
                        <option value="float">Float</option>
                        <option value="date">Date</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    ${inputTemplates.text}
                </div>
            </div>
        `;
            container.appendChild(newSetting);
            attachChangeListener(newSetting.querySelector('.input-type-selector'));
        }

        // Attach event listeners to existing selectors when the page loads
        document.querySelectorAll('.input-type-selector').forEach(attachChangeListener);
    </script>

@endpush
