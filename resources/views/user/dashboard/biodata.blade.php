@include('user.layout.header')
{{-- @dd($biodata) --}}
<body class="bg-light">
    @include('user.layout.navbar')

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5" >
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Biodata Alumni</h1>
            <p>
                Mohon isi untuk pelengkapan data anda.
            </p>
        </div>
    </div>

    <!-- Start Map -->
 
    <!-- Ena Map -->
    @if (session('storeSuccess'))
        <div class="w-100 d-flex justify-content-center">
            <div id="alert-success" class="alert alert-success w-50">
                {{ session('storeSuccess') }}
            </div>
        </div>
    @endif

    @if (session('updateSuccess'))
        <div class="w-100 d-flex justify-content-center">
            <div id="alert-success" class="alert alert-success w-50">
                {{ session('updateSuccess') }}
            </div>
        </div>
    @endif

    <!-- Start Contact -->
    <div class="container py-5 bg-light" >
        <div class="row py-5">
            <form class="col-md-9 m-auto" action="/biodata" method="POST" role="form">
                {{-- @if ($biodata) --}}
                @if($biodata)
                    @method('PUT')
                @endif
                {{-- @endif --}}
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id}}">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Nama Lengkap</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nama" value="{{ isset($biodata) ? old('name', $biodata->name) : old('name', $user->name) }}" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_hp">No. Handphone</label>
                    <input type="number" class="form-control mt-1" id="no_hp" name="no_hp" placeholder="No. Handphone" value="{{ isset($biodata) ? old('no_hp', $biodata->no_hp) : '' }}">
                </div>
                <div class="mb-3">
                    <label for="departemen">Departemen</label>
                    <select class="form-control mt-1" id="departemen" name="departemen" required>
                        <option value="" disabled selected>Mohon Pilih</option>
                        <option value="Ilmu Ekonomi" {{ isset($biodata) ? (($biodata->departemen === 'Ilmu Ekonomi') ? 'selected' : '') : '' }}>Departemen Ilmu Ekonomi</option>
                        <option value="Manajemen" {{ isset($biodata) ? (($biodata->departemen === 'Manajemen') ? 'selected' : '') : '' }}>Departemen Manajemen</option>
                        <option value="Akuntansi" {{ isset($biodata) ? (($biodata->departemen === 'Akuntansi') ? 'selected' : '') : '' }}>Departemen Akuntansi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="prodi">Prodi</label>
                    <select class="form-control mt-1" id="prodi" name="prodi" required>
                        <option value="" disabled selected>Mohon Pilih</option>
                        <option value="Ekonomi Pembangunan" {{ isset($biodata) ? (($biodata->prodi === 'Ekonomi Pembangunan') ? 'selected' : '') : '' }}>Ekonomi Pembangunan</option>
                        <option value="Ekonomi Islam" {{ isset($biodata) ? (($biodata->prodi === 'Ekonomi Islam') ? 'selected' : '') : '' }}>Ekonomi Islam</option>
                        <option value="Ekonomi, Keuangan, dan Perbankan" {{ isset($biodata) ? (($biodata->prodi === 'Ekonomi, Keuangan, dan Perbankan') ? 'selected' : '') : '' }}>Ekonomi, Keuangan, dan Perbankan</option>
                        <option value="Kewirausahaan" {{ isset($biodata) ? (($biodata->prodi === 'Kewirausahaan') ? 'selected' : '') : '' }}>Kewirausahaan</option>
                        <option value="Akuntansi" {{ isset($biodata) ? (($biodata->prodi === 'Akuntansi') ? 'selected' : '') : '' }}>Akuntansi</option>

                        <option value="Magister Ilmu Ekonomi" {{ isset($biodata) ? (($biodata->prodi === 'Magister Ilmu Ekonomi') ? 'selected' : '') : '' }}>Magister Ilmu Ekonomi</option>
                        <option value="Magister Manajemen" {{ isset($biodata) ? (($biodata->prodi === 'Magister Manajemen') ? 'selected' : '') : '' }}>Magister Manajemen</option>
                        <option value="Magister Akuntansi" {{ isset($biodata) ? (($biodata->prodi === 'Magister Akuntansi') ? 'selected' : '') : '' }}>Magister Akuntansi</option>
                        <option value="Magister Manajemen Kampus Jakarta" {{ isset($biodata) ? (($biodata->prodi === 'Magister Manajemen Kampus Jakarta') ? 'selected' : '') : '' }}>Magister Manajemen Kampus Jakarta</option>

                        <option value="Doktor Ilmu Ekonomi" {{ isset($biodata) ? (($biodata->prodi === 'Doktor Ilmu Ekonomi') ? 'selected' : '') : '' }}>Doktor Ilmu Ekonomi</option>
                        <option value="Doktor Ilmu Akuntansi" {{ isset($biodata) ? (($biodata->prodi === 'Doktor Ilmu Akuntansi') ? 'selected' : '') : '' }}>Doktor Ilmu Akuntansi</option>
                        <option value="Doktor Ilmu Manajemen" {{ isset($biodata) ? (($biodata->prodi === 'Doktor Ilmu Manajemen') ? 'selected' : '') : '' }}>Doktor Ilmu Manajemen</option>
                        <option value="Doktor Manajemen Kampus Jakarta" {{ isset($biodata) ? (($biodata->prodi === 'Doktor Manajemen Kampus Jakarta') ? 'selected' : '') : '' }}>Doktor Manajemen Kampus Jakarta</option>
                        <option value="Doktor Akuntansi Kanpus Jakarta" {{ isset($biodata) ? (($biodata->prodi === 'Doktor Akuntansi Kanpus Jakarta') ? 'selected' : '') : '' }}>Doktor Akuntansi Kanpus Jakarta</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="angkatan">Angkatan</label>
                    <input type="number" class="form-control mt-1" id="angkatan" name="angkatan" placeholder="Angkatan" value="{{ isset($biodata) ? old('angkatan', $biodata->angkatan) : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan">Pekerjaan Saat Ini</label>
                    <input type="text" class="form-control mt-1" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan Saat Ini" value="{{ isset($biodata) ? old('pekerjaan', $biodata->pekerjaan) : '' }}" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="kategori_pekerjaan">Kategori Pekerjaan</label>
                    <select class="form-control mt-1" id="kategori_pekerjaan" name="kategori_pekerjaan" required>
                        <option value="" disabled selected>Mohon Pilih</option>
                        <option value="Institusi Pendidikan" {{ isset($biodata) ? (($biodata->kategori_pekerjaan === 'Institusi Pendidikan') ? 'selected' : '') : '' }}>Institusi Pendidikan</option>
                        <option value="Wirausaha" {{ isset($biodata) ? (($biodata->kategori_pekerjaan === 'Wirausaha') ? 'selected' : '') : '' }}>Wirausaha</option>
                        <option value="Start Up" {{ isset($biodata) ? (($biodata->kategori_pekerjaan === 'Start Up') ? 'selected' : '') : '' }}>Start Up</option>
                        <option value="Perbankan Dan Keuangan" {{ isset($biodata) ? (($biodata->kategori_pekerjaan === 'Perbankan Dan Keuangan') ? 'selected' : '') : '' }}>Perbankan Dan Keuangan</option>
                        <option value="Pemerintahan" {{ isset($biodata) ? (($biodata->kategori_pekerjaan === 'Pemerintahan') ? 'selected' : '') : '' }}>Pemerintahan</option>
                        <option value="Lembaga Sosial Masyarakat" {{ isset($biodata) ? (($biodata->kategori_pekerjaan === 'Lembaga Sosial Masyarakat') ? 'selected' : '') : '' }}>Lembaga Sosial Masyarakat</option>
                    </select>
                </div>
                
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->


@include('user.layout.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>