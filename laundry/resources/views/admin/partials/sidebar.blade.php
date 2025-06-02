<div class="sidebar">
    <div class="sidebar-top">
        <a href="{{ route('admin.dashboard') }}">
            <div class="menu {{ ($active ?? '') === 'dashboard' ? 'active' : '' }}">
                <img src="{{ asset('asset/icons8-dashboard-90 (1).png') }}" alt="Dashboard" class="icon-img">
            </div>
        </a>
        <a href="{{ route('admin.orders.index') }}">
            <div class="menu {{ ($active ?? '') === 'order' ? 'active' : '' }}">
                <img src="{{ asset('asset/icons8-cart-90 (1).png') }}" alt="Orders" class="icon-img">
            </div>
        </a>
    </div>
    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="menu" style="background: none; border: none;">
                <img src="{{ asset('asset/icons8-exit-90 (1).png') }}" alt="Logout" class="icon-img">
            </button>
        </form>
    </div>
</div>
