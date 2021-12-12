@extends('layouts.app')

@section('title')
    Data Penduduk
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
                                Data Penduduk
                            </h3>
                        </div>
                        <div class="card-body">
                            @if (Auth::user()->roles != 'WATCHER')
                                <a class="btn btn-primary btn-md mb-2" href="{{ route('kelola_data-data_penduduk_create') }}">
                                    <i class="fas fa-edit"></i>
                                    Tambah Data
                                </a>
                                <a 
                                    class="btn btn-primary btn-md mb-2" 
                                    href="#exampleModalLabel"
                                    data-toggle="modal" 
                                    data-toggle="tooltip"
                                >
                                    <i class="fas fa-print"></i>
                                    Import Data
                                </a>
                                <form method="post" action="{{ route('resident.import') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    
                                    {{-- Modal Import Data --}}
                                    <div id="exampleModalLabel" class="modal fade">
                                        <div class="modal-dialog col-sm-12">
                                            <div class="modal-content col-sm-12">
                                                <div class="modal-header">						
                                                    <h4 class="modal-title">Import Excel</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Pilih file excel</label>
                                                    <div class="form-group">
                                                        <input type="file" name="file" required="required">
                                                    </div>
                                                    <p class="text-warning"><small><a href="{{ route('resident.export') }}">Klik Untuk Mendownload Template Resident</a></small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Import</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>Alamat</th>
                                        <th>No KK</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1
                                    @endphp
                                    @forelse ($residents as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->gender }}</td>
                                        <td>{{ $data->desa }} - RT {{ $data->rt }} / RW {{ $data->rw }}.</td>
                                        <td>
                                            @if ($data->no_kk)
                                                {{ $data->familyCard->no_kk }}
                                            @else
                                                <small class="text-muted">Belum terdaftar di KK</small>
                                            @endif
                                        </td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" 
                                                href="#showData-{{ $data->id }}" 
                                                data-toggle="modal" 
                                                data-toggle="tooltip"
                                            >
                                                <i class="fas fa-eye">
                                                </i>
                                            </a>
                                            {{-- Modal Show Data --}}
                                            <div id="showData-{{ $data->id }}" class="modal fade">
                                                <div class="modal-dialog col-sm-12">
                                                    <div class="modal-content col-sm-12">
                                                        <div class="modal-header bg-primary">						
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-user"></i>
                                                                Detail Penduduk
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Status</th>
                                                                <td>
                                                                    @if ($data->status === 'MENINGGAL')
                                                                        <span class="right badge badge-danger">{{ $data->status }}</span>  
                                                                    @elseif ($data->status === 'PINDAH')
                                                                        <span class="right badge badge-warning">{{ $data->status }}</span>
                                                                    @else
                                                                        <span class="right badge badge-success">{{ $data->status }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>NIK</th>
                                                                <td>{{ $data->nik }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kepala Keluarga</th>
                                                                <td>
                                                                    @if ($data->no_kk)
                                                                    {{ $data->familyCard->residents->name }}
                                                                    @else
                                                                        <small class="text-muted">Belum terdaftar di KK</small>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>{{ $data->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TTL</th>
                                                                <td>{{ $data->tempat_lahir }} / {{ $data->tanggal_lahir }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Jenis Kelamin</th>
                                                                <td>{{ $data->gender }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Alamat</th>
                                                                <td>{{ $data->desa }} - RT {{ $data->rt }} / RW {{ $data->rw }}.</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Agama</th>
                                                                <td>{{ $data->religion }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status Kawin</th>
                                                                <td>{{ $data->status_perkawinan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Pekerjaan</th>
                                                                <td>{{ $data->pekerjaan }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->roles != 'WATCHER')
                                                <a class="btn btn-success btn-sm" href="{{ route('kelola_data-data_penduduk_edit', $data->id) }}">
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
                                            @endif
                                        </td>
                                        {{-- Modal Delete Data --}}
                                        <div id="deleteData-{{ $data->id }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="d-inline-block" action="{{ route('kelola_data-data_penduduk_delete', $data->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">						
                                                            <h4 class="modal-title">Delete Data Penduduk</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">					
                                                            <p>Are you sure you want to delete data  <strong>{{ $data->name }}</strong> ?</p>
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
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                Data Kosong
                                            </td>
                                        </tr>
                                    @endforelse
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