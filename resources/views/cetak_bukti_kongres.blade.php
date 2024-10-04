<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Resul</title>
    <!-- Include your CSS stylesheets here -->
</head>
<body>
    <header>
        <!-- Your header content goes here -->
        <h1>Bukti Pendaftaran Kongres</h1>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>Form Data</h2>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama Lengkap:</strong> {{ $pendaftaran->nama_lengkap }}</p>
                            <p><strong>No. Identitas:</strong> {{ $pendaftaran->no_identitas }}</p>
                            <p><strong>Nama Instansi:</strong> {{ $pendaftaran->nama_instansi }}</p>
                            <p><strong>Alamat:</strong> {{ $pendaftaran->alamat }}</p>
                            <p><strong>No. HP:</strong> {{ $pendaftaran->no_hp }}</p>
                            <p><strong>Jenis Acara:</strong> {{ $pendaftaran->jenis_acara }}</p>
                            <p><strong>Pernyataan:</strong> {{ $pendaftaran->pernyataan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Include your JavaScript scripts here -->
</body>
</html>
