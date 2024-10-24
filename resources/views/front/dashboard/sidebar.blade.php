@push('styles')
    <style>
        .sidebar ul { padding-left: 1rem; }
        .sidebar ul li {
            width: 164px;
            justify-content: flex-start;
        }
        .sidebar ul li a{ width: 100%; height: 100%; }
        .sidebar ul li:hover{ cursor: pointer; }
    </style>
@endpush

<div class="sidebar bg-primary-subtle" style="min-height: 80vh;">
    <ul class="py-3" style="list-style: none;">
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('dashboard') }}" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-dashboard mx-2 my-1"></i> Dashboard
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('reports') }}" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-file-pdf mx-2 my-1"></i> Reports
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('subscriptions') }}" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-play-circle mx-2 my-1"></i> Subscriptions
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('transactions') }}" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-dollar-sign mx-2 my-1"></i> Transactions
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('payments') }}" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-comment-dollar mx-2 my-1"></i> Payment Options
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('home-page') }}#b2c_pricing" target="_blank" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-eye mx-2 my-1"></i> See Plans
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('settings.edit') }}" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-gear mx-2 my-1"></i> Settings
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('profile') }}" class="d-flex text-decoration-none text-dark">
                <i class="fa fa-user-check mx-2 my-1"></i> Profile
            </a>
        </li>
        <li class="d-flex align-middle my-2 py-1 bg-light">
            <a href="{{ route('logout') }}" class="d-flex text-decoration-none text-dark"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                <i class="fa fa-sign-out-alt mx-2 my-1"></i> Logout
            </a>
        </li>

    </ul>
</div>
