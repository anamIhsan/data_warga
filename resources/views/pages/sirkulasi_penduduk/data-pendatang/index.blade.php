@extends('layouts.app')

@section('title')
    Data Pendatang
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title"> 
                                <i class="fas fa-table"></i> 
                                Data Pendatang
                            </h3>
                        </div>
                        <div class="card-body">
                            @if (Auth::user()->roles != 'WATCHER')
                                <a class="btn btn-primary btn-md mb-2" href="{{ route('sirkulasi_penduduk-data_pendatang_create') }}">
                                    <i class="fas fa-edit"></i>
                                    Tambah Data
                                </a>
                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tanggal Datang</th>
                                        <th>Pelapor</th>
                                        @if (Auth::user()->roles != 'WATCHER')
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1
                                    @endphp
                                    @foreach ($comes as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->residents->nik }}</td>
                                        <td>{{ $data->residents->name }}</td>
                                        <td>{{ $data->tanggal_datang }}</td>
                                        <td>{{ $data->resident->name }}</td>
                                        @if (Auth::user()->roles != 'WATCHER')
                                            <td>
                                                <a class="btn btn-success btn-sm" href="{{ route('sirkulasi_penduduk-data_pendatang_edit', $data->id) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" 
                                                    href="#deleteData-{{ $data->id }}"
                                                    data-toggle="modal" 
                                                    data-toggle="tooltip"    
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        @endif
                                        {{-- Modal Delete Data --}}
                                        <div id="deleteData-{{ $data->id }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="d-inline-block" action="{{ route('sirkulasi_penduduk-data_pendatang_delete', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                        <div class="modal-header">						
                                                            <h4 class="modal-title">Delete Data Kematian</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">					
                                                            <p>Are you sure you want to delete data <strong>{{ $data->residents->name }}</strong> ?</p>
                                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                            <button type="submit" class="btn btn-danger btn-small">delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>

    <script src="{{ asset('dist/js/alert/sweetalert2.min.js') }}"></script>
    {{-- alert success add --}}
    <script>
        if ({{session()->has('notification-success-add')}}) {
            Swal.fire({
                icon: 'success',
                title: 'SUCCESS',
                text: 'Data berhasil di tambah!'
                })
        }    
    </script>
    {{-- alert success edit --}}
    <script>
        if ({{session()->has('notification-success-edit')}}) {
            Swal.fire({
                icon: 'success',
                title: 'SUCCESS',
                text: 'Data berhasil di edit!'
                })
        }    
    </script>
    {{-- alert success delete --}}
    <script>
        if ({{session()->has('notification-success-delete')}}) {
            Swal.fire({
                icon: 'success',
                title: 'SUCCESS',
                text: 'Data berhasil di hapus!'
                })
        }
    </script>
@endpush