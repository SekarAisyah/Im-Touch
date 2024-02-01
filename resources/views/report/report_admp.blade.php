@extends('include/mainlayout')
@section('title', 'ADMP')
@section('content')
    <div class="pagetitle">
      <h1> Laporan ADMP</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Laporan ADMP</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i>  Laporan ADMP</h5>
              
              <!-- Modal View -->
                <div class="modal fade modal-view" id="viewadmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View admp</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="admp-details">
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
                                        <label for="nama_admp">Nama admp </label>
                                        <span id="nama_admp"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="jenis_admp">Jenis admp:</label>
                                        <span id="jenis_admp"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="informasi_admp">Informasi admp:</label>
                                        <span id="informasi_admp"></span>
                                    </div>
                                   
                                    <div class="detail">
                                        <label for="waktu_admp">Waktu admp :</label>
                                       <span id="waktu_admp"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="tempat_admp">Tempat admp :</label>
                                        <span id="tempat_admp"></span>
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
                <div class="row" method="GET" action="report-admp/search">
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
              <table class="table dt_admp" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">divisi</th>
                    <th scope="col">Jenis admp</th>
                    <th scope="col">Nama admp</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
                @foreach($admpData as $no => $admp)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $admp->nrp }}</td>
                    <td>{{ $admp->username}}</td>
                    {{-- <td>{{ $admp->departemen}}</td> --}}
                    <td>{{ $admp->divisi}}</td>
                    <td>{{ $admp->jenis }}</td>
                    <td>{{ $admp->nama }}</td>
                    {{-- <td class="truncate-text">{{ $admp->informasi}}</td> --}}
                    <td>{{ $admp->waktu }}</td>
                    <td>{{ $admp->tempat }}</td>
                    <td>{{ $admp->biaya }}</td>
                    <td>
                        @if($admp->kode_status == 1)
                            <span class="badge rounded-pill text-bg-primary">Create</span>
                        @elseif($admp->kode_status == 2)
                            <span class="badge rounded-pill text-bg-info text-start">Pending Atasan</span>
                        @elseif($admp->kode_status == 3)
                            <span class="badge rounded-pill text-bg-info text-start">Pending HR:PD</span>
                        @elseif($admp->kode_status == 4)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>Manager</span>
                        @elseif($admp->kode_status == 5)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>Direksi</span>
                        @elseif($admp->kode_status == 6)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>HRGA</span>
                        @elseif($admp->kode_status == 7)
                            <span class="badge rounded-pill bg-success text-light">Done</span>
                        @elseif($admp->kode_status == 8)
                            <span class="badge rounded-pill bg-danger text-start">Reject</span>
                        @elseif($admp->kode_status == 9)
                            <span class="badge rounded-pill text-bg-warning text-start">Revisi Atasan</span>
                        @elseif($admp->kode_status == 10)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi HR:PD</span>
                        @elseif($admp->kode_status == 11)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
                        @elseif($admp->kode_status == 12)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Direksi</span>
                        @elseif($admp->kode_status == 13)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>HRGA</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Unknown Status</span>
                        @endif
                    </td>
                    <td>  
                     
                <div class="dropdown">
                <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewadmpModal" data-id="{{ $admp->id }}"><i class="fa fa-expand"></i>View</a></li>          
                </ul>
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
var admpId; 
$('.view').click(function() {
    admpId = $(this).data('id');
     $('#viewadmpModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/admp/get') }}/' + admpId,
        success: function(response) {
            $('#viewadmpModal').find('#nrp').text(response.nrp);
            $('#viewadmpModal').find('#name').text(response.name);
            $('#viewadmpModal').find('#jabatan').text(response.jabatan);
            $('#viewadmpModal').find('#departemen').text(response.departemen);
            $('#viewadmpModal').find('#divisi').text(response.divisi);
            $('#viewadmpModal').find('#jenis_admp').text(response.jenis);
            $('#viewadmpModal').find('#informasi_admp').text(response.informasi);
            $('#viewadmpModal').find('#nama_admp').text(response.nama);
            $('#viewadmpModal').find('#waktu_admp').text(response.waktu);
            $('#viewadmpModal').find('#tempat_admp').text(response.tempat);
            $('#viewadmpModal').find('#biaya_admp').text(response.biaya);
            $('#viewadmpModal').find('#approval').text(response.send_name);
            $('#viewadmpModal').find('#revisi_desc').text(response.revisi_desc);
            $('#viewadmpModal').find('#revisi_by').text(response.revisi_name);
            $('#viewadmpModal').find('#reject_by').text(response.reject_name);
            $('#viewadmpModal').find('#reject_desc').text(response.reject_desc);
    
            $('#viewadmpModal').modal('show');
        },
        error: function(error) {
            // Tampilkan pesan kesalahan jika diperlukan
        }
    });
});

</script>
   

@endsection

