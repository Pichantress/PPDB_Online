    <div style="
    font-family: Arial;
    font-size: 21pt;
    font-weight: bold;
    color: #4b4e53;
  ">
        Timeline Pendaftaran
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="InformTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Agenda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('j F Y') }} - {{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('j F Y') }}</td>
                        <td>{{ $item->Agenda }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mb-5">
            <img src="{{ asset('halaman_depan/assets/informasi.png') }}" alt="logo" width="40%" height="auto"
                class="logo-img"></img>
        </div>
    </div>
