@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-trash pr-2" style="font-size: 15px;"></i> <span>Pesanan dibatalkan</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container">
                {{-- <a href=""><button class="btn mt-4 text-white" style="background-color:#3FC5F0;"><i class="fas fa-plus mr-1"></i> Tambah Data</button></a> --}}
                {{-- <a href="{{route('crudsiswa.cetaksiswa')}}"><button class="btn btn-primary mt-4 text-white" ><i class="fas fa-file-pdf mr-1"></i> Print PDF</button></a> --}}
                <div class="table-responsive mt-2">
                  <table class="table table-bordered mt-2 table-hover">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">NO</th>
                          <th scope="col">PENGGUNA</th>
                          <th scope="col">TANGGAL PEMESANAN</th>
                          {{-- <th scope="col">OUTLET</th> --}}
                          <th scope="col">PESANAN</th>
                          <th scope="col">HARGA</th>
                          <th scope="col">TANGGAL PEMBATALAN</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transaksi as $item)
                            
                        <tr>
                          <th scope="row" class="text-center">{{$loop->iteration}}</th>
                          <td>{{$item->users->name}}</td>
                          <td>{{ Carbon\Carbon::parse($item->tgl)->isoFormat("D MMMM Y") }}</td>
                          <td style="text-transform: capitalize">{{$item->outlets->nama.' | '.$item->pakets->nama_paket}}</td>
                          <td>{{number_format($item->biaya)}}</td>
                          <td>{{ Carbon\Carbon::parse($item->deleted_at)->isoFormat("D MMMM Y") }}</td>
                          
                        </tr>
                        @endforeach
                        
                      </tbody>
                  </table>
                </div>
                <a href="{{ route('entri.index') }}" class="btn btn-success">Kembali</a>
                {{-- <div class="d-flex justify-content-left">
                    
                        {{ $transaksi->links() }}
                    
                </div> --}}
            </div>
            
        </div>
        
    </section>
@endsection