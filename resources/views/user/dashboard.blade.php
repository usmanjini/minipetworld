@extends('user.usermaster')
 
@section('title', 'Home')

 
  
@section('content')
 
  
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

          <div class="page-heading">
                <h3>User Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-6">
                         <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center"> 
                                        <h1 class="font-bold text-center">Welcome</h1> 
                                   
                                </div>
                            </div>
                        </div>
 
                    </div>
                    <div class="col-12 col-lg-6">   
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">  
                                  <h1 class="font-bold">{{ Auth::user()->name }}</h1>  
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </section>
            </div>

@endsection

@section('specificscripts')
<script src="{{ asset('assets/admin/assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/admin/assets/js/pages/dashboard.js') }}"></script> 
<script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
@stop