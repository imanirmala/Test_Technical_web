@extends('layouts.layout')
@section('content')

<div class="">
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tabel barang</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>

        </div>
        <div class="x_content">

          <a href="{{ route('barang.create') }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
            <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Barang</th>
                          <th>Nama Barang</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $d)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $d->nama_jenis }}</td>
                          <td>{{ $d->nama_barang }}</td>
                          <td>
                            <a href="{{ route('barang.edit', $d->id_barang) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                            <form method="post" action="{{ route('barang.destroy', $d->id_barang) }}">
                              @csrf
                              @method('DELETE')
                              
                              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection