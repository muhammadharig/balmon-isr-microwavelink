@extends('layouts.app', ['title' => 'BHP'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Filter Statistik</h5>
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label" for="selectTypeOpt">Bulan</label>
                        <select class="form-select color-dropdown">
                            <option value="" selected>Juni</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahun</label>
                        <select class="form-select">
                            <option value="">2020</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button class="btn btn-primary d-block">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header m-0 me-2 pb-3 text-center">Statistik BHP</h5>
                <div class="px-4" style="position: relative; margin:auto; height:40vh; width:80vw">
                    <canvas id="layanan"></canvas>
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
        });
    </script>
@endsection
