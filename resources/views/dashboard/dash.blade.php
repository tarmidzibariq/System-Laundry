@extends('master')
@section('content')
    <section id="dashboard">
        <div class="container mt-5">
            {{-- crud --}}
            {{-- <h6>Crud Data</h6> --}}
            <div class="row pt-5">
               
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-random"></i></p>
                            <p>123</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-users"></i></p>
                            <p>1234</p>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-shopping-cart"></i></p>
                            <p>123</p>
                        </div>
                    </a>
                </div>

            </div>
            
        </div>
    </section>
@endsection