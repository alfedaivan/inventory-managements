<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{url('/dashboard')}}">Gudang</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{url('/dashboard')}}">GU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item active">
                <!-- "{{request()->is('dashboard') ? 'nav-item active' : 'nav-item'}}" -->
                <a href="{{url('/dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard </span></a>
            </li>
            <li class="nav-item active">
                <!-- "{{request()->is('kategori') ? 'nav-item active' : 'nav-item'}}" -->
                <a href="{{url('/kategori')}}" class="nav-link"><i class="fas fa-list-alt"></i><span>Kategori </span></a>
            </li>
            <li class="nav-item active">
                <!-- "{{request()->is('supplier') ? 'nav-item active' : 'nav-item'}}" -->
                <a href="{{url('/supplier')}}" class="nav-link"><i class="fas fa-truck"></i><span>Supplier </span></a>
            </li>
        </ul>
    </aside>
</div>