@extends('layouts.app', ['title' => 'Edit Data'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Data</h5>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form action="{{ route('microwavelinks.update', $microwavelink->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="curr_lic_num">CURR_LIC_NUM</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="curr_lic_num"
                                name="curr_lic_num" value="{{ old('curr_lic_num') ?? $microwavelink->curr_lic_num }}"
                                required autocomplete="off" />
                            @error('curr_lic_num')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="clnt_id">CLNT_ID</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror" id="clnt_id"
                                name="clnt_id" value="{{ old('clnt_id') ?? $microwavelink->clnt_id }}" required
                                autocomplete="off" />
                            @error('clnt_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="appl_id">APPL_ID</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror" id="appl_id"
                                name="appl_id" value="{{ old('appl_id') ?? $microwavelink->appl_id }}" required
                                autocomplete="off" />
                            @error('appl_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="freq_pair">FREQ_PAIR</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror" id="freq_pair"
                                name="freq_pair" value="{{ old('freq_pair') ?? $microwavelink->freq_pair }}"
                                autocomplete="off" />
                            @error('freq_pair')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="erp_pwr_dbm">ERP_PWR_DBM</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror" id="erp_pwr_dbm"
                                name="erp_pwr_dbm" value="{{ old('erp_pwr_dbm') ?? $microwavelink->erp_pwr_dbm }}" required
                                autocomplete="off" />
                            @error('erp_pwr_dbm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="bwidth">BWIDTH</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror" id="bwidth"
                                name="bwidth" value="{{ old('bwidth') ?? $microwavelink->bwidth }}" required
                                autocomplete="off" />
                            @error('bwidth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="bhp">BHP</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror" id="bhp"
                                name="bhp" value="{{ old('bhp') ?? $microwavelink->bhp }}" autocomplete="off" />
                            @error('bhp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="eq_mdl">EQ_MDL</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="eq_mdl"
                                name="eq_mdl" value="{{ old('eq_mdl') ?? $microwavelink->eq_mdl }}" required
                                autocomplete="off" />
                            @error('eq_mdl')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="ant_mdl">ANT_MDL</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="ant_mdl"
                                name="ant_mdl" value="{{ old('ant_mdl') ?? $microwavelink->ant_mdl }}" required
                                autocomplete="off" />
                            @error('ant_mdl')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="hgt_ant">HGT_ANT</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror" id="hgt_ant"
                                name="hgt_ant" value="{{ old('hgt_ant') ?? $microwavelink->hgt_ant }}" required
                                autocomplete="off" />
                            @error('hgt_ant')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="master_plzn_code">MASTER_PLZN_CODE</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="master_plzn_code" name="master_plzn_code"
                                value="{{ old('master_plzn_code') ?? $microwavelink->master_plzn_code }}" required
                                autocomplete="off" />
                            @error('master_plzn_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="sid_long">SID_LONG</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror"
                                id="sid_long" name="sid_long" value="{{ old('sid_long') ?? $microwavelink->sid_long }}"
                                required autocomplete="off" />
                            @error('sid_long')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="sid_lat">SID_LAT</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror"
                                id="sid_lat" name="sid_lat" value="{{ old('sid_lat') ?? $microwavelink->sid_lat }}"
                                required autocomplete="off" />
                            @error('sid_lat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="link_id">LINK_ID</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror"
                                id="link_id" name="link_id" value="{{ old('link_id') ?? $microwavelink->link_id }}"
                                required autocomplete="off" />
                            @error('link_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="mon_query">MON_QUERY</label>
                            <input type="date" class="form-control @error('name') is-invalid @enderror"
                                id="mon_query" name="mon_query"
                                value="{{ old('mon_query') ?? $microwavelink->mon_query }}" required
                                autocomplete="off" />
                            @error('mon_query')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <Button type="reset" class="btn btn-secondary">Reset</Button>
                </form>
            </div>
        </div>
    </div>
@endsection
