@extends('mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Pelatihan</h1>
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
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> PELATIHAN</h5>
              <button type="button" class="btn bi bi-file-earmark-excel btn-sm btn-outline-secondary" id="exportExcelButton"> Export Excel</button>
              
              <br><br>
              <table class="display" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Pelatihan</th>
                    <th scope="col">Informasi Pelatihan</th>
                    <th scope="col">Perusahaan</th>
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
                    <td>28</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill bg-success">Done</span></td>
                    <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-filetype-pdf"></i>Export Pdf</a></li>
                        </ul>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>Developer</td>
                    <td>35</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill bg-success">Done</span></td>
                     <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-filetype-pdf"></i>Export Pdf</a></li>
                        </ul>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>HR</td>
                    <td>34</td>
                    <td>Palembang</td>
                    <td>2016-05-25</td>
                    <td>450.000</td>
                    <td><span class="badge rounded-pill bg-success">Done</span></td>
                     <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-filetype-pdf"></i>Export Pdf</a></li>
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
                    <td><span class="badge rounded-pill bg-success">Done</span></td>
                    <td>    
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-filetype-pdf"></i>Export Pdf</a></li>
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

@endsection

