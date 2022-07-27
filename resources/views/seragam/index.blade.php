@extends('layouts.master')
@section('content')



<div class="modal fade" id="tambah-seragam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">tambah siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action={{url('/seragam/add')}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama barang</label> 
                <input type="text"  class="form-control" placeholder="" name="nama" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Harga barang</label>
                <input type="number"  class="form-control" placeholder="" name="harga" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Ukuran</label>
                <input type="text"  class="form-control" placeholder="" name="ukuran" autocomplete="off">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
</div>
</div>
</div>




@foreach ($datas as $data) 
<div class="modal fade" id="edit-seragam{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit data siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action={{url('/seragam/edit/'. $data->id)}} method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">nama barang</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="nama" value="{{ $data->nama }}">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">harga barang</label> 
                <input type="number"  class="form-control" placeholder="" name="harga" autocomplete="off" value="{{ $data->harga }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Ukuran</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="ukuran" value="{{ $data->ukuran }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
</div>
</div>
</div>
@endforeach


@foreach ($datas as $data)
<div class="modal fade" id="delete-seragam{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action={{ url('/seragam/delete/' . $data->id) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <center class="mt-3">
                        <h5>
                            apakah anda yakin ingin menghapus data ini?
                        </h5>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus!</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach





    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah-seragam">
        Tambah Data
    </button>

    <form class="d-flex"  method="GET"  action="{{ url('seragam/search') }}"  role="search" >
        <input class="form-control me-2" type="search" name="search"   placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

    <table class="table table-striped">
        <thead>
          <tr>
            <th>no</th>
            <th>nama</th>
            <th>harga</th>
            <th>ukuran</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
            @foreach ($datas as $data)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->harga }}</td>
            <td>{{ $data->ukuran }}</td>
            <td>
                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-seragam{{ $data->id }}">edit</i></a>
                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-seragam{{ $data->id }}">delete</i></a>
            </tr>
        </td>
            @endforeach

    
        </tbody>
      </table>



@endsection