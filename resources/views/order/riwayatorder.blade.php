@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-shopping-bag pr-2" style="font-size: 15px;"></i> <span>Riawayat Order</span>
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
                          <th scope="col">OUTLET</th>
                          <th scope="col">PAKET</th>
                          <th scope="col">HARGA</th>
                          {{-- <th scope="col">TANGGAL DIPESAN</th>
                          <th scope="col">BATAS DIAMBIL</th> --}}
                          <th scope="col">STATUS</th>
                          <th scope="col">PEMBAYARAN</th>
                          <th scope="col">ACTION</th>
                          {{-- <th scope="col">TANGGAL DIBAYAR</th> --}}
                          {{-- <th scope="col">ACTION</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transaksi as $item)
                            
                        <tr>
                          <th scope="row" class="text-center">{{$loop->iteration}}</th>
                          <td>{{$item->outlets->nama}}</td>
                          <td>{{$item->pakets->nama_paket}}</td>
                          <td>Rp. {{number_format($item->biaya)}}</td>
                          {{-- <td>{{$item->tgl}}</td>
                          <td>{{$item->batas_waktu}}</td> --}}
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
                                  @if ($item->status === 'barang_dikirim')
                                  <br>
                                       <button style="font-size: 10px; border-radius: 5px; border:none;" class="bg-dark text-white mt-2" type="submit">lacak pengiriman</button> 
                                  @endif
                              @endif
                              @if ($item->status == 'barang_diterima')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px; background:#00A19D;" class="badge  text-white">barang diterima</div>
                              @endif
                          </td>
                          <td>
                              @if ($item->dibayar == 'dibayar')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px;" class="badge bg-success text-white">dibayar</div>
                              @endif
                              @if ($item->dibayar == 'belum_dibayar')
                                    @if ($item->status == 'pending')
                                        <form action="{{ route('order.cancel',$item->id) }}" method="POST">
                                          @csrf
                                
                                          <button style="font-size: 10px; border-radius: 5px; border:none;" class="bg-danger text-white mt-2" type="submit">batalkan pesanan</button> 
                                        </form>
                                        
                                        
                                        @else
                                        <span style="font-size: 10px; padding: 5px; border-radius: 5px; opacity: 50%;" class="badge bg-danger text-white"  data-toggle="tooltip" data-placement="bottom" title="Pesanan dalam {{ $item->status }} tidak dapat dibatalkan">batalkan pesanan</span>
                                        <br>
                                        {{-- <a href="#"style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-danger text-white">batalkan pesanan</a> --}}
                                        
                                    @endif
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px;" class="badge bg-secondary">belum dibayar</div>
                              @endif
                          </td>
                          <td class="text-center">
                            {{-- <form action="{{route('order.show',$item->id)}}" method="POST"> --}}
                              @method('DELETE')
                              @csrf
                                
                                <a href="{{ route('order-showorder',$item->id) }}">
                                  <i class="fas fa-eye" style="color: #3abaf4"></i>&ensp;     
                                </a>
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