@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-body py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-4 mb-4 mr-1">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="grid-item" style="background: linear-gradient(to left, #66a5ad, #ffffff); height: 300px;">
                            <h3>Statistik Pendaftar International Conference</h3>
                            <canvas id="seminarChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="grid-item"
                            style="background: linear-gradient(to left, #2fb1bf, #ffffff); height: 300px;">
                            <h3>Statistik Pendaftar Kemah Seniman dan Budayawan</h3>
                            <canvas id="kemahChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="grid-item"
                            style="background: linear-gradient(to left, #90afc5, #ffffff); height: 300px;">
                            <h3>Statistik Pendaftar Pameran</h3>
                            <canvas id="pameranChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="grid-item"
                            style="background: linear-gradient(to left, #a7f2ec, #ffffff); height: 300px;">
                            <h3>Statistik Pendaftar Pertunjukan Seni Budaya</h3>
                            <canvas id="pertunjukanChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="grid-item"
                            style="background: linear-gradient(to left, #B8F1F9, #ffffff); height: 300px;">
                            <h3>Statistik Pendaftar Workshop</h3>
                            <canvas class="col-md-12" id="workshopChart" style="width: 100%; height: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // fetch('/seminar/chart-data-seminar')
        //     .then(response => response.json())
        //     .then(data => {
        //         // Mempersiapkan data untuk digunakan dalam grafik
        //         var presenterTotal = data.presenterTotal;
        //         var participantTotal = data.participantTotal;

        //         // Inisialisasi grafik dengan data dinamis
        //         var ctx = document.getElementById('seminarChart').getContext('2d');
        //         var visitorChart = new Chart(ctx, {
        //             type: 'bar',
        //             data: {
        //                 labels: ['Presenter', 'Participant'], // Label untuk setiap bar
        //                 datasets: [{
        //                     label: 'Data',
        //                     data: [presenterTotal,
        //                         participantTotal
        //                     ], // Jumlah data untuk Presenter dan Participant
        //                     backgroundColor: ['#003b46', '#07575b'], // Warna untuk setiap bar
        //                     borderColor: '#ffffff',
        //                     borderWidth: 1
        //                 }]
        //             },
        //             options: {
        //                 responsive: true,
        //                 scales: {
        //                     yAxes: [{
        //                         ticks: {
        //                             beginAtZero: true
        //                         }
        //                     }]
        //                 }
        //             }
        //         });
        //     })
        //     .catch(error => {
        //         console.error('Error fetching data:', error);
        //     });

        fetch('/seminar/chart-data-seminar')
            .then(response => response.json())
            .then(data => {
                console.log('Data yang diterima:', data);

                // Mempersiapkan data untuk digunakan dalam grafik
                var labels = data.map(item => item.status); // Mengambil status sebagai label
                var values = data.map(item => item.total);

                // Inisialisasi grafik dengan data dinamis
                var ctx = document.getElementById('seminarChart').getContext('2d');
                var seminarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Data',
                            data: values,
                            backgroundColor: '#81d8e4',
                            borderColor: '#ffffff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        fetch('/pameran/chart-data-pameran')
            .then(response => response.json())
            .then(data => {
                console.log('Data yang diterima:', data);

                // Mempersiapkan data untuk digunakan dalam grafik
                var jumlahTotal = data.jumlahTotal;

                // Inisialisasi grafik dengan data dinamis
                var ctx = document.getElementById('pameranChart').getContext('2d');
                var visitorChart1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Pameran'], // Label untuk setiap bar
                        datasets: [{
                            label: 'Data',
                            data: [jumlahTotal], // Jumlah total data pameran
                            backgroundColor: ['#336b87'], // Warna untuk setiap bar
                            borderColor: '#ffffff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true // Mulai sumbu Y dari 0
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        fetch('/kemah/chart-data-kemah')
            .then(response => response.json())
            .then(data => {
                console.log('Data yang diterima:', data);

                // Mempersiapkan data untuk digunakan dalam grafik
                var jumlahTotal = data.jumlahTotal;

                // Inisialisasi grafik dengan data dinamis
                var ctx = document.getElementById('kemahChart').getContext('2d');
                var kemahChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Kemah'], // Label untuk setiap bar
                        datasets: [{
                            label: 'Jumlah Total Data',
                            data: [jumlahTotal], // Jumlah total data kemah
                            backgroundColor: '#99f0ff', // Warna untuk setiap bar
                            borderColor: '#ffffff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true // Mulai sumbu Y dari 0
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        fetch('/pertunjukan/chart-data-pertunjukan')
            .then(response => response.json())
            .then(data => {
                console.log('Data yang diterima:', data);

                // Mempersiapkan data untuk digunakan dalam grafik
                var jumlahTotal = data.jumlahTotal;

                // Inisialisasi grafik dengan data dinamis
                var ctx = document.getElementById('pertunjukanChart').getContext('2d');
                var visitorChart1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Pertunjukan'], // Label untuk setiap bar
                        datasets: [{
                            label: 'Data',
                            data: [jumlahTotal], // Jumlah total data pameran
                            backgroundColor: ['#2c8783'], // Warna untuk setiap bar
                            borderColor: '#ffffff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true // Mulai sumbu Y dari 0
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        fetch('/workshop/chart-data-workshop')
            .then(response => response.json())
            .then(data => {
                console.log('Data yang diterima:', data);

                // Mempersiapkan data untuk digunakan dalam grafik
                var labels = data.map(item => item.jenis_acara);
                var values = data.map(item => item.total);

                // Inisialisasi grafik dengan data dinamis
                var ctx = document.getElementById('workshopChart').getContext('2d');
                var workshopChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Data',
                            data: values,
                            backgroundColor: '#81d8e4',
                            borderColor: '#ffffff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });


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
        startCounting('seminar-counter', {{ $seminar }});
        startCounting('pameran-counter', {{ $pameran }});
        startCounting('workshop-counter', {{ $workshop }});

        // Tambahkan event listener untuk menangani klik pada setiap tautan
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
