@extends('master')
@section('content')
    <section id="dashboard">
        <div class="container mt-5">
            {{-- crud --}}
            <h6>Crud Data</h6>
            <div class="row mt-3">
               
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-users"></i></p>
                            <p>Data Siswa</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-users"></i></p>
                            <p>Data Petugas</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-users"></i></p>
                            <p>Data Kelas</p>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-users"></i></p>
                            <p>Data Surat</p>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
    </section>
@endsection