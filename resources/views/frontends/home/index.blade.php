@extends('layouts.app')

@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid mt-3">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
          </div>
          <div class="col-6 d-flex justify-content-end">
            <a href="{{ route('excel') }}" class="fs-6 m-0 font-weight-bold btn btn-success">Xuất FileExcel</a>
          </div>
        </div>
      </div>
      @livewire('home')
    </div>
  </div>
</div>
@endsection
