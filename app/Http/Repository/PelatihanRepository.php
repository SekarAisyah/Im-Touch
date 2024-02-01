<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class pelatihanRepository
{
    public function getById($id)
    {
        $data = DB::table('m_pelatihan')
            ->join('users', 'm_pelatihan.nrp', '=', 'users.nrp')
            ->where('m_pelatihan.id', $id)
            ->first(['m_pelatihan.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.divisi', 'users.phone_number','users.alamat']);
        
            //$data->username = $data->nama;
        return $data;
    }

    public function create($data, $userRole)
    {

       
        return DB::table('m_pelatihan')->insert([
            'nrp' => $data['nrp-dropdown'],
            'nama' => $data['nama_pelatihan_add'],
            'jenis' => $data['jenis_pelatihan'],
            'informasi' => $data['informasi_pelatihan'],
            'narasumber' => $data['narasumber'],
            'alasan' => $data['alasan_pelatihan'],
            'sharing' => $data['sharing_pelatihan'],
            'waktu' => $data['waktu_pelatihan'],
            'tempat' => $data['tempat_pelatihan'],
            'biaya' => $data['biaya_pelatihan'],
            'kode_status' => 1, 
            'created_by' => auth()->user()->id,
            'created_name' => auth()->user()->username,
        
        ]);
    }

    public function edit($data, $id, $userRole)
    {
        $kodeStatus = 1; // Default value

        // Menentukan nilai kode_status berdasarkan nilai userRole
        switch ($userRole) {
            case 1:
                $kodeStatus = 1;
                break;
            case 2:
                $kodeStatus = 3;
                break;
            case 3:
                $kodeStatus = 4;
                break;
            case 4:
                $kodeStatus = 5;
                break;
            case 5:
                $kodeStatus = 6;
                break;
            default:
                $kodeStatus = 1;
                break;
        }
        return DB::table('m_pelatihan')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown'],
                'nama' => $data['nama_pelatihan_add'],
                'jenis' => $data['jenis_pelatihan'],
                'informasi' => $data['informasi_pelatihan'],
                'narasumber' => $data['narasumber'],
                'alasan' => $data['alasan_pelatihan'],
                'sharing' => $data['sharing_pelatihan'],
                'waktu' => $data['waktu_pelatihan'],
                'tempat' => $data['tempat_pelatihan'],
                'biaya' => $data['biaya_pelatihan'],
                'kode_status' => $kodeStatus,
            ]);
    }

    public function getAll()
    {
        return DB::table('m_pelatihan')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('m_pelatihan')
            ->join('users', 'm_pelatihan.nrp', '=', 'users.nrp')
            ->select('m_pelatihan.*', 'users.name as username','users.departemen as departemen', 'users.divisi as divisi') // Sesuaikan alias dengan nama yang Anda inginkan
            ->get();

        return $data;
    }

    public function getAllWithDate()
    {
        return DB::table('m_pelatihan')
            ->join('users', 'm_pelatihan.nrp', '=', 'users.nrp')
            ->select(
                'm_pelatihan.*',
                'users.name as username',
                'users.departemen as departemen',
                'users.divisi as divisi'
            )
            ->orderBy('m_pelatihan.waktu', 'desc'); 
    }

    public function getAllWithUsernameAndDateRange($start_date, $end_date)
    {
        $query = DB::table('m_pelatihan')
            ->join('users', 'm_pelatihan.nrp', '=', 'users.nrp')
            ->select('m_pelatihan.*', 'users.name as username', 'users.departemen as departemen', 'users.divisi as divisi')
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                // Ubah format input tanggal ke format yang diharapkan oleh database
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));

                return $query->whereBetween('m_pelatihan.waktu', [$start_date, $end_date]);
            })
            ->get();

        return $query;
    }

    public function send($userId, $userRole, $sendName, $selectedPelatihanId)
    {

        $pelatihan = DB::table('m_pelatihan')->where('id', $selectedPelatihanId)->first();
        if (!$pelatihan) {
            return "Pelatihan not found";
        }

        $currentKodeStatus = $pelatihan->kode_status;
        $newKodeStatus = $currentKodeStatus + 1;
    
        DB::table('m_pelatihan')
            ->where('id', $selectedPelatihanId)
            ->update([
                'send_by' => $userId,
                'send_name' => $sendName,
                'send_on' => now(),
                'kode_status' => $newKodeStatus
            ]);
    
        return "Status updated successfully";
    }

    // public function revisi($revisiName,$userRole, $selectedPelatihanId, $pesanRevisi, $userId)
    // {
    //     DB::table('m_pelatihan')
    //         ->where('id', $selectedPelatihanId)
    //         ->update([
    //             'revisi_by' => $userId,
    //             'revisi_name' => $revisiName,
    //             'kode_status' => 9,
    //             'revisi_desc' => $pesanRevisi
    //         ]);

    //     return 'Data Pelatihan berhasil di "Revisi"';
    // }

    public function revisi($revisiName, $userRole, $selectedPelatihanId, $pesanRevisi, $userId)
    {
        $kodeStatus = 9; // Default value

        switch ($userRole) {
            case 2:
                $kodeStatus = 9;
                break;
            case 3:
                $kodeStatus = 10;
                break;
            case 4:
                $kodeStatus = 11;
                break;
            case 5:
                $kodeStatus = 12;
                break;
            default:
                $kodeStatus = 9;
                break;
        }

        DB::table('m_pelatihan')
            ->where('id', $selectedPelatihanId)
            ->update([
                'revisi_by' => $userId,
                'revisi_name' => $revisiName,
                'kode_status' => $kodeStatus,
                'revisi_desc' => $pesanRevisi
            ]);

        return 'Data Pelatihan berhasil di "Revisi"';
    }


    public function reject($rejectName, $selectedPelatihanId, $pesanReject, $userId)
    {
    
        DB::table('m_pelatihan')
            ->where('id', $selectedPelatihanId)
            ->update([
                'reject_by' => $userId,
                'reject_name' => $rejectName,
                'kode_status' => 8,
                'reject_desc' => $pesanReject
            ]);

        return 'Data Pelatihan Berhasil di "Reject"';
    }

    public function delete($selectedPelatihanId)
    {
        try {
            DB::table('m_pelatihan')->where('id', $selectedPelatihanId)->delete();
            return 'Data Pelatihan Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data pelatihan: ' . $e->getMessage();
        }
    }
   
}

?>