<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class PraadmpRepository
{
    public function getById($id)
    {
        $data = DB::table('m_praadmp')
            ->join('users', 'm_praadmp.nrp', '=', 'users.nrp')
            ->where('m_praadmp.id', $id)
<<<<<<< HEAD
            ->first(['m_praadmp.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);
=======
            ->first(['m_praadmp.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.divisi']);
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
        
        return $data;
    }


    public function create($data)
    {
        return DB::table('m_praadmp')->insert([
            'nrp' => $data['nrp'],
            'ringkasan' => $data['ringkasan_admp'],
            'file_path' => $data['file_path'],
            'created_by' => auth()->user() ? auth()->user()->id : null,
            'created_name' => auth()->user() ? auth()->user()->username : null,
        ]);
    }

    public function edit($data, $id, $userRole)
    {
         
        return DB::table('m_praadmp')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown-edit'],
                'ringkasan' => $data['ringkasan_admp_edit'],
                'file_path' => $data['file_path'],
                'created_by' => auth()->user()->id,
                'created_name' => auth()->user()->username,
               
            ]);
    }

    public function getAll()
    {
        return DB::table('m_praadmp')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('m_praadmp')
            ->join('users', 'm_praadmp.nrp', '=', 'users.nrp')
<<<<<<< HEAD
            ->select('m_praadmp.*', 'users.name as username','users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
=======
            ->select('m_praadmp.*', 'users.name as username','users.departemen as departemen', 'users.divisi as divisi') // Sesuaikan alias dengan nama yang Anda inginkan
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
            ->get();

        return $data;
    }


    public function delete($selectedpraadmpId)
    {
        try {
            DB::table('m_praadmp')->where('id', $selectedpraadmpId)->delete();
            return 'Data admp Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data admp: ' . $e->getMessage();
        }
    }
   
}

?>
