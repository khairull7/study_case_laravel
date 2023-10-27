<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);
    
        $pass = substr($request->email, 0, 3) . substr($request->name, 0, 3);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($pass),
            'role' => $request->role,
        ]);
    
        return redirect()->back()->with('success', 'Akun berhasil dibuat!');
    }
    
    /**
     * Display the specified resource.
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $user = User::find($id);
        // atau $medicine = Medicine::where('id', $id)->first()
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    if($request->password == null){
        $passwordBaru = $request->passwordLama;
    }else{
        $passwordBaru = hash::make($request->password);
    }


    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required',
        'role' => 'required',
    ]);

    User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => $passwordBaru
    ]);

    return redirect()->route('user.home')->with('success', 'Berhasil mengubah data!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus Akun!');
    }


}