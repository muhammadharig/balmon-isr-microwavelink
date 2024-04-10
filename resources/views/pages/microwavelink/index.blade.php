@extends('layouts.app', ['title' => 'Microwavelink'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="modal modal-top fade" id="modalTop" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('microwavelinks.import') }}" method="POST" enctype="multipart/form-data"
                    class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTopTitle">Import Data Microwavelink</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="">Pilih File</label>
                            <input type="file" class="form-control" name="import_file">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i>
                            Import File
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Data Microwavelink</h5>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4 mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop"><i
                            class="fas fa-upload"></i>
                        Import
                    </button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="tbl-bc">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-white">No</th>
                                <th class="text-white">CURR_LIC_NUM</th>
                                <th class="text-white">CLNT_ID</th>
                                <th class="text-white">APPL_ID</th>
                                <th class="text-white">ERP_PWR_DBM</th>
                                <th class="text-white">BWIDTH</th>
                                <th class="text-white">BHP</th>
                                <th class="text-white">EQ_MDL</th>
                                <th class="text-white">ANT_MDL</th>
                                <th class="text-white">HGT_ANT</th>
                                <th class="text-white">MASTER_PLZN_CODE</th>
                                <th class="text-white">SID_LONG</th>
                                <th class="text-white">SID_LAT</th>
                                <th class="text-white">MON_QURY</th>
                                <th class="text-white">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($microwavelinks as $column)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $column->curr_lic_num }}</td>
                                    <td>{{ $column->clnt_id }}</td>
                                    <td>{{ $column->appl_id }}</td>
                                    <td>{{ $column->erp_pwr_dbm }}</td>
                                    <td>{{ $column->bwidth }}</td>
                                    <td>{{ $column->bhp }}</td>
                                    <td>{{ $column->eq_mdl }}</td>
                                    <td>{{ $column->ant_mdl }}</td>
                                    <td>{{ $column->hgt_ant }}</td>
                                    <td>{{ $column->master_plzn_code }}</td>
                                    <td>{{ $column->sid_long }}</td>
                                    <td>{{ $column->sid_lat }}</td>
                                    <td>{{ $column->mon_query }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('microwavelinks.edit', $column->id) }}"
                                                class="btn btn-warning btn-sm mx-2"><i class="fas fa-edit"></i> Edit</a>
                                            <form action="{{ route('microwavelinks.destroy', $column->id) }}"
                                                method="POST">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
