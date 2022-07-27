<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'welcome user test';
    }

    public function get($offset, $limit)
    {
        $users  = User::skip($offset)->take($limit)->get();
        return response()->json([
            'code'      => 200,
            'message'   => 'Data berhasil ditemukan',
            'response'  => $users
        ], 200);
    }

    public function details($id)
    {
        $users  = User::find($id);
        return response()->json([
            'code'      => 200,
            'message'   => 'Data berhasil ditemukan',
            'response'  => $users
        ], 200);
    }

    public function create(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->message());

        if ($validated == NULL) {
            return response()->json([
                'code'      => 412,
                'message'   => 'Data berhasil ditemukan',
                'response'  => $validated
            ], 412);
        }

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        return response()->json([
            'code'      => 200,
            'message'   => 'User berhasil ditambahkan',
            'response'  => []
        ], 200);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate($this->rules(), $this->message());

        if ($validated == NULL) {
            return response()->json([
                'code'      => 412,
                'message'   => 'Data berhasil ditemukan',
                'response'  => $validated
            ], 412);
        }

        User::where('id', $id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        return response()->json([
            'code'      => 200,
            'message'   => 'User berhasil diubah',
            'response'  => []
        ], 200);
    }

    public function delete($id, Request $request)
    {
        $users = User::find($id);
        $users->destroy($id);

        return response()->json([
            'code'      => 200,
            'message'   => 'Data berhasil dihapus',
            'response'  => []
        ], 200);
    }

    public function rules()
    {
        $rules = [
            'name'      => 'required',
            'email'     => 'required|unique:users,email|email',
            'password'  => 'required'
        ];
        return $rules;
    }

    public function message()
    {
        $message = [
            'name.required'     => 'Name tidak boleh kosong',
            'email.required'    => 'Email tidak boleh kosong',
            'email.unique'      => 'Email sudah terdaftar',
            'email.email'       => 'Format Email salah',
            'password.required' => 'Password tidak boleh kosong'
        ];
        return $message;
    }
}
