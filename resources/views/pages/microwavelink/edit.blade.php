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
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="curr_lic_num">CURR_LIC_NUM</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="curr_lic_num"
                                name="curr_lic_num" value="{{ old('curr_lic_num') ?? $microwavelink->curr_lic_num }}"
                                required autocomplete="off" />
                            @error('curr_lic_num')
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
