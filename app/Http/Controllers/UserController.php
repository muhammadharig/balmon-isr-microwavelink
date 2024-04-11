<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(User $user, UserRequest $userRequest)
    {
        $data = $userRequest->validated();
        $data['password'] = Hash::make($userRequest->password);

        $user->create($data);
        return redirect(route('users.index'))->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        // dd($user);
        return view('pages.users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $updateUserRequest)
    {
        // jika tidak menggunakan resource maka parameter harus membawa id
        $data = $updateUserRequest->validated();
        $user->update($data);
        return redirect(route('users.index'))->with('success', 'Data user berhasil diubah.');
    }

    public function updatePassword(User $user, UpdatePasswordRequest $updatePasswordRequest)
    {
        $data = $updatePasswordRequest->validated();
        $data['password'] = Hash::make($updatePasswordRequest->password);
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function editProfile(User $user)
    {
        return view('pages.users.profile', compact('user'));
    }

    public function updateProfile(User $user, UpdateProfileUserRequest $updateProfileUserRequest)
    {
        $data = $updateProfileUserRequest->validated();
        // cek apakah file sudah terupload
        if ($updateProfileUserRequest->hasFile('photo') && $updateProfileUserRequest->file('photo')->isValid()) {
            $fileName = time() . '.' . $updateProfileUserRequest->photo->extension();
            $updateProfileUserRequest->photo->storeAs('public/photos', $fileName);
            $data['photo'] = $fileName;
        } else {
            return back()->with('error', 'Kesalahan Dalam Upload File.');
        }
        // dd($data);
        $user->update($data);

        return back()->with('success', 'Data Profile Berhasil Di Perbarui.'); //mengembali ke halaman sebelumnya
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with('success', 'Data user berhasil dihapus.');
    }
}
