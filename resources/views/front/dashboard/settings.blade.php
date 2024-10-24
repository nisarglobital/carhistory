@extends('front.dashboard.layout')

@section('dashboard_page_title', 'Settings')

    @push('styles')
        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
        <style>
            .key-input:focus{ box-shadow: none !important; border-color: var(--bs-border-color) !important; }
        </style>
    @endpush

    @section('dashboard_content')

        <div class="row">
            <div class="col-12">

                <div class="card-body">
                    <div class="row">

                        {{--

                        <select name="input_types[]" class="input-type-selector form-control">
                            <option value="text">Text</option>
                            <option value="textarea" selected>Textarea</option>
                            <option value="number">Number</option>
                            <option value="float">Float</option>
                            <option value="date">Date</option>
                        </select>

                        {{--<input class="form-control" name="values[]"
                                   value="{{ $setting->value }}"
                                   type="{{ $setting->input_type == 'float' ? 'number' : $setting->input_type }}"
                                {{ $setting->input_type == 'float' ? 'step=0.01' : '' }}
                                {{ $setting->input_type == 'date' ? 'placeholder=Y-m-d pattern=[0-9]{4}-[0-9]{2}-[0-9]{2}' : '' }}
                            />
                        --}}

                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div id="dynamic-settings">
                                <!-- General Settings Heading -->
                                <div class="row bg-light pt-2">
                                    <div class="form-group pl-4">
                                        <h6>General Settings for your Account</h6>
                                        <hr>
                                    </div>
                                </div>

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

                                <!-- Receive News Alerts -->
                                <div class="card">
                                    <div class="card-body">


                                        <!-- Receive News Alerts -->
                                        <div class="row my-2 py-2">
                                            <input type="hidden" name="input_types[]" value="radio">
                                            <input type="hidden" readonly name="keys[]" value="receive-news-alerts">
                                            <div class="col-12">
                                                <div class="form-group input-field">
                                                    <label for="receive-news-alerts">Receive News Alerts</label>
                                                    <input type="hidden" name="values[]" value="no"> <!-- Default value when no radio is selected -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="receive-updates" id="news-yes" value="yes"
                                                            {{ isset($settings['receive-updates']) && $settings['receive-updates'] == 'yes' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="news-yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="receive-updates" id="news-no" value="no"
                                                            {{ isset($settings['receive-updates']) && $settings['receive-updates'] == 'no' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="news-no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Receive Updates -->
                                        <div class="row my-2 py-2">
                                            <input type="hidden" name="input_types[]" value="radio">
                                            <input type="hidden" readonly name="keys[]" value="receive-updates">
                                            <div class="col-12">
                                                <div class="form-group input-field">
                                                    <label for="receive-updates">Receive Updates</label>
                                                    <input type="hidden" name="values[]" value="no"> <!-- Default value when no radio is selected -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="receive-news-alerts" id="update-yes" value="yes"
                                                            {{ isset($settings['receive-news-alerts']) && $settings['receive-news-alerts'] == 'yes' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="update-yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="receive-news-alerts" id="update-no" value="no"
                                                            {{ isset($settings['receive-news-alerts']) && $settings['receive-news-alerts'] == 'no' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="update-no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary btn-sm">Save Settings</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>

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
