@extends('layout.main')

@section('title','Datatable')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="h3 mb-4 text-gray-800">Data Pegawai Laravel</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="" class="btn btn-success btn-icon-split tombol-tambah">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
            @include('flash::message')
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="yajra-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Perusahaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('employee.modal')
    @include('employee.script')
    <!-- /.container-fluid -->
    @endsection