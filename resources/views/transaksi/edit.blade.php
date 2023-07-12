@extends('layouts.layout')
@section('content')

<div class="clearfix"></div>

<div class="row">
<!-- form input mask -->
<div class="col-md-12 col-sm-12  ">
<div class="x_panel">
  <div class="x_title">
    <h2>Form Edit Transaksi</h2>
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
    <br/>
    <form class="form-horizontal form-label-left" method="post" action="{{ route('transaksi.update', $dataTransaksi->id_transaksi) }}">
      @method('PUT')
    	@csrf
      <div class="form-group row">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Fakultas</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <select class="form-control" name="id_barang">
            @foreach($dataBarang as $data)
              <option value="{{ $data->id_barang }}" @if( $dataTransaksi->id_barang == $data->id_barang) selected="" @endif>{{ $data->nama_barang }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jumlah Terjual</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <input type="text" class="form-control" name="jmlh_jual" autocomplete="off" autofocus="" required="" value="{{ $dataTransaksi->jmlh_jual }}">
        </div>
      </div>
      <div class="ln_solid"></div>

      <div class="form-group row">
        <div class="col-md-9 offset-md-3">
          <button type="reset" class="btn btn-primary">Reset</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>
</div>
<!-- /form input mask -->

@endsection