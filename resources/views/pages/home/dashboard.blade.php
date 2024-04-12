@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-primary">Dashboard</h3>
                        <p class="mb-4">Welcome back, <b>{{ Auth::user()->name }}</b>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <h6 class="card-header m-0 me-2 pb-3 text-center">STATISTIK ISR MICROWAVELINK PER.KAB/KOTA DI KALIMANTAN
                        BARAT</h6>
                    <div class="px-4" style="height: 400px">
                        <canvas id="isrBarChartDashboard"></canvas>
                    </div>
                </div>
                <div class="card mt-3">
                    <table class="table table-borderless fw-bold">
                        <tbody>
                            <tr class="bg-info">
                                <td class="text-white">KAB/KOTA</td>
                                <td class="text-white text-center">TOTAL</td>
                            </tr>
                            @foreach ($isrCity as $index => $city)
                                <tr>
                                    <td>{{ $city }}</td>
                                    <td class="text-center">{{ number_format($isrData[$index], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="bg-info">
                                <td class="text-white">GRAND TOTAL</td>
                                <td class="text-white text-center">{{ number_format($grandTotalIsr, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <h6 class="card-header m-0 me-2 pb-3 text-center">STATISTIK BHP MICROWAVELINK PER.KAB/KOTA DI KALIMANTAN
                        BARAT</h6>
                    <div class="px-4" style="height: 400px">
                        <canvas id="bhpBarChartDashboard"></canvas>
                    </div>
                </div>
                <div class="card mt-3">
                    <table class="table table-borderless fw-bold">
                        <tbody>
                            <tr class="bg-info">
                                <td class="text-white">KAB/KOTA</td>
                                <td class="text-white text-left">TOTAL</td>
                            </tr>
                            @foreach ($bhpCity as $index => $city)
                                <tr>
                                    <td>{{ $city }}</td>
                                    <td class="text-left">{{ 'Rp. ' . number_format($bhpData[$index], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="bg-info">
                                <td class="text-white">GRAND TOTAL</td>
                                <td class="text-white text-left">{{ 'Rp. ' . number_format($grandTotalBhp, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            var ctx = document.getElementById("isrBarChartDashboard").getContext('2d');
            var isrCity = {!! json_encode($isrCity) !!};
            var isrData = {!! json_encode($isrData) !!};
            var data = {
                datasets: [{
                    data: isrData,
                    label: 'Total',
                }],
                labels: isrCity
            };
            var isrBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    }
                }
            });

            var ctx_2 = document.getElementById("bhpBarChartDashboard").getContext('2d');
            var bhpCity = {!! json_encode($bhpCity) !!};
            var bhpData = {!! json_encode($bhpData) !!};
            var data_2 = {
                datasets: [{
                    data: bhpData,
                    label: 'Total',
                }],
                labels: bhpCity
            };
            var bhpBarChart = new Chart(ctx_2, {
                type: 'bar',
                data: data_2,
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    }
                }
            });
        });
    </script>
@endSection
