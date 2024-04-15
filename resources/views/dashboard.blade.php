<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-4">Dashboard Content</h1>

                    <!-- Widget Menampilkan Jumlah Data Pokja -->
                    <div class="bg-blue-100 p-4 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold text-blue-800">Jumlah Data Kelompok Kerja (POKJA)</h2>
                        <p class="text-3xl font-bold text-blue-600">{{ $totalPokja }}</p>
                    </div>

                    <!-- Widget Menampilkan Jumlah Data Tender -->
                    <div class="bg-green-100 p-4 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold text-green-800">Jumlah Data Tender</h2>
                        <p class="text-3xl font-bold text-green-600">{{ $totalTender }}</p>
                    </div>

                    <!-- Widget Menampilkan Status Tender -->
                    <div class="bg-yellow-100 p-4 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold text-yellow-800">Status Tender</h2>
                        <canvas id="statusChart" width="400" height="200"></canvas>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Keterangan:</p>
                            <ul class="list-disc list-inside">
                                <li><span class="text-red-500">Ditetapkan:</span> Tender yang sudah ditetapkan</li>
                                <li><span class="text-blue-500">Dikerjakan:</span> Tender yang sedang dikerjakan</li>
                                <li><span class="text-green-500">Selesai:</span> Tender yang sudah selesai</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Widget Menampilkan Tender yang Akan Berlangsung -->
                    <div class="bg-yellow-100 p-4 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold text-yellow-800">Tender yang Akan Berlangsung (7 Hari Ke Depan)</h2>
                        <ul>
                            @foreach ($upcomingTenders as $tender)
                                <li>{{ $tender->nama_paket }} ({{ $tender->tanggal_penetapan }})</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Tambahkan widget lainnya sesuai kebutuhan -->

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('statusChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Ditetapkan', 'Dikerjakan', 'Selesai'],
                    datasets: [{
                        label: 'Jumlah Tender',
                        data: [
                            {{ $tenderDitetapkan }},
                            {{ $tenderDikerjakan }},
                            {{ $tenderSelesai }}
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)', // Ditetapkan - Red
                            'rgba(54, 162, 235, 0.5)', // Dikerjakan - Blue
                            'rgba(75, 192, 192, 0.5)' // Selesai - Green
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', // Ditetapkan - Red
                            'rgba(54, 162, 235, 1)', // Dikerjakan - Blue
                            'rgba(75, 192, 192, 1)' // Selesai - Green
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
