@extends('mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>ADMP</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> ADMP</h5>
              <button type="button" class="btn bi bi-plus btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pelatihanModal"> Add ADMP</button>
              <br><br>
              <!-- Modal Add -->
                <div class="modal fade modalpelatihan" id="pelatihanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add ADMP</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <form class="row g-3">
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingEmail" placeholder="Your Email">
                                <label for="floatingEmail">NIK</label>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Nama</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Jabatan</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Departemen</label>
                            </div>
                            </div>
                             <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">PT.</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="State">
                                <option selected>- Pilih -</option>
                                <option value="1">Oregon</option>
                                <option value="2">DC</option>
                                </select>
                                <label for="floatingSelect">Jenis Job Assignment</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Informasi Job Assignment :</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Deskripsi Job Assignment :</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="namaPelatihan" placeholder="Nama Pelatihan">
                                <label for="nama pelatihan">Waktu Pelaksanan</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="namaPelatihan" placeholder="Nama Pelatihan">
                                <label for="nama pelatihan">Tempat</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="namaPelatihan" placeholder="Nama Pelatihan">
                                <label for="nama pelatihan">Biaya</label>
                            </div>
                            </div>    
                         </form>             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
              {{-- End Modal Add --}}

              <!--begin::Modal Cancel-->
              <div class="modal fade modal_revisi" id="revisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Revisi Pelatihan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form class="kt-form kt-form--label-right form_revisi" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                  <div class="form-group">
                                      <label for="message-text" class="form-control-label">Pesan Revisi Pelatihan <span style="color:red">*</span></label>
                                      <textarea class="form-control" id="comp_cancel" name="comp_cancel" rows="8"></textarea>
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" id="btn-yes-cancel">Kirim</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!--end::Modal Cancel-->
              <!-- Table with stripped rows -->
              <table class="display" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis ADMP</th>
                    <th scope="col">Deskripsi ADMP</th>
                    <th scope="col">PT.</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>MA</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill text-bg-primary">Create</span></td>
                    <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-expand"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#" id="deletePelatihan"><i class="fa-solid fa-trash"></i>Delete</a></li>

                            <li><a class="dropdown-item" href="#" id="sendPelatihan"><i class="fa-regular fa-paper-plane"></i>Send</a></li>
                        </ul>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>Developer</td>
                    <td>BDMS</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill bg-warning text-dark">Revisi</span></td>
                     <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-expand"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash"></i>Delete</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-paper-plane"></i>Send</a></li>
                        </ul>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh Langosh</td>
                    <td>Finance</td>
                    <td>MA</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill text-bg-info text-start">Pending HRGA<br>Manager</span></td>
                     <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-expand"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-paper-plane"></i>Send</a></li>
                            <li><a class="dropdown-item"  href="#" id="approvePelatihan"><i class="fa-regular fa-square-check"></i>Approve</a></li>
                           <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal"><i class="fa-regular fa-message"></i>Revisi</a></li>
                            <li><a class="dropdown-item"  href="#" id="rejectPelatihan"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                        </ul>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>HR</td>
                    <td>BDMS</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill bg-success">Done</span></td>
                     <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-expand"></i>View</a></li>
                        </ul>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Raheem Lehner</td>
                    <td>Dynamic Division Officer</td>
                    <td>47</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill text-bg-danger">Reject</span></td>
                    <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-expand"></i>View</a></li>
                        </ul>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
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
</script>

@endsection

