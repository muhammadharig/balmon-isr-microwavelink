@extends('layouts.app', ['title' => 'Users'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Users</h5>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4 mb-3">
                    <a href="{{ route('users.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i>Add New
                        User</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped" id="tbl-users">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-white">No</th>
                                <th class="text-white">Photo</th>
                                <th class="text-white">Name</th>
                                <th class="text-white">Email</th>
                                <th class="text-white">Phone</th>
                                <th class="text-white">Role</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($user->photo == null)
                                            <img src="{{ asset('sneat') }}/assets/img/avatars/user.jpg"
                                                class="w-px-40 h-auto rounded-circle" alt="Avatar">
                                        @elseif ($user->photo != null)
                                            <img src="{{ asset('storage/photos/' . $user->photo) }}"
                                                class="w-px-40 h-auto rounded-circle" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->role == 'user')
                                            <span class="badge bg-dark">{{ $user->role }}</span>
                                        @elseif ($user->role == 'operator')
                                            <span class="badge bg-primary">{{ $user->role }}</span>
                                        @elseif ($user->role == 'pimpinan')
                                            <span class="badge bg-success">{{ $user->role }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-warning btn-sm mx-2"><i class="fas fa-edit"></i> Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="fas fa-trash"></i>
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
