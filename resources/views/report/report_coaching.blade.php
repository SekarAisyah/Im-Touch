@extends('include/mainlayout')
@section('title', 'Coaching')
@section('content')
    <div class="pagetitle">
      <h1>Laporan Coaching</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Laporan Coaching</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"> </i>  Laporan Coaching </h5>
            
              <!-- Modal View -->
                <div class="modal fade modal-view" id="viewCoachingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View coaching</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="coaching-details">
                                    <div class="detail">
                                        <label for="nrp">NRP :</label>
                                        <span id="nrp"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="name">Nama:</label>
                                        <span id="name"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="jabatan">Jabatan:</label>
                                        <span id="jabatan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="departemen">Departemen:</label>
                                        <span id="departemen"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="divisi">divisi:</label>
                                        <span id="divisi"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="nama_coaching">Nama Coaching </label>
                                        <span id="nama_coaching"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="jenis_coaching">Jenis Coaching:</label>
                                        <span id="jenis_coaching"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="informasi_coaching">Informasi Coaching:</label>
                                        <span id="informasi_coaching"></span>
                                    </div>
                                   
                                    <div class="detail">
                                        <label for="waktu_coaching">Waktu Coaching :</label>
                                       <span id="waktu_coaching"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="tempat_coaching">Tempat Coaching :</label>
                                        <span id="tempat_coaching"></span>
                                    </div>
                                    
                                    <div class="detail">
                                        <label for="aprroval">Aprroval by :</label>
                                        <span id="approval"> </span>
                                    </div>
                                     <div class="detail">
                                        <label for="revisi_by">Revisi by:</label>
                                        <span id="revisi_by"> </span>
                                    </div>
                                    <div class="detail">
                                        <label for="revisi_desc">Keterangan Revisi :</label>
                                        <span id="revisi_desc"> </span>
                                    </div>
                                    <div class="detail">
                                        <label for="reject_by">Reject by :</label>
                                        <span id="reject_by"> </span>
                                    </div>
                                    <div class="detail">
                                        <label for="reject_desc">Keterangan Reject :</label>
                                        <span id="reject_desc"> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal View -->

            
              
              <!-- Table with stripped rows -->
              <div class="container">
              <form id="filterForm">
                <div class="row" method="GET" action="report-coaching/search">
                    <div class="col-md-3 mb-2">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $startDate ?? '' }}">
                    </div>

                    <div class="col-md-3 mb-2">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $endDate ?? '' }}">
                    </div>

                    <div class="col-md-4 mb-2">
                    <label for="end_date"></label><br>
                        <button type="submit" id="searchBtn" class="btn btn-primary btn-sm">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
                </form>
                  <div class = "">
                  <div class= "col-md-3 mb-4">
                  <label for="statusFilter">Status:</label>
                  <select id="statusFilter" class="form-select">
                      <option value="">All</option>
                      <option value="Create">Create</option>
                      <option value="Pending Atasan">Pending Atasan</option>
                      <option value="Pending HR:PD">Pending HR:PD</option>
                      <option value="Pending Manager">Pending Manager</option>
                      <option value="Pending Direksi">Pending Direksi</option>
                      <option value="6">Pending HRGA</option>
                       <option value=6>Pending HRGA</option>
                      <option value="Pending HRGA">Pending HRGA</option>
                      <option value="Revisi Atasan">Revisi Atasan</option>
                      <option value="Revisi HR:PD">Revisi HR:PD</option>
                      <option value="Revisi Manager">Revisi Manager</option>
                      <option value="Revisi Direksi">Revisi Direksi</option>
                      <option value="Revisi HRGA">Revisi HRGA</option>
                      <option value="Aprroved">Approved</option>
                  </select>
                  </div>
              <table class="table dt_coaching" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    {{-- <th scope="col">Departemen</th> --}}
                    <th scope="col">divisi</th>
                    <th scope="col">Jenis coaching</th>
                    <th scope="col">Nama coaching</th>
                    {{-- <th scope="col">Informasi coaching</th> --}}
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
                @foreach($coachingData as $no => $coaching)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $coaching->nrp }}</td>
                    <td>{{ $coaching->username}}</td>
                    {{-- <td>{{ $coaching->departemen}}</td> --}}
                    <td>{{ $coaching->divisi}}</td>
                    <td>{{ $coaching->jenis }}</td>
                    <td>{{ $coaching->nama }}</td>
                    {{-- <td class="truncate-text">{{ $coaching->informasi}}</td> --}}
                    <td>{{ $coaching->waktu }}</td>
                    <td>{{ $coaching->tempat }}</td>
                    <td>{{ $coaching->biaya }}</td>
                    <td>
                        @if($coaching->kode_status == 1)
                            <span class="badge rounded-pill text-bg-primary">Create</span>
                        @elseif($coaching->kode_status == 2)
                            <span class="badge rounded-pill text-bg-info text-start">Pending Atasan</span>
                        @elseif($coaching->kode_status == 3)
                            <span class="badge rounded-pill text-bg-info text-start">Pending HR:PD</span>
                        @elseif($coaching->kode_status == 4)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>Manager</span>
                        @elseif($coaching->kode_status == 5)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>Direksi</span>
                        @elseif($coaching->kode_status == 6)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>HRGA</span>
                        @elseif($coaching->kode_status == 7)
                            <span class="badge rounded-pill bg-success text-light">Done</span>
                        @elseif($coaching->kode_status == 8)
                            <span class="badge rounded-pill bg-danger text-start">Reject</span>
                        @elseif($coaching->kode_status == 9)
                            <span class="badge rounded-pill text-bg-warning text-start">Revisi Atasan</span>
                        @elseif($coaching->kode_status == 10)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi HR:PD</span>
                        @elseif($coaching->kode_status == 11)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
                        @elseif($coaching->kode_status == 12)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Direksi</span>
                        @elseif($coaching->kode_status == 13)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>HRGA</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Unknown Status</span>
                        @endif
                    </td>
                    <td>  
                     
                <div class="dropdown">
                <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                @if(auth()->user()->id_role == 0)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-paper-plane"></i> Send</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                    <li><a class="dropdown-item bi bi-file-pdf export" data-id="{{ $coaching->id }}" href="#"> Export PDF</a></li>               
                </ul>
                @elseif($coaching->kode_status == 1 && auth()->user()->id_role == 1)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-paper-plane"></i> Send</a></li>
                </ul>
                @elseif($coaching->kode_status == 9 && auth()->user()->id_role == 1)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($coaching->kode_status == 10 && auth()->user()->id_role == 2)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($coaching->kode_status == 11 && auth()->user()->id_role == 3)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                 @elseif($coaching->kode_status == 12 && auth()->user()->id_role == 4)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                 @elseif($coaching->kode_status == 13 && auth()->user()->id_role == 5)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($coaching->kode_status == 11 && auth()->user()->id_role == 3)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($coaching->kode_status == 2 && auth()->user()->id_role == 2)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>                </ul>
                @elseif($coaching->kode_status == 3 && auth()->user()->id_role == 3)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($coaching->kode_status == 4 && auth()->user()->id_role == 4)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($coaching->kode_status == 5 && auth()->user()->id_role == 5)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($coaching->kode_status == 6 && auth()->user()->id_role == 6)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                   <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($coaching->kode_status == 7)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item" href="/coaching_pdf"><i class="fa-solid fa-square-poll-vertical"></i> Export PDF</a></li>
                </ul>
                @else
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->id }}"><i class="fa fa-expand"></i>View</a></li>
                @endif
                </div>
              </td>
              </tr>
              @endforeach
              </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>


<script>
var myTable = $('#datatable').DataTable();
if (myTable) {
    myTable.destroy();
}

var dataTable = $('#datatable').DataTable({
   
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> Copy',
            className: 'btn btn-secondary',
        },
        {
            extend: 'excel',
            text: '<i class="bi bi-file-earmark-excel"></i> Excel',
            className: 'btn btn-success',
        },
        {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i> PDF',
            className: 'btn btn-danger',
        },
        {
            extend: 'print',
            text: '<i class="bi bi-printer"></i> print',
            className: 'btn btn-danger',
        }
       
    ]
});

$('#statusFilter').on('change', function () {
    var statusValue = $(this).val();
    dataTable.column(9).search(statusValue).draw();
});

//VIEW sekar
var coachingId; 
$('.view').click(function() {
    coachingId = $(this).data('id');
     $('#viewCoachingModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/coaching/get') }}/' + coachingId,
        success: function(response) {
            $('#viewCoachingModal').find('#nrp').text(response.nrp);
            $('#viewCoachingModal').find('#name').text(response.name);
            $('#viewCoachingModal').find('#jabatan').text(response.jabatan);
            $('#viewCoachingModal').find('#departemen').text(response.departemen);
            $('#viewCoachingModal').find('#divisi').text(response.divisi);
            $('#viewCoachingModal').find('#jenis_coaching').text(response.jenis);
            $('#viewCoachingModal').find('#informasi_coaching').text(response.informasi);
            $('#viewCoachingModal').find('#nama_coaching').text(response.nama);
            $('#viewCoachingModal').find('#waktu_coaching').text(response.waktu);
            $('#viewCoachingModal').find('#tempat_coaching').text(response.tempat);
            $('#viewCoachingModal').find('#biaya_coaching').text(response.biaya);
            $('#viewCoachingModal').find('#approval').text(response.send_name);
            $('#viewCoachingModal').find('#revisi_desc').text(response.revisi_desc);
            $('#viewCoachingModal').find('#revisi_by').text(response.revisi_name);
            $('#viewCoachingModal').find('#reject_by').text(response.reject_name);
            $('#viewCoachingModal').find('#reject_desc').text(response.reject_desc);
    
            $('#viewCoachingModal').modal('show');
        },
        error: function(error) {
            // Tampilkan pesan kesalahan jika diperlukan
        }
    });
});
    </script>
   

@endsection

