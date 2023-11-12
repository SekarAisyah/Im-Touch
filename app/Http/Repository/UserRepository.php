<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers\BaseHelper;

class UserRepository
{
    // public static function authenticate(array $credentials)
    // {
    //     $user = DB::table('users')
    //                 ->where(function ($query) use ($credentials) {
    //                     $query->where('password', $credentials['password'])
    //                           ->orWhere('email', $credentials['email']);
    //                 })
    //                 ->first();
    
    //     if ($user) {
    //         return true;
    //     }
    
    //     return false;
    // }

//     public static function authenticate(array $credentials)
// {
//     $user = DB::table('users')
//                 ->where(function ($query) use ($credentials) {
//                     $query->where('password', $credentials['password'])
//                           ->orWhere('email', $credentials['email']);
//                 })
//                 ->first();

//     if ($user) {
//         return true;
//     }

//     return false;
// }

// public function createUser(array $data)
//     {
//         $result = DB::table('users')->insert($data);

//     return $result;
//     }

public function createUser(array $data)
    {
        // Gunakan Hash::make untuk mengamankan kata sandi sebelum disimpan
        $data['password'] = Hash::make($data['password']);

        // Gunakan metode insertGetId untuk mendapatkan ID yang baru disisipkan
        $userId = DB::table('users')->insertGetId($data);

        return $userId;
    }

    public function authenticate(array $credentials)
    {
        // Ganti query dengan query SQL Server yang sesuai
        $user = DB::table('users')->where('email', $credentials['email'])->first();

        if ($user && $this->verifyPassword($credentials['password'], $user->password)) {
            return true;
        }

        return false;
    }

    protected function verifyPassword($password, $hashedPassword)
    {
        // Sesuaikan dengan algoritma hashing yang digunakan di SQL Server
        // Dalam contoh ini, diasumsikan bahwa kolom 'password' disimpan dengan algoritma HASHBYTES('SHA2_256', ...)
        $sqlServerHash = hash('sha256', $password); // Sesuaikan dengan algoritma SQL Server

        // Verifikasi dengan hash yang dihasilkan dari SQL Server
        return $sqlServerHash === $hashedPassword;
    }

    
}
