@extends('include/mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Pelatihan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                                        <label for="perusahaan">Perusahaan:</label>
                                        <span id="perusahaan"></span>
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

                        <form class="row g-3" method="POST" >
                        @csrf
                            <div class="col-md-6">
                            {{-- <div class="form-floating">
                                <input type="text" class="form-control" id="nrp" name ="nrp" placeholder="Your NRP">
                                <label for="message-text">NRP <span style="color:red">*</span></label>
                            </div> --}}
                            <div class="form-floating">
                                <select class="form-control" id="nrp" name="nrp">
                                    <option value="" disabled selected>Select NRP</option>
                                    @foreach ($nrpOptions as $nrp)
                                        <option value="{{ $nrp->nrp }}">{{ $nrp->nrp }}</option>
                                    @endforeach
                                </select>
                                <label for="nrp">NRP <span style="color:red">*</span></label>
                            </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                            
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                                <label for="message-text">Nama <span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                                <label for="message-text">Jabatan <span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" class="form-control" id="departemen" name="departemen" placeholder="Password">
                                <label for="message-text">Departemen <span style="color:red">*</span></label>
                            </div>
                            </div>
                             <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Password">
                                <label for="message-text">Perusahaan <span style="color:red">*</span></label>
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
                                <label for="message-text">Informasi Pelatihan <span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" placeholder="Nama Pelatihan">
                                <label for="message-text">Nama Pelatihan <span style="color:red">*</span></label>
                            </div>
                            </div>
                             <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Narasumber">
                                <label for="message-text">Narasumber <span style="color:red">*</span></label>
                            </div>
                            </div>
                            
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="alasan_pelatihan" name="alasan_pelatihan" style="height: 100px;"></textarea>
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
                                <input type="date" class="form-control" id="waktu_pelatihan" name="waktu_pelatihan" placeholder="Nama Pelatihan">
                                <label for="nama pelatihan">Waktu Pelatihan</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="tempat_pelatihan" name="tempat_pelatihan" placeholder="Nama Pelatihan">
                                <label for="nama pelatihan">Tempat Pelatihan</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="biaya_pelatihan" name="biaya_pelatihan" placeholder="Nama Pelatihan">
                                <label for="nama pelatihan">Biaya Pelatihan</label>
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
                              <form class="kt-form kt-form--label-right form_revisi" action="{{ route('revisi.pelatihan') }}"  method="POST" enctype="multipart/form-data" autocomplete="off">
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
                              <form class="kt-form kt-form--label-right form_reject" action="{{ route('reject.pelatihan') }}"  method="POST" enctype="multipart/form-data" autocomplete="off">
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
              <table class="display dt_pelatihan" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Pelatihan</th>
                    <th scope="col">Nama Pelatihan</th>
                    <th scope="col">Informasi Pelatihan</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($pelatihanData as $no => $pelatihan)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pelatihan->jenis }}</td>
                    <td>{{ $pelatihan->nama }}</td>
                    <td class="truncate-text">{{ $pelatihan->informasi}}</td>
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
                            <span class="badge rounded-pill text-bg-warning text-start">Revisi</span>
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
                    <li><a class="dropdown-item" href="/pelatihan_pdf"><i class="fa-solid fa-square-poll-vertical"></i> Export PDF</a></li>
                </ul>
                @else
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-expand"></i>View</a></li>
                @endif
                </div>
              </td>
              </tr>
              @endforeach
              </tbody>
              </table>
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
    console.log('DOM telah dimuat.');

    $('#nrp').on('change', function() {
        console.log('Dropdown NRP Changed');
        var selectedNrp = $(this).val();
        console.log('Selected NRP:', selectedNrp);
        $.ajax({
            type: 'POST',
            url: '/get_user_info',
            data: { nrp: selectedNrp, _token: '{{ csrf_token() }}' },
            success: function(response) {
                console.log('Ajax Success:', response);

                // Isi otomatis inputan nama, jabatan, departemen, perusahaan
                $('#nama').val(response.nama);
                $('#jabatan').val(response.jabatan);
                $('#departemen').val(response.departemen);
                $('#perusahaan').val(response.perusahaan);
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

//VIEW
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
            $('#viewPelatihanModal').find('#perusahaan').text(response.perusahaan);
            $('#viewPelatihanModal').find('#jenis_pelatihan').text(response.jenis);
            $('#viewPelatihanModal').find('#informasi_pelatihan').text(response.informasi);
            $('#viewPelatihanModal').find('#nama_pelatihan').text(response.nama);
            $('#viewPelatihanModal').find('#narasumber').text(response.narasumber);
            $('#viewPelatihanModal').find('#alasan_pelatihan').text(response.alasan);
            $('#viewPelatihanModal').find('#sharing_pelatihan').text(response.sharing);
            $('#viewPelatihanModal').find('#waktu_pelatihan').text(response.waktu);
            $('#viewPelatihanModal').find('#tempat_pelatihan').text(response.tempat);
            $('#viewPelatihanModal').find('#biaya_pelatihan').text(response.biaya);
    
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
               axios.post('{{ route('send.data') }}', {
                   pelatihan_id: pelatihanId
               })
               .then(function (response) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Sukses!',
                       text: response.data.message
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
       var id = this.getAttribute('data-id');

       Swal.fire({
           title: 'Konfirmasi',
           text: 'Export data?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Ya, Kirim!',
           cancelButtonText: 'Batal'
       }).then((result) => {
           if (result.isConfirmed) {
               axios.post('{{ route('export.data') }}', {
                   id: id
               })
               .then(function (response) {
                   Swal.fire({
                       icon: 'success',
                       title: 'Sukses!',
                       text: response.data.message
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
               axios.post('{{ route('delete.data') }}', {
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
            url: '{{ route('reject.pelatihan') }}?pelatihan_id=' + pelatihanId, 
            data: data,
            success: function(response) {
                Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: response.message
                }).then(() => {
                    $('#rejectModal').modal('hide');
                    location.href = location.href;
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
            url: '{{ route('revisi.pelatihan') }}?pelatihan_id=' + pelatihanId, 
            data: data,
            success: function(response) {
                Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: response.message
                }).then(() => {
                    // Tutup modal reject
                    $('#revisitModal').modal('hide');
                    // Reload halaman atau data pelatihan setelah pengguna menekan "OK"
                    location.href = location.href;
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
    {{-- <script>
    // Definisi kelas custom untuk SweetAlert2
    const customClasses = {
        popup: 'small-modal',
        title: 'small-title',
        htmlContainer: 'small-html',
        confirmButton: 'small-button',
        cancelButton: 'small-button'
    };

    document.getElementById("deletePelatihan").addEventListener("click", function() {
        Swal.fire({
            title: 'Hapus Data',
            text: 'Apakah anda yakin akan menghapus data ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak',
            customClass: customClasses
        }).then((result) => {
            const successMessage = {
                title: 'Deleted!',
                text: 'Data berhasil dihapus!',
                icon: 'success',
                customClass: customClasses
            };

            const errorMessage = {
                title: 'Cancelled',
                text: 'Data tidak berhasil dihapus.',
                icon: 'error',
                customClass: customClasses
            };

            if (result.isConfirmed) {
                Swal.fire(successMessage);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(errorMessage);
            }
        });
    });

    document.getElementById("sendPelatihan").addEventListener("click", function() {
        Swal.fire({
            title: 'Kirim Data',
            text: 'Apakah anda yakin akan mengirim data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak',
            customClass: customClasses
        }).then((result) => {
            const successMessage = {
                title: 'send!',
                text: 'Data berhasil terkirim!',
                icon: 'success',
                customClass: customClasses
            };

            const errorMessage = {
                title: 'Cancelled',
                text: 'Data tidak berhasil terkirim.',
                icon: 'error',
                customClass: customClasses
            };

            if (result.isConfirmed) {
                Swal.fire(successMessage);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(errorMessage);
            }
        });
    });

    document.getElementById("approvePelatihan").addEventListener("click", function() {
        Swal.fire({
            title: 'Kirim Data',
            text: 'Apakah anda yakin akan menyetujui pelatihan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak',
            customClass: customClasses
        }).then((result) => {
            const successMessage = {
                title: 'send!',
                text: 'Data berhasil terkirim!',
                icon: 'success',
                customClass: customClasses
            };

            const errorMessage = {
                title: 'Cancelled',
                text: 'Data tidak berhasil terkirim.',
                icon: 'error',
                customClass: customClasses
            };

            if (result.isConfirmed) {
                Swal.fire(successMessage);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(errorMessage);
            }
        });
    });

    document.getElementById("rejectPelatihan").addEventListener("click", function() {
        Swal.fire({
            title: 'Reject',
            text: 'Apakah anda yakin akan menolak pelatihan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak',
            customClass: customClasses
        }).then((result) => {
            const successMessage = {
                title: 'send!',
                text: 'Data berhasil terkirim!',
                icon: 'success',
                customClass: customClasses
            };

            const errorMessage = {
                title: 'Cancelled',
                text: 'Data tidak berhasil terkirim.',
                icon: 'error',
                customClass: customClasses
            };

            if (result.isConfirmed) {
                Swal.fire(successMessage);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(errorMessage);
            }
        });
    });
</script> --}}

@endsection

