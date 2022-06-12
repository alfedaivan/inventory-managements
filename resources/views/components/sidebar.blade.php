<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{url('/dashboard')}}">Gudang</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{url('/dashboard')}}">GU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{request()->is('dashboard') ? 'nav-item active' : 'nav-item'}}">
                <a href="{{url('/dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard </span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i> <span>Barang</span></a>
                <ul class="dropdown-menu">
                    <!--  -->
                    <li class="{{request()->is('barang') ? 'active' : 'none'}}">
                        <a class="nav-link" href="{{url('/barang')}}">List Barang</a>
                    </li>
                    <li><a class="nav-link" href="{{url('/barangmasuk')}}">Barang Masuk</a></li>
                    <li><a class="nav-link" href="{{url('/barangkeluar')}}">Barang Keluar</a></li>
                </ul>
            </li>
            <li class="{{request()->is('kategori') ? 'nav-item active' : 'nav-item'}}">
                <a href="{{url('/kategori')}}" class="nav-link"><i class="fas fa-list-alt"></i><span>Kategori </span></a>
            </li>
            <li class="{{request()->is('supplier') ? 'nav-item active' : 'nav-item'}}">
                <a href="{{url('/supplier')}}" class="nav-link"><i class="fas fa-truck"></i><span>Supplier </span></a>
            </li>
            <li class="{{request()->is('user') ? 'nav-item active' : 'nav-item'}}">
                <a href="{{url('/user')}}" class="nav-link"><i class="fas fa-user"></i><span>Users </span></a>
            </li>
        </ul>
    </aside>
</div>