<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 15px;
            line-height: 1.4;
            font-size: 14px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            border: 1px solid #000;
            page-break-after: always;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header img {
            width: 80px;
            margin-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            padding: 0;
            font-size: 18px;
        }

        .header h2 {
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .header p {
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .form-section {
            margin-bottom: 15px;
        }

        .form-section h3 {
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group p {
            margin: 0;
            padding: 0;
            border-bottom: 1px dotted #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 4px;
            vertical-align: top;
        }

        .signature {
            margin-top: 30px;
            text-align: right;
        }

        .signature p {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        .signature .signatory {
            margin-top: 40px;
        }

        .footer-section {
            page-break-before: always;
            margin-top: 40px;
            text-align: center;
        }

        .footer-section .left,
        .footer-section .center,
        .footer-section .right {
            display: inline-block;
            vertical-align: top;
        }
        .footer-section .left,
        .footer-section .right {
            width: 32%;
            text-align: center;
        }
        .footer-section .center {
            border: 1px solid #000;
            width: 3cm;
            height: 4cm;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        }
        .footer-section .left p,
        .footer-section .right p {
            margin-top: 0;
            margin-bottom: 50px;
        }
        .footer-section .left .line,
        .footer-section .right .line {
            margin-top: 20px;
            border-top: 1px solid #000;
            width: 100%;
            text-align: center;
        }
        .requirements {
            margin-top: 30px;
        }

        .requirements ol {
            margin: 0;
            padding-left: 20px;
        }

        .requirements ol li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="C:\Kuliah\laravel-ppdb\public\Logo-Bina-Amal.png" alt="Logo">
            <h1>SEKOLAH MENENGAH PERTAMA ISLAM TERPADU BINA AMAL</h1>
            <h2>SMP IT BINA AMAL</h2>
            <p>Jl. Kyai Saleh No.8, Mugassari, Kec. Semarang Selatan, Kota Semarang, Jawa Tengah 50249</p>
            <h3>FORMULIR PENDAFTARAN CALON PESERTA DIDIK SMP IT BINA AMAL</h3>
        </div>
        <div class="form-section">
            <h3>DATA CALON PESERTA DIDIK</h3>
            <table>
                <tr>
                    <td><strong>Nama Lengkap</strong></td>
                    <td>:{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat Lengkap</strong></td>
                    <td>:{{ $data['alamat'] }}</td>
                </tr>
                <tr>
                    <td><strong>Jenis Kelamin</strong></td>
                    <td>:{{ $data['jenis_kelamin_id'] == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td><strong>Tempat Lahir:</strong></td>
                    <td>:{{ $data['tempat_lahir'] }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Lahir</strong></td>
                    <td>:{{ $data['tanggal_lahir'] }}</td>
                </tr>
                <tr>
                    <td><strong>No. KK</strong></td>
                    <td>:{{ $data['no_kk'] }}</td>
                </tr>
                <tr>
                    <td><strong>NIK</strong></td>
                    <td>:{{ $data['nik'] }}</td>
                </tr>
                <tr>
                    <td><strong>No. Akta Kelahiran</strong></td>
                    <td>:{{ $data['no_akta'] }}</td>
                </tr>
                <tr>
                    <td><strong>Agama</strong></td>
                    <td>:{{ $data['agama'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-section">
            <h3>DATA SEKOLAH ASAL</h3>
            <table>
                <tr>
                    <td><strong>Sekolah Asal</strong></td>
                    <td>:{{ $data['sekolah_asal'] }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat Sekolah Asal</strong></td>
                    <td>:{{ $data['alamat_sekolah'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-section">
            <h3>DATA ORANG TUA</h3>
            <table>
                <tr>
                    <td><strong>Nama Ayah</strong></td>
                    <td>:{{ $data['nama_ayah'] }}</td>
                </tr>
                <tr>
                    <td><strong>Nomor Whatsapp Ayah</strong></td>
                    <td>:{{ $data['wa_ayah'] }}</td>
                </tr>
                <tr>
                    <td><strong>Nama Ibu</strong></td>
                    <td>:{{ $data['nama_ibu'] }}</td>
                </tr>
                <tr>
                    <td><strong>Nomor Whatsapp Ibu</strong></td>
                    <td>:{{ $data['wa_ibu'] }}</td>
                </tr>
            </table>
        </div>
        <div class="footer-section">
            <div class="left">
                <p>Menggetahui:</p>
                <p>Orang Tua/Wali,</p>
                <p>________________________</p>
            </div>
            <div class="center">
                Pasphoto ukuran 3x4 cm
            </div>
            <div class="right">
                <p>Semarang, __________________</p>
                <p>Pendaftar,</p>
                <p>________________________</p>
            </div>
        </div>
        <div class="requirements">
            <h3>SYARAT-SYARAT PENDAFTARAN</h3>
            <ol>
                <li>Mengisi formulir pendaftaran</li>
                <li>SKHU Asli dan fotokopi yang telah dilegalisir = 1 lembar</li>
                <li>Pasphoto ukuran 3x4 cm = 2 lembar</li>
                <li>Fotokopi Kartu Keluarga = 1 lembar</li>
                <li>Fotokopi Akte Kelahiran = 1 lembar (jika ada)</li>
            </ol>
        </div>
    </div>
</body>

</html>
