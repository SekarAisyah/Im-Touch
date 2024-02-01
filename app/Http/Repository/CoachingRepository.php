<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class CoachingRepository
{
    public function getById($id)
    {
        $data = DB::table('m_coaching')
            ->join('users', 'm_coaching.nrp', '=', 'users.nrp')
            ->where('m_coaching.id', $id)
            ->first(['m_coaching.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.divisi']);
        
            $data->username = $data->nama;
        return $data;
    }

    public function create($data)
    {
        return DB::table('m_coaching')->insert([
            'nrp' => $data['nrp-dropdown'],
            'nama' => $data['nama_coaching_add'],
            'jenis' => $data['jenis_coaching_add'],
            'informasi' => $data['informasi_coaching'],
            'waktu' => $data['waktu_coaching'],
            'tempat' => $data['tempat_coaching'],
            'kode_status' => 1, 
            'created_by' => auth()->user()->id,
            'created_name' => auth()->user()->username,
        
        ]);
    }

    public function getAllWithDate()
    {
        return DB::table('m_coaching')
            ->join('users', 'm_coaching.nrp', '=', 'users.nrp')
            ->select(
                'm_coaching.*',
                'users.name as username',
                'users.departemen as departemen',
                'users.divisi as divisi'
            )
            ->orderBy('m_coaching.waktu', 'desc'); 
    }

    public function edit($data, $id, $userRole)
    {
        $kodeStatus = 1;
        
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
        return DB::table('m_coaching')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown'],
                'nama' => $data['nama_coaching_add'],
                'jenis' => $data['jenis_coaching_add'],
                'informasi' => $data['informasi_coaching'],
                
                'waktu' => $data['waktu_coaching'],
                'tempat' => $data['tempat_coaching'],
                
                'kode_status' => $kodeStatus,
            ]);
    }

    public function getAll()
    {
        return DB::table('m_coaching')->get();
    }

    public function getAllWithUsername()
{
    $data = DB::table('m_coaching')
        ->join('users', 'm_coaching.nrp', '=', 'users.nrp')
        ->select('m_coaching.*', 'users.name as username','users.departemen as departemen', 'users.divisi as divisi') // Sesuaikan alias dengan nama yang Anda inginkan
        ->get();

    return $data;
}

    public function send($userId, $userRole, $sendName, $selectedcoachingId)
    {

        $coaching = DB::table('m_coaching')->where('id', $selectedcoachingId)->first();
        if (!$coaching) {
            return "Coaching not found";
        }

        $currentKodeStatus = $coaching->kode_status;
        $newKodeStatus = $currentKodeStatus + 1;
    
        DB::table('m_coaching')
            ->where('id', $selectedcoachingId)
            ->update([
                'send_by' => $userId,
                'send_name' => $sendName,
                'send_on' => now(),
                'kode_status' => $newKodeStatus
            ]);
    
        return "Status updated successfully";
    }

    public function revisi($revisiName, $selectedCoachingId, $userRole, $pesanRevisi, $userId)
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

        DB::table('m_coaching')
            ->where('id', $selectedCoachingId)
            ->update([
                'revisi_by' => $userId,
                'revisi_name' => $revisiName,
                'kode_status' => $kodeStatus,
                'revisi_desc' => $pesanRevisi
            ]);

        return 'Data coaching berhasil di "Revisi"';
    }

    public function reject($rejectName, $selectedcoachingId, $pesanReject, $userId)
    {
    
        DB::table('m_coaching')
            ->where('id', $selectedcoachingId)
            ->update([
                'reject_by' => $userId,
                'reject_name' => $rejectName,
                'kode_status' => 8,
                'reject_desc' => $pesanReject
            ]);

        return 'Data Coaching Berhasil di "Reject"';
    }

    public function delete($selectedcoachingId)
    {
        try {
            DB::table('m_coaching')->where('id', $selectedcoachingId)->delete();
            return 'Data Coaching Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data coaching: ' . $e->getMessage();
        }
    }
   
}

?>