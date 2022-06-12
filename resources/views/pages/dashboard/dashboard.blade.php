@extends('pages.mainPage')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary pt-1">
                        <i class="fas fa-cube" style="font-size: 2rem;"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang</h4>
                        </div>
                        <div class="card-body">
                        {{$barang}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning pt-1">
                        <i class="fas fa-list-alt" style="font-size: 2rem;"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kategori</h4>
                        </div>
                        <div class="card-body">
                        {{$kategori}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ol-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success pt-1">
                        <i class="fas fa-truck" style="font-size: 2rem;"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Supplier</h4>
                        </div>
                        <div class="card-body">
                        {{$supplier}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection()
