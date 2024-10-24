@extends('front.dashboard.layout')

@section('dashboard_page_title', 'Payment Options')

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

                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div id="dynamic-settings">
                                <!-- Payment Settings Heading -->
                                <div class="row bg-light pt-2">
                                    <div class="form-group pl-4">
                                        <h6>Payment Settings</h6>
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

                                <!-- Default Payment Method -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row my-2 py-2">
                                            <input type="hidden" name="input_types[]" value="radio">
                                            <input type="hidden" readonly name="keys[]" value="default payment method">
                                            <div class="col-12">
                                                <div class="form-group input-field">
                                                    <label for="default-payment-method">Default Payment Method</label>
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="values[]" id="stripe" value="stripe"
                                                                {{ (isset($settings['default-payment-method']) && $settings['default-payment-method'] == 'stripe') ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="stripe">Stripe</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="values[]" id="paypal" value="paypal"
                                                                {{ (isset($settings['default-payment-method']) && $settings['default-payment-method'] == 'paypal') ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="paypal">PayPal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Stripe Public Key -->
                                        <div class="row my-2 py-2">
                                            <input type="hidden" name="input_types[]" value="textarea">
                                            <input type="hidden" readonly name="keys[]" value="Strip public key">
                                            <div class="col-12">
                                                <div class="form-group input-field">
                                                    <label for="strip-public-key" class="my-2">Stripe Public Key</label>
                                                    <textarea name="values[]" class="form-control" id="strip-public-key">{{ $settings['strip-public-key'] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Stripe Secret Key -->
                                        <div class="row my-2 py-2">
                                            <input type="hidden" name="input_types[]" value="text">
                                            <input type="hidden" readonly name="keys[]" value="Strip secret key">
                                            <div class="col-12">
                                                <div class="form-group input-field">
                                                    <label for="strip-secret-key" class="my-2">Stripe Secret Key</label>
                                                    <textarea name="values[]" class="form-control" id="strip-secret-key">{{ $settings['strip-secret-key'] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PayPal Email -->
                                        <div class="row my-2 py-2">
                                            <input type="hidden" name="input_types[]" value="text">
                                            <input type="hidden" readonly name="keys[]" value="Paypal email">
                                            <div class="col-12">
                                                <div class="form-group input-field">
                                                    <label for="paypal-email" class="my-2">PayPal Email</label>
                                                    <input class="form-control" name="values[]" value="{{ $settings['paypal-email'] ?? '' }}" type="text" id="paypal-email">
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
