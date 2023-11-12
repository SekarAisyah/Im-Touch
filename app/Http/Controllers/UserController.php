<?php

namespace App\Http\Controllers;
use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function showLoginForm()
    {
        return view('/administration/login'); 
    }

    public function loginku(Request $request)
    {

        // dd($request);
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // $hashedPassword = Hash::make($request->input('password'));
        // //$credentials = $request->only('email', 'password');
        // $credentials = [
        //     'email' => $request->input('email'),
        //     'password' => $hashedPassword,
        // ];
        // // dd($credentials);
        
        // if (Auth::attempt($credentials)) {
        //     // Pengguna berhasil masuk
        //     return redirect('/dashboard');
        // } else {
        //     // Gagal masuk, kembali ke halaman login dengan pesan kesalahan
        //     return back()->withErrors(['email' => 'Email atau password salah.']);
        // }
     
    $credentials = $request->only('email', 'password');
    //dd($credentials);
    if (Auth::attempt($credentials)) {
        // Pengguna berhasil masuk
        
        return redirect('/dashboard');

    } else {
        // Gagal masuk, kembali ke halaman login dengan pesan kesalahan
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }


        
    }

    public function showRegistrationForm()
    {
        return view('administration/register');
    }

    public function register(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'username' => 'required|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        $data = $request->all();
        //$data['password'] = Hash::make($data['password']); // Hash the password
        // dd($data);
        $user = $this->UserRepository->createUser($data);
    
        return redirect('/')->with('success', 'Registrasi berhasil! Silakan masuk.');

    }
}
