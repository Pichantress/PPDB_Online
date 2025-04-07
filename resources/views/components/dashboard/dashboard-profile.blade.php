<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if ($data->profil_path)
                        <img src="{{ Storage::url($data->profil_path) }}" alt="Profile Picture"
                            class="rounded-circle img-fluid" style="width: 150px;">
                    @else
                        <i class="fas fa-user-circle fa-8x"></i>
                    @endif
                </div>
                <hr style="width: 100%; border-top: 1px solid #ccc">
                <p><strong>Nama:</strong> {{ $data->name }}</p>
                <p><strong>Jenis Kelamin:</strong>
                    @if ($data->jenis_kelamin_id == 1)
                        Laki-laki
                    @elseif ($data->jenis_kelamin_id == 2)
                        Perempuan
                    @else
                        Tidak diketahui
                    @endif
                </p>
                <p><strong>NIK:</strong> {{ $data->nik }}</p>
                <p><strong>Agama:</strong> {{ $data->agama }}</p>
                <p><strong>Tempat Lahir:</strong> {{ $data->tempat_lahir }}</p>
                <p><strong>Tanggal Lahir:</strong>
                    {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('j F Y') }}</p>
                <p><strong>No KK:</strong> {{ $data->no_kk }}</p>
                <p><strong>No Akta Kelahiran:</strong> {{ $data->no_akta_kelahiran }}</p>
                <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                <p><strong>Nama Ayah:</strong> {{ $data->nama_ayah }}</p>
                <p><strong>Nama Ibu:</strong> {{ $data->nama_ibu }}</p>
                <p><strong>WhatsApp Ayah:</strong> {{ $data->wa_ayah }}</p>
                <p><strong>WhatsApp Ibu:</strong> {{ $data->wa_ibu }}</p>
                <p><strong>Status:</strong>
                    <span
                        style="text-transform: uppercase; color: 
                        @if ($data->status->id == 1) blue
                        @elseif($data->status->id == 8)
                            blue
                        @elseif($data->status->id == 2)
                            orange
                        @elseif($data->status->id == 3)
                            #00FF00
                        @elseif($data->status->id == 6)
                            #00FF00
                        @elseif($data->status->id == 4)
                            red">
                        @elseif($data->status->id == 7)
                            red >
                        @elseif($data->status->id == 9)
                            red @endif">
                        {{ $data->status->name }}
                    </span>
                </p>
                <a href="/editAcc/{{ $data->id }}" class="btn btn-warning me-2">Edit</a>
            </div>
        </div>
    </div>
</div>
