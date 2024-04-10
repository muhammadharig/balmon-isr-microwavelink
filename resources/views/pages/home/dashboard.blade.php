@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-primary">Dashboard</h3>
                        <p class="mb-4">Selamat Datang </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <h5 class="card-header m-0 me-2 pb-3">Statistik ISR</h5>
                    <div class="px-4" style="height: 400px">
                        <canvas id="layanan"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <h5 class="card-header m-0 me-2 pb-3">Statistik BHP</h5>
                    <div class="px-4" style="height: 400px">
                        <canvas id="layanan_subbagian"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            var ctx = document.getElementById("layanan").getContext('2d');
            var data = {
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: [
                        '#3c8dbc',
                        '#f56954',
                        '#f39c12',
                    ],
                }],
                labels: [
                    'Request',
                    'Layanan',
                    'Problem'
                ]
            };
            var myDoughnutChart = new Chart(ctx, {
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

            var ctx_2 = document.getElementById("layanan_subbagian").getContext('2d');
            var data_2 = {
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: [
                        '#3c8dbc',
                        '#f56954',
                        '#f39c12',
                    ],
                }],
                labels: [
                    'Request',
                    'Layanan',
                    'Problem'
                ]
            };
            var myDoughnutChart_2 = new Chart(ctx_2, {
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
