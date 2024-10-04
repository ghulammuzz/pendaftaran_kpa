@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-body py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-4 mb-4 mr-1">
                <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); grid-gap: 20px; text-align: center;">
                    <div class="grid-item">
                        <i class="fa fa-users fa-5x mb-3" style="color:#9FE2BF;"></i>
                        <h3>International Conference</h3>
                        <p>Jumlah Pendaftar: <a href="#" id="kongres-link"><h1><span id="kongres-counter">{{ $seminar }}</span></h1></a></p>
                    </div>
                    <div class="grid-item">
                      <i class="fa fa-users fa-5x mb-3" style="color:#87b7bd;"></i>
                      <h3>Kemah Seniman dan Budayawan</h3>
                      <p>Jumlah Pendaftar: <a href="#" id="kemah-link"><h1><span id="kemah-counter">{{ $kemah }}</span></h1></a></p>
                  </div>
                    <div class="grid-item">
                        <i class="fa fa-users fa-5x mb-3" style="color:#40E0D0;"></i>
                        <h3>Pameran</h3>
                        <p>Jumlah Pendaftar: <a href="#" id="seminar-link"><h1><span id="seminar-counter">{{ $pameran }}</span></h1></a></p>
                    </div>
                    <div class="grid-item">
                        <i class="fa fa-users fa-5x mb-3" style="color:#33E6FF;"></i>
                        <h3>Pertunjukan Seni Budaya</h3>
                        <p>Jumlah Pendaftar: <a href="#" id="pameran-link"><h1><span id="pameran-counter">{{ $pertunjukan }}</span></h1></a></p>
                    </div>
                    <div class="grid-item">
                        <i class="fa fa-users fa-5x mb-3" style="color:#B8F1F9;"></i>
                        <h3>Workshop</h3>
                        <p>Jumlah Pendaftar: <a href="/detail_workshop" id="workshop-link"><h1><span id="workshop-counter">{{ $workshop }}</span></h1></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function startCounting(elementId, targetValue) {
          let count = 0;
          const increment = Math.ceil(targetValue / 100); // Mempercepat animasi dengan membagi target menjadi 100 langkah
      
          const interval = setInterval(() => {
            count += increment;
            if (count >= targetValue) {
              count = targetValue;
              clearInterval(interval);
            }
            document.getElementById(elementId).textContent = count;
          }, 80); // Kecepatan animasi, diubah jika diperlukan
        }
      
        // Panggil fungsi startCounting untuk setiap elemen yang ingin dihitung
        startCounting('kongres-counter', {{ $kongres }});
        startCounting('seminar-counter', {{ $seminar }});
        startCounting('pameran-counter', {{ $pameran }});
        startCounting('workshop-counter', {{ $workshop }});
        
        // Tambahkan event listener untuk menangani klik pada setiap tautan
        document.getElementById('kongres-link').addEventListener('click', function(event) {
          event.preventDefault(); // Mencegah tautan dari navigasi standar
          window.location.href = this.getAttribute('href'); // Arahkan ke URL tautan
        });
        document.getElementById('seminar-link').addEventListener('click', function(event) {
          event.preventDefault(); // Mencegah tautan dari navigasi standar
          window.location.href = this.getAttribute('href'); // Arahkan ke URL tautan
        });
        document.getElementById('pameran-link').addEventListener('click', function(event) {
          event.preventDefault(); // Mencegah tautan dari navigasi standar
          window.location.href = this.getAttribute('href'); // Arahkan ke URL tautan
        });
        document.getElementById('workshop-link').addEventListener('click', function(event) {
          event.preventDefault(); // Mencegah tautan dari navigasi standar
          window.location.href = this.getAttribute('href'); // Arahkan ke URL tautan
        });
    </script>      
@endsection
