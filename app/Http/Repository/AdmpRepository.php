<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class admpRepository
{
    public function getById($id)
    {
        $data = DB::table('pocket_moving_tbl_t_admp')
            ->join('users', 'pocket_moving_tbl_t_admp.nrp', '=', 'users.nrp')
            ->where('pocket_moving_tbl_t_admp.id', $id)
            ->first(['pocket_moving_tbl_t_admpp.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.divisi']);
        
            $data->username = $data->nama;
        return $data;
    }

    public function create($data)
    {
        return DB::table('pocket_moving_tbl_t_admp')->insert([
            'nrp' => $data['nrp-dropdown'],
            'NAMA' => $data['name-add'],
            'ADMP_JA_START_DATE' => $data['start_admp'],
            'ADMP_JA_FINISH_DATE' => $data['finis_admp'],
            'JA_RESULT_DESCRIPTION' => $data['result_description'],
            'JA_TARGET_DESCRIPTION' => $data['target_description'],
            'JA_SHORT_DESCRIPTION' => $data['short_description'],
            'keterangan' => $data['ket_admp'],
            'status' => 1
            
        ]);
    }

    public function getAllWithDate()
    {
        return DB::table('pocket_moving_tbl_t_admp')
            ->join('users', 'pocket_moving_tbl_t_admp.nrp', '=', 'users.nrp')
            ->select(
                'pocket_moving_tbl_t_admp.*',
                'users.name as username',
            )
            ->orderBy('pocket_moving_tbl_t_admp.ADMP_JA_START_DATE', 'desc'); 
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
        return DB::table('pocket_moving_tbl_t_admp')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown'],
                'nama' => $data['nama_admp_add'],
                'jenis' => $data['jenis_admp_add'],
                'informasi' => $data['informasi_admp'],
                'waktu' => $data['waktu_admp'],
                'tempat' => $data['tempat_admp'],
                'kode_status' => $kodeStatus,
            ]);
    }

    public function getAll()
    {
        return DB::table('pocket_moving_tbl_t_admp')->get();
    }

    public function getAllWithUsername()
{
    $data = DB::table('pocket_moving_tbl_t_admp')
        ->join('users', 'pocket_moving_tbl_t_admp.nrp', '=', 'users.nrp')
        ->select('pocket_moving_tbl_t_admp.*', 'users.name as username') 
        ->get();

    return $data;
}

    public function send($userId, $userRole, $sendName, $selectedadmpId)
    {

        $admp = DB::table('pocket_moving_tbl_t_admp')->where('id', $selectedadmpId)->first();
        if (!$admp) {
            return "admp not found";
        }

        $currentKodeStatus = $admp->kode_status;
        $newKodeStatus = $currentKodeStatus + 1;
    
        DB::table('pocket_moving_tbl_t_admp')
            ->where('id', $selectedadmpId)
            ->update([
                'send_by' => $userId,
                'send_name' => $sendName,
                'send_on' => now(),
                'kode_status' => $newKodeStatus
            ]);
    
        return "Status updated successfully";
    }

    public function revisi($revisiName, $selectedadmpId, $userRole, $pesanRevisi, $userId)
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

        DB::table('pocket_moving_tbl_t_admp')
            ->where('id', $selectedadmpId)
            ->update([
                'revisi_by' => $userId,
                'revisi_name' => $revisiName,
                'kode_status' => $kodeStatus,
                'revisi_desc' => $pesanRevisi
            ]);

        return 'Data admp berhasil di "Revisi"';
    }

    public function reject($rejectName, $selectedadmpId, $pesanReject, $userId)
    {
    
        DB::table('pocket_moving_tbl_t_admp')
            ->where('id', $selectedadmpId)
            ->update([
                'reject_by' => $userId,
                'reject_name' => $rejectName,
                'kode_status' => 8,
                'reject_desc' => $pesanReject
            ]);

        return 'Data admp Berhasil di "Reject"';
    }

    public function delete($selectedadmpId)
    {
        try {
            DB::table('pocket_moving_tbl_t_admp')->where('id', $selectedadmpId)->delete();
            return 'Data admp Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data admp: ' . $e->getMessage();
        }
    }
   
}

?>