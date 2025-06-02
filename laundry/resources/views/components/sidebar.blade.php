<div class="sidebar">
    <div class="sidebar-top">
        <a href="{{ route('admin.dashboard') }}" class="menu {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <img src="{{ asset('asset/icons8-dashboard-90 (1).png') }}" class="icon-img" alt="Dashboard">
        </a>
        <a href="{{ route('admin.orders.index') }}" class="menu {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
            <img src="{{ asset('asset/icons8-cart-90 (1).png') }}" class="icon-img" alt="Order">
        </a>
        {{-- Uncomment if routes exist --}}
        {{-- 
        <a href="{{ route('admin.pendapatan.index') }}" class="menu {{ request()->routeIs('admin.pendapatan*') ? 'active' : '' }}">
            <img src="{{ asset('asset/icons8-income-100.png') }}" class="icon-img" alt="Pendapatan">
        </a>
        <a href="{{ route('admin.kategori.index') }}" class="menu {{ request()->routeIs('admin.kategori*') ? 'active' : '' }}">
            <img src="{{ asset('asset/icons8-category-48.png') }}" class="icon-img" alt="Kategori">
        </a> 
        --}}
    </div>
    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="menu" style="background: none; border: none; padding: 0;">
                <img src="{{ asset('asset/icons8-exit-90 (1).png') }}" class="icon-img" alt="Logout">
            </button>
        </form>
    </div>
</div>
