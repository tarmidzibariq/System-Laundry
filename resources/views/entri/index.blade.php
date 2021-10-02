@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-shopping-cart pr-2" style="font-size: 15px;"></i> <span>Entri Transakssi</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container">
               <a href="{{ route('entri.pesananBatal') }}" class="btn btn-danger mt-3">Pesanan dibatalkan</a>
                <div class="table-responsive mt-2">
                  <table class="table table-bordered mt-2 table-hover">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">NO</th>
                          <th scope="col">PENGGUNA</th>
                          <th scope="col">TANGGAL</th>
                          {{-- <th scope="col">OUTLET</th> --}}
                          <th scope="col">PESANAN</th>
                          <th scope="col">HARGA</th>
                          <th scope="col">STATUS</th>
                          <th scope="col">PEMBAYARAN</th>
                          <th scope="col">ACTION</th>
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
                          <td>
                              @if ($item->status == 'pending')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px; background-color:#FB9300;" class="badge text-white">{{$item->status}}</div>
                              @endif
                              @if ($item->status == 'verifikasi')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px;" class="badge bg-success text-white">{{$item->status}}</div>
                              @endif
                              @if ($item->status == 'pesanan_diambil')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px; background-color:#FFC107;" class="badge text-white">pesanan diambil</div>
                              @endif
                              @if ($item->status == 'laundry')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px; background-color:#5C7AEA;" class="badge text-white">{{$item->status}}</div>
                              @endif
                              @if ($item->status == 'selesai_laundry')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px; background-color:#3DB2FF;" class="badge text-white">selesai laundry</div>
                              @endif
                              @if ($item->status == 'barang_dikirim')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px; background-color:#3F0071;" class="badge text-white">barang dikirim</div>
                              @endif
                              @if ($item->status == 'barang_diterima')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px; background:#00A19D;" class="badge  text-white">barang diterima</div>
                              @endif
                          </td>
                          <td>
                              @if ($item->dibayar == 'dibayar')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-success text-white">dibayar</div>
                              @endif
                              @if ($item->dibayar == 'belum_dibayar')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-danger text-white">Belum Dibayar</div>
                              @endif
                              
                          </td>
                          <td class="">
                            <form action="{{route('entri.delete',$item->id)}}" method="POST">
                              @method('DELETE')
                              @csrf
                                
                                <a href="{{ route('entri.show',$item->id) }}">
                                  <i class="fas fa-eye" style="color: #3abaf4"></i>   
                                </a>&nbsp;|&nbsp;
                                <a href="{{ route('entri.edit',$item->id) }}">
                                  <i class="fas fa-edit" style="color: #f39c12"></i>   
                                </a>&nbsp;|
                                 <button type="submit" class=" " style="border: none; background-color: transparent;"><i class="fas fa-trash text-danger"></i></button> 
                            </form>    
                          </td>
                          
                        </tr>
                        @endforeach
                        
                      </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-left">
                    
                        {{ $transaksi->links() }}
                    
                </div>
            </div>
            
        </div>
        
    </section>
@endsection