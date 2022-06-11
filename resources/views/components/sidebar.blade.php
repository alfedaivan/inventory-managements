<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{url('/dashboard')}}">Gudang</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{url('/dashboard')}}">GU</a>
        </div>
        <ul class="sidebar-menu">
<<<<<<< HEAD
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
=======
            <li class="{{request()->is('dashboard') ? 'nav-item active' : 'nav-item'}}">
                <a href="{{url('/dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard </span></a>
            </li>
            <li class="{{request()->is('supplier') ? 'nav-item active' : 'nav-item'}}">
>>>>>>> 09d12f9fedaa8e954d5bce55a79811e2918ad6db
                <a href="{{url('/supplier')}}" class="nav-link"><i class="fas fa-truck"></i><span>Supplier </span></a>
            </li>
            <li class="{{request()->is('user') ? 'nav-item active' : 'nav-item'}}">
                <a href="{{url('/user')}}" class="nav-link"><i class="fas fa-user"></i><span>Users </span></a>
            </li>
        </ul>
    </aside>
</div>