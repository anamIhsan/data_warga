@extends('layouts.app')

@section('title')
    Data Kartu Keluarga
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users"></i>  
                        Anggota Kartu Keluarga
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No KK | Kepala Keluarga</label>
                        <div class="col-sm-5">
                          <input disabled="disabled" class="form-control" placeholder="{{ $kk->no_kk }}">
                        </div>
                        <div class="col-sm-5">
                            <input disabled="disabled" class="form-control" placeholder="{{ $kk->residents->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input disabled="disabled" class="form-control" placeholder="RT {{ $kk->residents->rt }} / RW {{ $kk->residents->rw }}.( {{ $kk->residents->desa }} - {{ $kk->kabupaten }} - {{ $kk->provinsi }} )">
                      </div>
                    </div>
                    @if (Auth::user()->roles != 'WATCHER')
                        <form action="{{ route('kelola_data-data_kartu_keluarga_anggota_store', $kk->id) }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Anggota</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="familyCards_id" value="{{ $kk->id }}">
                                    <select name="residents_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" disabled="disabled">-- Pilih Anggota --</option>
                                        @foreach ($residents as $resident)
                                            <option value="{{ $resident->id }}">{{ $resident->nik }} - {{ $resident->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select name="hubungan" class="form-control ">
                                        <option disabled="disabled" selected="selected" class="form-control ">-- Hubungan Keluarga --</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    @endif
                    <br>
                    <div class="container-fluid">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        <table class="table table-bordered table-striped col-sm-11">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis kelamin</th>
                                    <th>Hubungan Keluarga</th>
                                    @if (Auth::user()->roles != 'WATCHER')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($members as $data)
                                    @if ($data->familyCards_id === $kk->id)
                                        <tr>
                                            <td>{{ $data->residents->nik }}</td>
                                            <td>{{ $data->residents->name }}</td>
                                            <td>
                                                {{ $data->residents->gender }}
                                                @if ($data->residents->status === 'meninggal')
                                                    <span class="right badge badge-danger">{{ $data->residents->status }}</span>  
                                                @elseif ($data->residents->status === 'pindah')
                                                    <span class="right badge badge-warning">{{ $data->residents->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->hubungan }}</td>
                                            @if (Auth::user()->roles != 'WATCHER')
                                                <td>
                                                    @if ($data->hubungan != 'Kepala Keluarga')
                                                    <a class="btn btn-danger btn-sm" 
                                                    href="#deleteData-{{ $data->residents_id }}"
                                                    data-toggle="modal" 
                                                    data-toggle="tooltip"    
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                                {{-- Modal Delete Data --}}
                                                <div id="deleteData-{{ $data->residents_id }}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form class="d-inline-block" action="{{ route('kelola_data-data_kartu_keluarga_anggota_delete', $data->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-header">						
                                                                    <h4 class="modal-title">Delete Anggota Keluarga</h4>
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
                                            @endif
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">
                                            No data available in table
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('kelola_data-data_kartu_keluarga') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
    
    <script>
        $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()
    
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    
        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
            format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
            ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
            },
            function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
    
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
    
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
    
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
    
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    
        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    
        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false
    
        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)
    
        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })
    
        myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
        })
    
        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })
    
        myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })
    
        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
        })
    
        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
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
    {{-- alert success failed --}}
    <script>
        if ({{session()->has('notification-success-failed')}}) {
            Swal.fire({
                icon: 'error',
                title: 'FAILED',
                text: 'Istri harus perempuan!'
            })
        }    
    </script>
@endpush