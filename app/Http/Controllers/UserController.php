<?php
/*NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 */
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user.infoPengguna', compact('user'));
    }
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'phoneNumber' => 'required',
            'password' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'agama' => 'required',
            'gender' => 'required',
        ]);

        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'phoneNumber' => $request->phoneNumber,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'birthdate' => $request->birthdate,
                'agama' => $request->agama,
                'gender' => $request->gender,
            ]);


        return redirect()->route('user')->with('success', 'Koleksi berhasil diperbarui.');
    }
}