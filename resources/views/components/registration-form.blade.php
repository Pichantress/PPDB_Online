<form class="forms-sample" onsubmit="return registrationConfirmation(event);" method="POST"
    action="{{ route('registrasi') }}" enctype="multipart/form-data">
    @csrf
    <div style="
    font-family: Arial;
    font-size: 21pt;
    font-weight: bold;
    color: #4b4e53;
  ">
        Formulir Pendaftaran Siswa Baru Alur Pendaftaran SMPIT BINA AMAL
    </div>

    <p style="
      line-height: 18.75pt;
      background-color: #ffffff;
    ">
        <span style="font-family: Poppins; font-size: 9pt; color: #c0392b">*Siapkan Juga Kartu Keluarga (KK),
            dan
            Akta Kelahiran
        </span>
    </p>

    <div class="form-group mt-4">
        <label for="kenal">Mengenal Bina Amal dari mana ?</label>
        <div class="mt-2">
            <input type="radio" name="kenal" value="keluarga" /> Keluarga
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="teman" /> Teman
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="lingkungan_sekitar" /> Lingkungan Sekitar
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="facebook" /> Facebook
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="instagram" /> Instagram
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="website" /> Website/Google
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="youtube" /> Youtube
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="spanduk" /> Spanduk
        </div>
        <div class="mt-2">
            <input type="radio" name="kenal" value="browsur" /> Browsur/booklat
        </div>
    </div>

    <div class="form-group mt-4">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="name" required autofocus
                    autocomplete="name">
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="alamat">Alamat Lengkap</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required autofocus
                    autocomplete="alamat">
            </div>
        </div>
    </div>
    <div class="form-group mt-4">
        <label for="jenis_kelamin_id">Jenis Kelamin</label>
        <div class="mt-2">
            <select name="jenis_kelamin_id" id="jenis_kelamin_id" class="form-control" required>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-group mt-4">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <label for="kabupaten">Kota/Kabupaten</label>
                <input type="text" class="form-control" id="kabupaten" name="kabupaten" required autofocus
                    autocomplete="kabupaten">
            </div>
            <div class="col-sm-4 col-md-4">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" required autofocus
                    autocomplete="kecamatan">
            </div>
            <div class="col-sm-4 col-md-4">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" class="form-control" id="kelurahan" name="kelurahan" required autofocus
                    autocomplete="kelurahan">
            </div>
        </div>
    </div>
    <div class="form-group mt-4">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <label for="kode_pos">Kode Pos</label>
                <input type="text" class="form-control" id="kode_pos" name="kode_pos" required autofocus
                    autocomplete="kode_pos">
            </div>
            <div class="col-sm-4 col-md-4">
                <label for="rw">RW</label>
                <input type="text" class="form-control" id="rw" name="rw" required autofocus
                    autocomplete="rw">
            </div>
            <div class="col-sm-4 col-md-4">
                <label for="rt">RT</label>
                <input type="text" class="form-control" id="rt" name="rt" required autofocus
                    autocomplete="rt">
            </div>
        </div>
    </div>
    <div class="form-group mt-4">
        <label for="sekolah_asal">Sekolah Asal</label>
        <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" required autofocus
            autocomplete="sekolah_asal">
    </div>
    <div class="form-group mt-4">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required autofocus
                    autocomplete="nama_ayah">
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="wa_ayah">Nomor Whatsapp Ayah</label>
                <input type="text" class="form-control" id="wa_ayah" name="wa_ayah" required autofocus
                    autocomplete="wa_ayah" onkeypress="return isNumberKey(event)">
            </div>
        </div>
    </div>
    <div class="form-group mt-4">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required autofocus
                    autocomplete="nama_ibu">
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="wa_ibu">Nomor Whatsapp Ibu</label>
                <input type="text" class="form-control" id="wa_ibu" name="wa_ibu" required autofocus
                    autocomplete="wa_ibu" onkeypress="return isNumberKey(event)">
            </div>
        </div>
    </div>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
    <div class="form-group position-relative mt-4">
        <label for="password">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" required autofocus
                autocomplete="password">
            <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                <i class="fas fa-eye" id="eyeIcon"></i>
            </button>
        </div>
        <p
            style="
              line-height: 18.75pt;
              padding-right: 11pt;
              background-color: #ffffff;
            ">
            <span style="font-family: Poppins; font-size: 10.5pt"> </span><span
                style="font-family: Poppins; font-size: 9pt; color: #c0392b">*) Password di isi
            </span><span
                style="
                font-family: Poppins;
                font-size: 9pt;
                font-weight: bold;
                color: #c0392b;
              ">orang
                tua</span><span style="font-family: Poppins; font-size: 9pt; color: #c0392b">
                dan digunakan untuk login PPDB online</span>
        </p>
    </div>
    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            const passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>

    <div class="mt-4">
        <p
            style="
        line-height: 18.75pt;
        border: 0.75pt solid #ebccd1;
        padding: 11pt;
        background-color: #f2dede;
        ">
            <span
                style="
            font-family: Poppins;
            font-size: 10.5pt;
            font-weight: bold;
            color: #843534;
        ">Wajib
                Diisi</span>
            <span style="font-family: Poppins; font-size: 10.5pt; color: #a94442">. Upload
                Dokumen
                Penunjang Anda
            </span>
        </p>
    </div>
    <div class="form-group mt-4">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <label for="akta_kelahiran">Akta Kelahiran</label>
                <div class="rounded border border-gray-300 p-2">
                    <input id="akta_kelahiran" type="file" name="akta_kelahiran" required
                        accept=".jpg, .jpeg, .png, .gif" />
                </div>
                <p
                    style="
                    line-height: 18.75pt;
                    background-color: #ffffff;
                ">
                    <span style="font-family: Poppins; font-size: 9pt; color: #c0392b">* Tipe File = JPG, JPEG, PNG,
                        GIF; Ukuran gambar max 5MB</span>
                </p>
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="kartu_keluarga">Kartu Keluarga</label>
                <div class="rounded border border-gray-300 p-2">
                    <input id="kartu_keluarga" type="file" name="kartu_keluarga" required
                        accept=".jpg, .jpeg, .png, .gif" />
                </div>
                <p
                    style="
                    line-height: 18.75pt;
                    background-color: #ffffff;
                ">
                    <span style="font-family: Poppins; font-size: 9pt; color: #c0392b">* Tipe File = JPG, JPEG, PNG,
                        GIF; Ukuran gambar max 5MB</span>
                </p>
            </div>
        </div>
    </div>

    <div class="d-flex items-center justify-content-end mt-4">
        <button
            class="btn btn-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'"
            type="submit">Daftar</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function registrationConfirmation(event) {
        event.preventDefault();

        Swal.fire({
            title: "Pastikan Data Anda Sudah Benar",
            text: "Data tidak dapat diubah!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Daftar",
            cancelButtonText: "Batal"
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit();
            } else {
                swal("Dibatalkan!");
            }
        });
    }
</script>
