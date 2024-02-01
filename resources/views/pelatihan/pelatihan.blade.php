@extends('include/mainlayout')
@section('title', 'Pelatihan')
@section('content')
    <div class="pagetitle">
      <h1>Pelatihan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Pelatihan</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> Pelatihan</h5>
              <button type="button" class="btn bi bi-plus btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pelatihanModal"> Add Pelatihan</button>
              <br><br>

              <!-- Modal View -->
                <div class="modal fade modal-view" id="viewPelatihanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View Pelatihan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="pelatihan-details">
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
                                        <label for="nama_pelatihan">Nama Pelatihan </label>
                                        <span id="nama_pelatihan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="jenis_pelatihan">Jenis Pelatihan:</label>
                                        <span id="jenis_pelatihan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="informasi_pelatihan">Informasi Pelatihan:</label>
                                        <span id="informasi_pelatihan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="narasumber">Narasumber:</label>
                                        <span id="narasumber">d</span>
                                    </div>
                                    <div class="detail">
                                        <label for="alasan_pelatihan">Alasan Pelatihan:</label>
                                        <span id="alasan_pelatihan">d</span>
                                    </div>
                                    <div class="detail">
                                        <label for="sharing_pelatihan">Sharing Pelatihan:</label>
                                       <span id="sharing_pelatihan" class="info-text"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="waktu_pelatihan">Waktu Pelatihan :</label>
                                       <span id="waktu_pelatihan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="tempat_pelatihan">Tempat Pelatihan :</label>
                                        <span id="tempat_pelatihan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="biaya_pelatihan">Biaya Pelatihan:</label>
                                        <span id="biaya_pelatihan">Rp. </span>
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

              <!-- Modal Add -->
                <div class="modal fade modal_add" id="pelatihanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mode="add">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="btn-add">Add Pelatihan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> --}}
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" name="action_flag" id="action_flag" />
                        <input type="hidden" name="tgl_mulai" id="tgl_mulai" />
                        {{-- <input type="hidden" name="last_seq" id="last_seq" value="{{{$last_seq}}}" /> --}}

                        <form class="row g-3 needs-validation" method="POST" action="/pelatihan/create">
                        @csrf
                            <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control" id="nrp-dropdown" name="nrp-dropdown">
                                    <option value="" selected>Select NRP</option>
                                    @foreach ($nrpOptions as $nrp)
                                        <option value="{{ $nrp->nrp }}">{{ $nrp->nrp }}</option>
                                    @endforeach
                                </select>
                                <label for="nrp">NRP <span style="color:red">*</span></label>
                            </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" id="name-add" name="name-add" placeholder="Name">
                                <label for="message-text">Nama </label>
                                
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="jabatan-add" name="jabatan-add" placeholder="Jabatan">
                                <label for="message-text">Jabatan </label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="departemen-add" name="departemen-add" placeholder="Password">
                                <label for="message-text">Departemen </label>
                            </div>
                            </div>
                             <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="divisi-add" name="divisi-add" placeholder="Password">
                                <label for="message-text">divisi</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <select class="form-control" id="jenis_pelatihan" name="jenis_pelatihan">
                                    <option value="pelatihan1">Pelatihan 1</option>
                                    <option value="pelatihan2">Pelatihan 2</option>
                                    <option value="pelatihan3">Pelatihan 3</option>
                                </select>
                             <label for="jenis_pelatihan">Jenis Pelatihan<span style="color:red">*</span></label>
                             
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="informasi_pelatihan" name="informasi_pelatihan" style="height: 100px;"></textarea>
                                <label for="message-text">Informasi Pelatihan </span></label>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nama_pelatihan_add" name="nama_pelatihan_add" placeholder="nama_pelatihan_add" required>
                                <label for="nama_pelatihan_add"> Nama Pelatihan <span style="color:red">*</span></label>
                                
                            </div>
                            </div>
                             <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Narasumber" >
                                <label for="message-text">Narasumber</span></label>
                            </div>
                            </div>
                            
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="alasan_pelatihan" name="alasan_pelatihan" style="height: 100px;" required></textarea>
                                <label for="message-text">Alasan Permohonan Pelatihan <span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="sharing_pelatihan" name="sharing_pelatihan" style="height: 100px;"></textarea>
                                <label for="message-text">Setelah Melakukan Pelatihan, Harus Sharing Kepada :</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="waktu_pelatihan" name="waktu_pelatihan" placeholder="Nama Pelatihan" required>
                                <label for="nama pelatihan">Waktu Pelatihan<span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="tempat_pelatihan" name="tempat_pelatihan" placeholder="Nama Pelatihan" required>
                                <label for="nama pelatihan">Tempat Pelatihan<span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="biaya_pelatihan" name="biaya_pelatihan" placeholder="Nama Pelatihan" required>
                                <label for="nama pelatihan">Biaya Pelatihan<span style="color:red">*</span></label>
                            </div>
                            </div>    
                         </form>             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-yes-add">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
              {{-- End Modal Add --}}

              <!--begin::Modal Revisi-->
              <div class="modal fade modal_revisi" id="revisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Revisi Pelatihan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form class="kt-form kt-form--label-right form_revisi" action="/pelatihan/revisi"  method="POST" enctype="multipart/form-data" autocomplete="off">
                                  @csrf
                                  <div class="form-group">
                                      <label for="message-text" class="form-control-label">Pesan Revisi Pelatihan <span style="color:red">*</span></label>
                                      <textarea class="form-control" id="revisi" name="revisi" rows="8"></textarea>
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="btn-yes-revisi">Kirim</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!--end::Modal Revisi-->

              <!--begin::Modal Reject-->
              <div class="modal fade modal_reject" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Reject Pelatihan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form class="kt-form kt-form--label-right form_reject" action="/pelatihan/reject"  method="POST" enctype="multipart/form-data" autocomplete="off">
                                  @csrf
                                  <div class="form-group">
                                      <label for="message-text" class="form-control-label">Pesan Reject Pelatihan <span style="color:red">*</span></label>
                                      <textarea class="form-control" id="reject" name="reject" rows="8"></textarea>
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="btn-yes-reject">Kirim</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!--end::Modal Revisi-->
              
              <!-- Table with stripped rows -->
              <div class="container">
              <table class="table dt_pelatihan" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    {{-- <th scope="col">Departemen</th> --}}
                    <th scope="col">divisi</th>
                    <th scope="col">Jenis Pelatihan</th>
                    <th scope="col">Nama Pelatihan</th>
                    {{-- <th scope="col">Informasi Pelatihan</th> --}}
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
                @foreach($pelatihanData as $no => $pelatihan)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pelatihan->nrp }}</td>
                    <td>{{ $pelatihan->username}}</td>
                    {{-- <td>{{ $pelatihan->departemen}}</td> --}}
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
                            <span class="badge rounded-pill bg-success text-light">Done</span>
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
                    <td>  
                     
                <div class="dropdown">
                <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                @if(auth()->user()->id_role == 0)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-paper-plane"></i> Send</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                    <li><a class="dropdown-item bi bi-file-pdf export" data-id="{{ $pelatihan->id }}" href="#"> Export PDF</a></li>               
                </ul>
                @elseif($pelatihan->kode_status == 1 && auth()->user()->id_role == 1)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-paper-plane"></i> Send</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 9 && auth()->user()->id_role == 1)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 10 && auth()->user()->id_role == 2)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 11 && auth()->user()->id_role == 3)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                 @elseif($pelatihan->kode_status == 12 && auth()->user()->id_role == 4)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                 @elseif($pelatihan->kode_status == 13 && auth()->user()->id_role == 5)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 11 && auth()->user()->id_role == 3)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#pelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 2 && auth()->user()->id_role == 2)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>                </ul>
                @elseif($pelatihan->kode_status == 3 && auth()->user()->id_role == 3)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 4 && auth()->user()->id_role == 4)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 5 && auth()->user()->id_role == 5)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 6 && auth()->user()->id_role == 6)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                   <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $pelatihan->id }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                </ul>
                @elseif($pelatihan->kode_status == 7)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
                    <li><a class="dropdown-item bi bi-file-pdf export" data-id="{{ $pelatihan->id }}" href="#"> Export PDF</a></li>
                    {{-- <li><a class="dropdown-item " href="/pelatihan_pdf" data-id="{{ $pelatihan->id }}"><i class="fa-solid fa-square-poll-vertical"></i> Export PDF</a></li> --}}
                </ul>
                @else
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->id }}"><i class="fa fa-expand"></i>View</a></li>
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
  
    {{-- <script src="app/javascript/pelatihan.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
        $('#datatable').DataTable();});
    </script>

<script>

$(document).ready(function() {

    $('#nrp-dropdown').on('change', function() {
        var selectedNrp = $(this).val();
    
        $.ajax({
            type: 'POST',
            url: '/pelatihan/get_user_info',
            data: { nrp: selectedNrp, _token: '{{ csrf_token() }}' },
            success: function(response) {
    
                $('#name-add').val(response.nama);
                $('#jabatan-add').val(response.jabatan);
                $('#departemen-add').val(response.departemen);
                $('#divisi-add').val(response.divisi);
            },
            error: function(error) {
                console.log('Ajax Error:', error);
            }
        });
    });
});


// Jumlah karakter data tabel
$(document).ready(function() {
    $('.truncate-text').each(function() {
        var maxLength = 100; 
        var originalText = $(this).text();

        if (originalText.length > maxLength) {
            var truncatedText = originalText.substring(0, maxLength) + '...';
            $(this).text(truncatedText);
        }
    });
});

//VIEW sekar
var pelatihanId; 
$('.view').click(function() {
    pelatihanId = $(this).data('id');
     $('#viewPelatihanModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/pelatihan/get') }}/' + pelatihanId,
        success: function(response) {
            $('#viewPelatihanModal').find('#nrp').text(response.nrp);
            $('#viewPelatihanModal').find('#name').text(response.name);
            $('#viewPelatihanModal').find('#jabatan').text(response.jabatan);
            $('#viewPelatihanModal').find('#departemen').text(response.departemen);
            $('#viewPelatihanModal').find('#divisi').text(response.divisi);
            $('#viewPelatihanModal').find('#jenis_pelatihan').text(response.jenis);
            $('#viewPelatihanModal').find('#informasi_pelatihan').text(response.informasi);
            $('#viewPelatihanModal').find('#nama_pelatihan').text(response.nama);
            $('#viewPelatihanModal').find('#narasumber').text(response.narasumber);
            $('#viewPelatihanModal').find('#alasan_pelatihan').text(response.alasan);
            $('#viewPelatihanModal').find('#sharing_pelatihan').text(response.sharing);
            $('#viewPelatihanModal').find('#waktu_pelatihan').text(response.waktu);
            $('#viewPelatihanModal').find('#tempat_pelatihan').text(response.tempat);
            $('#viewPelatihanModal').find('#biaya_pelatihan').text(response.biaya);
            $('#viewPelatihanModal').find('#approval').text(response.send_name);
            $('#viewPelatihanModal').find('#revisi_desc').text(response.revisi_desc);
            $('#viewPelatihanModal').find('#revisi_by').text(response.revisi_name);
            $('#viewPelatihanModal').find('#reject_by').text(response.reject_name);
            $('#viewPelatihanModal').find('#reject_desc').text(response.reject_desc);
    
            $('#viewPelatihanModal').modal('show');
        },
        error: function(error) {
            // Tampilkan pesan kesalahan jika diperlukan
        }
    });
});

//EDIT
var pelatihanId; 
$('.edit').click(function() {
    pelatihanId = $(this).data('id');
     $('#pelatihanModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/pelatihan/get') }}/' + pelatihanId,
        success: function(response) {
           
            $('#pelatihanModal').find('#jenis_pelatihan').val(response.jenis);
            $('#pelatihanModal').find('#informasi_pelatihan').val(response.informasi);
            $('#pelatihanModal').find('#nama_pelatihan').val(response.nama);
            $('#pelatihanModal').find('#narasumber').val(response.narasumber);
            $('#pelatihanModal').find('#alasan_pelatihan').val(response.alasan);
            $('#pelatihanModal').find('#sharing_pelatihan').val(response.sharing);
            $('#pelatihanModal').find('#waktu_pelatihan').val(response.waktu);
            $('#pelatihanModal').find('#tempat_pelatihan').val(response.tempat);
            $('#pelatihanModal').find('#biaya_pelatihan').val(response.biaya);
        
            $('#pelatihanModal').attr('data-mode', 'edit');
            $('#pelatihanModal').modal('show');
        },
        error: function(error) {
            // Tampilkan pesan kesalahan jika diperlukan
        }
    });
});

$(document).ready(function() {
$('#btn-yes-add').click(function() {
    var mode = $('#pelatihanModal').data('mode');
    
    if (mode === 'add') {
        $.ajax({
            type: 'POST',
            url: '{{ url('/pelatihan/create') }}',
            data: $('form').serialize(),
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Pelatihan berhasil di tambahkan!',
                    }).then(() => {
                       location.reload()
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Pelatihan gagal di tambahkan.',
                    });
                }
            },
        });
    } else if (mode === 'edit') {  
        $.ajax({
            type: 'PUT',
            url: '{{ url('/pelatihan/myedit') }}/' + pelatihanId,
            data: $('form').serialize() + '&pelatihan_id=' + pelatihanId,
            success: function(response) {
                if (response.status === 'success') {
                    // Display a SweetAlert success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Pelatihan berhasil di edit!',
                    }).then(() => {
                        location.reload()
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Pelatihan gagal di edit.',
                    });
                }
            },
        });
    }

    $('#pelatihanModal').modal('hide');
    
});
});


function getStatusText(kodeStatus) {
    if (kode_status === 1) {
        return '<span class="badge rounded-pill text-bg-primary">Create</span>';
    } else if (kode_status === 2) {
        return '<span class="badge rounded-pill bg-warning text-dark">Revisi</span>';
    } else if (kode_status === 3) {
        return '<span class="badge rounded-pill text-bg-info text-start">Pending HRGA Manager</span>';
    } else {
        return 'Unknown Status';
    }
}

// Function untuk mengganti status di tabel
function replaceStatusInTable() {
    var rows = document.querySelectorAll('.dt_pelatihan tbody tr');
    rows.forEach(function(row) {
        var kodeStatus = row.querySelector('td:nth-child(8)').textContent; // Ambil kode_status dari kolom ke-8
        var statusText = getStatusText(kodeStatus); // Dapatkan teks status
        row.querySelector('td:nth-child(8)').innerHTML = statusText; // Ganti isi kolom dengan teks status yang sesuai
    });
}

// Panggil fungsi untuk mengganti status setelah tabel dimuat
document.addEventListener('DOMContentLoaded', function() {
    replaceStatusInTable();
});


//SEND
document.querySelectorAll('.send-link').forEach(function(link) {
   link.addEventListener('click', function(event) {
       event.preventDefault();
       var pelatihanId = this.getAttribute('data-id');

       Swal.fire({
           title: 'Konfirmasi',
           text: 'Yakin ingin mengirim data?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Ya, Kirim!',
           cancelButtonText: 'Batal'
       }).then((result) => {
           if (result.isConfirmed) {
               axios.post('{{ route('send.pelatihan') }}', {
                   pelatihan_id: pelatihanId
               })
               .then(function (response) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Sukses!',
                       text: response.data.message
                   }).then(() => {
                       location.reload();
                   });
               })
               .catch(function (error) {
                   Swal.fire({
                       icon: 'error',
                       title: 'Gagal!',
                       text: 'Terjadi kesalahan saat mengirim data.'
                   });
               });
           }
       });
   });
});

//EXPORT
document.querySelectorAll('.export').forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        var id = $(this).data('id');

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Export data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Kirim!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method: 'post',
                    url: '{{ url('pelatihan/exportoword') }}/' + id,
                    responseType: 'arraybuffer',
                })
                .then(function(response) {
                    const blob = new Blob([response.data], { type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' });
                    const link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'pelatihan.docx';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'File berhasil diunduh.'
                    });
                })
                .catch(function(error) {
                    // Handle error, e.g., show an error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat mengirim data.'
                    });
                });
            }
        });
    });
});


//DELETE
document.querySelectorAll('.delete').forEach(function(link) {
   link.addEventListener('click', function(event) {
       event.preventDefault();
       var pelatihanId = this.getAttribute('data-id');

       Swal.fire({
           title: 'Konfirmasi',
           text: 'Apakah Anda yakin akan menghapus data ini?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Ya, Kirim!',
           cancelButtonText: 'Batal'
       }).then((result) => {
           if (result.isConfirmed) {
               axios.post('{{ route('delete.pelatihan') }}', {
                   pelatihan_id: pelatihanId
               })
               .then(function (response) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Sukses!',
                       text: response.data.message
                   }).then(() => {
                       location.reload();
                   });
               })
               .catch(function (error) {
                   Swal.fire({
                       icon: 'error',
                       title: 'Gagal!',
                       text: 'Terjadi kesalahan saat mengirim data.'
                   });
               });
           }
       });
   });
});

//CETAK
document.querySelectorAll('.cetakpelatihan').forEach(function(link) {
   link.addEventListener('click', function(event) {
       event.preventDefault();
       var pelatihanId = this.getAttribute('data-id');

       Swal.fire({
           title: 'Konfirmasi',
           text: 'Export Data?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Ya, Kirim!',
           cancelButtonText: 'Batal'
       }).then((result) => {
           if (result.isConfirmed) {
               axios.get('{{ route('cetak.pelatihan') }}', {
                   pelatihan_id: pelatihanId
               })
               .then(function (response) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Sukses!',
                       text: response.data.message
                   }).then(() => {
                       location.reload();
                   });
               })
               .catch(function (error) {
                   Swal.fire({
                       icon: 'error',
                       title: 'Gagal!',
                       text: 'Terjadi kesalahan saat mengirim data.'
                   });
               });
           }
       });
   });
});

//REJECT
$('.reject').click(function() {
    var pelatihanId = $(this).data('id'); 

    $('#btn-yes-reject').click(function() {
        var data = $('.form_reject').serialize();

        $.ajax({
            type: 'POST',
            
            url: '/pelatihan/reject?pelatihan_id=' + pelatihanId,

            data: data,
            success: function(response) {
                Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: response.message
                }).then(() => {
                       location.reload();
                   });
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat mengirim revisi.'
                });
            }
        });
    });
});


//REVISI
$('.revisi').click(function() {
    var pelatihanId = $(this).data('id'); // Ambil ID pelatihan dari atribut data-id
    
    $('#btn-yes-revisi').click(function() {
        // Ambil data dari formulir, termasuk pesan revisi
        var data = $('.form_revisi').serialize();

        // Kirim data dengan permintaan AJAX
        $.ajax({
            type: 'POST',
            url: '/pelatihan/revisi?pelatihan_id=' + pelatihanId, 
            data: data,
            success: function(response) {
                Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: response.message
                }).then(() => {
                       location.reload()
                });
            },
            error: function(error) {
                // Tampilkan SweetAlert kesalahan
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat mengirim revisi.'
                });
            }
        });
    });
});

    </script>
   

@endsection

