@extends('include/mainlayout')
@section('title', 'Dashboard')
@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

     <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Jumlah Karyawan Training</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Jumlah Karyawan ADMP</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-3">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Jumlah Karyawan Coaching</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>                     
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-3">

              <div class="card info-card cost-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Jumlah Biaya Training</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>                     
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          <div class="col-lg-12">
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i>  PELATIHAN</h5>
              <!-- Table with stripped rows -->
              <div class="container">
            
               <form id="filterForm">
                    <div class="row" method="GET" action="dashboard/search">
                        <div class="col-md-2 mb-2">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $startDate ?? '' }}">
                        </div>

                        <div class="col-md-2 mb-2">
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $endDate ?? '' }}">
                        </div>

                        <div class="col-md-3 mb-2">
                            <label for="min_biaya">Min Biaya:</label>
                            <input type="number" id="min_biaya" name="min_biaya" class="form-control" value="{{ $minBiaya ?? '' }}">
                        </div>

                        <div class="col-md-3 mb-2">
                            <label for="max_biaya">Max Biaya:</label>
                            <input type="number" id="max_biaya" name="max_biaya" class="form-control" value="{{ $maxBiaya ?? '' }}">
                        </div>

                        <div class="col-md-2 mb-2">
                        <label for="end_date"></label><br>
                            <button type="submit" id="searchBtn" class="btn btn-primary btn-sm">
                              <i class="fas fa-filter"></i> Filter
                          </button>
                        </div>
                    </div>
                </form>
                  <div class = "">
                  <div class= "col-md-3 mb-4">
                  <label for="statusFilterPelatihan">Status:</label>
                  <select id="statusFilterPelatihan" class="form-select">
                      <option value="">All</option>
                      <option value="Create">Create</option>
                      <option value="Pending Atasan">Pending Atasan</option>
                      <option value="Pending HR:PD">Pending HR:PD</option>
                      <option value="Pending Manager">Pending Manager</option>
                      <option value="Pending Direksi">Pending Direksi</option>
                      <option value="Pending HRGA">Pending HRGA</option>
                      <option value="Revisi Atasan">Revisi Atasan</option>
                      <option value="Revisi HR:PD">Revisi HR:PD</option>
                      <option value="Revisi Manager">Revisi Manager</option>
                      <option value="Revisi Direksi">Revisi Direksi</option>
                      <option value="Revisi HRGA">Revisi HRGA</option>
                      <option value="Aprroved">Approved</option>
                  </select>
                  </div>
              
              <table class="table dt_pelatihan" id="dt_pelatihan">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">divisi</th>
                    <th scope="col">Jenis Pelatihan</th>
                    <th scope="col">Nama Pelatihan</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
             
                @foreach($pelatihanData as $no => $pelatihan)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pelatihan->nrp }}</td>
                    <td>{{ $pelatihan->username}}</td>
                    <td>{{ $pelatihan->divisi}}</td>
                    <td>{{ $pelatihan->jenis }}</td>
                    <td>{{ $pelatihan->nama }}</td>
                    {{-- <td class="truncate-text">{{ $pelatihan->informasi}}</td> --}}
                    <td>{{ $pelatihan->waktu }}</td>
                    <td>{{ $pelatihan->tempat }}</td>
                    <td>{{ $pelatihan->biaya }}</td>
                    <td>
                        @if($pelatihan->kode_status == 1)
                            <span class="badge rounded-pill text-bg-primary">Create</span>
                        @elseif($pelatihan->kode_status == 2)
                            <span class="badge rounded-pill text-bg-info text-start">Pending Atasan</span>
                        @elseif($pelatihan->kode_status == 3)
                            <span class="badge rounded-pill text-bg-info text-start">Pending HR:PD</span>
                        @elseif($pelatihan->kode_status == 4)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>Manager</span>
                        @elseif($pelatihan->kode_status == 5)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>Direksi</span>
                        @elseif($pelatihan->kode_status == 6)
                            <span class="badge rounded-pill text-bg-info text-start">Pending<br>HRGA</span>
                        @elseif($pelatihan->kode_status == 7)
                            <span class="badge rounded-pill bg-success text-light">Aprroved</span>
                        @elseif($pelatihan->kode_status == 8)
                            <span class="badge rounded-pill bg-danger text-start">Reject</span>
                        @elseif($pelatihan->kode_status == 9)
                            <span class="badge rounded-pill text-bg-warning text-start">Revisi Atasan</span>
                        @elseif($pelatihan->kode_status == 10)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi HR:PD</span>
                        @elseif($pelatihan->kode_status == 11)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
                        @elseif($pelatihan->kode_status == 12)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Direksi</span>
                        @elseif($pelatihan->kode_status == 13)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>HRGA</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Unknown Status</span>
                        @endif
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

     

        {{-- COACHING --}}
        <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"> </i>  Coaching </h5>
            
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
                  <label for="statusFilterCoaching">Status:</label>
                  <select id="statusFilterCoaching" class="form-select">
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
              <table class="table dt_coaching" id="dt_coaching">
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

 
<script>
// Initialize DataTable for Pelatihan
var pelatihanTable = $('#dt_pelatihan').DataTable({
    // Your DataTable configuration for Pelatihan table
});

// Initialize DataTable for ADMP
var admpTable = $('#dt_admp').DataTable({
    // Your DataTable configuration for ADMP table
});

// Initialize DataTable for ADMP
var coachingTable = $('#dt_coaching').DataTable({
    // Your DataTable configuration for ADMP table
});

// Handle filter change for Pelatihan
$('#statusFilterPelatihan').on('change', function () {
    var statusValue = $(this).val();
    pelatihanTable.column(9).search(statusValue).draw();
});

// Handle filter change for ADMP
$('#statusFilterADMP').on('change', function () {
    var statusValue = $(this).val();
    admpTable.column(9).search(statusValue).draw();
});

$('#statusFilterCoaching').on('change', function () {
    var statusValue = $(this).val();
    coachingTable.column(9).search(statusValue).draw();
});
</script>

@endsection