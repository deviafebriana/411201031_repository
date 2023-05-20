@extends('layout.template')
        
        <!-- START DATA -->
        @section('konten')
         <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h2>Tabel Barang</h2>
            <a href='{{ url('kurir') }}' class="btn btn-secondary">Logout</a>
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('bengkel') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('bengkel/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">ID</th>
                            <th class="col-md-4">Kode Barang</th>
                            <th class="col-md-2">Nama Barang</th>
                            <th class="col-md-2">Deskripsi</th>
                            <th class="col-md-2">Stok Barang</th>
                            <th class="col-md-2">Harga Barang</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->stok_barang }}</td>
                            <td>{{ $item->harga_barang }}</td>
                            <td>
                                <a href='{{ url('bengkel/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin ingin hapus data?')" class='d-inline' action="{{ url('bengkel/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                                
                            </td>
                        </tr>  
                        <?php $i++ ?>
                        @endforeach
                        
                    </tbody>
                </table>
               {{ $data->withQueryString()->links() }}
          </div>
          <!-- AKHIR DATA -->   
        @endsection
        
    