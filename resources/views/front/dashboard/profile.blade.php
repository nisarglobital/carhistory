@extends('front.dashboard.layout')

@section('dashboard_page_title', 'Profile')

    @push('styles')
        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    @endpush

    @section('dashboard_content')

        <div class="row">
            <div class="col-12">

                <div class="card-body">
                    <div class="row">

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

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


                            <div class="card">
                                <div class="card-body">
                                    <!-- Name -->
                                    <div class="form-group mb-3">
                                        <label for="name" class="my-2">Name</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group mb-3">
                                        <label for="email" class="my-2">Email</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group mb-3">
                                        <label for="password" class="my-2">New Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <!-- Password Confirmation -->
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation" class="my-2">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Update Profile</button>
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

        </script>
    @endpush
