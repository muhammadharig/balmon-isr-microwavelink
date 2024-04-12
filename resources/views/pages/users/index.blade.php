@extends('layouts.app', ['title' => 'Users'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Users</h5>
            <div class="card-body">
                @if (Auth::user()->role == 'admin')
                    <div class="d-flex align-items-start align-items-sm-center gap-4 mb-3">
                        <a href="{{ route('users.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i>Add New
                            User</a>
                    </div>
                @endif
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
                                @if (auth()->user()->role == 'pimpinan')
                                @elseif (auth()->user()->role == 'admin')
                                    <th class="text-white">Action</th>
                                @endif
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
                                        @if ($user->role == 'admin')
                                            <span class="badge bg-primary">{{ $user->role }}</span>
                                        @elseif($user->role == 'user')
                                            <span class="badge bg-secondary">{{ $user->role }}</span>
                                        @elseif($user->role == 'operator')
                                            <span class="badge bg-warning">{{ $user->role }}</span>
                                        @elseif($user->role == 'pimpinan')
                                            <span class="badge bg-dark">{{ $user->role }}</span>
                                        @endif
                                    </td>
                                    @if (Auth::user()->role == 'pimpinan')
                                    @elseif (Auth::user()->role == 'admin')
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-warning btn-sm mx-2"><i class="fas fa-edit"></i> Edit</a>
                                                @if ($user->role == 'admin')
                                                @else
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                                class="fas fa-trash"></i> Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
