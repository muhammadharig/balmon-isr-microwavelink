@extends('layouts.app', ['title' => 'BHP'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Filter Statistik</h5>
            <div class="card-body">
                <form action="#" method="GET">
                    <div class="row gx-3 gy-2 align-items-center">
                        <div class="col-md-3">
                            <label class="form-label" for="selectTypeOpt">Bulan</label>
                            <select class="form-select color-dropdown" name="bulan">
                                <option value="01" {{ $bulan == '01' ? 'selected' : '' }}>Januari</option>
                                <option value="02" {{ $bulan == '02' ? 'selected' : '' }}>Februari</option>
                                <option value="03" {{ $bulan == '03' ? 'selected' : '' }}>Maret</option>
                                <option value="04" {{ $bulan == '04' ? 'selected' : '' }}>April</option>
                                <option value="05" {{ $bulan == '05' ? 'selected' : '' }}>Mei</option>
                                <option value="06" {{ $bulan == '06' ? 'selected' : '' }}>Juni</option>
                                <option value="07" {{ $bulan == '07' ? 'selected' : '' }}>Juli</option>
                                <option value="08" {{ $bulan == '08' ? 'selected' : '' }}>Agustus</option>
                                <option value="09" {{ $bulan == '09' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ $bulan == '10' ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ $bulan == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ $bulan == '12' ? 'selected' : '' }}>Desember</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tahun</label>
                            <select class="form-select" name="tahun">
                                @foreach ($tahuns as $tahunOption)
                                    <option value="{{ $tahunOption }}"
                                        {{ old('tahun', $tahun) == $tahunOption ? 'selected' : '' }}>{{ $tahunOption }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="showToastPlacement">&nbsp;</label>
                            <button class="btn btn-primary d-block">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header m-0 me-2 pb-3 text-center">Statistik BHP</h5>
                <div class="px-4" style="position: relative; margin:auto; height:40vh; width:80vw">
                    <canvas id="bhpChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            var ctx = document.getElementById("bhpChart").getContext('2d');
            var data = {!! json_encode($data) !!};
            var labels = {!! json_encode($labels) !!};
            var data = {
                datasets: [{
                    data: data,
                    label: 'Total',
                }],
                labels: labels
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
        });
    </script>
@endsection
