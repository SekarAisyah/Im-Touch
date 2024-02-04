<<<<<<< HEAD
<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
=======
<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

<<<<<<< HEAD
class admpRepository
=======
Class admpRepository
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
{
    public function getById($id)
    {
        $data = DB::table('pocket_moving_tbl_t_admp')
<<<<<<< HEAD
            ->join('users', 'pocket_moving_tbl_t_admp.NRP', '=', 'users.nrp')
            ->where('pocket_moving_tbl_t_admp.PID', $id)
            ->first(['pocket_moving_tbl_t_admp.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan', 'users.phone_number', 'users.alamat']);

        // $data->username = $data->nama;
=======
            ->join('users', 'pocket_moving_tbl_t_admp.nrp', '=', 'users.nrp')
            ->where('pocket_moving_tbl_t_admp.id', $id)
            ->first(['pocket_moving_tbl_t_admpp.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.divisi']);
        
            $data->username = $data->nama;
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
        return $data;
    }

    public function create($data)
    {
        return DB::table('pocket_moving_tbl_t_admp')->insert([
<<<<<<< HEAD
            'PID' =>  Str::random(4),
            'NRP' => $data['nrp-dropdown'],
            'NAMA' => $data['nama_admp_add'],
            'ADMP_JA_START_DATE' => $data['star_admp'],
            'ADMP_JA_FINISH_DATE' => $data['finish_admp'],
            'JA_RESULT_DESCRIPTION' => $data['ja_result'],
            'JA_TARGET_DESCRIPTION' => $data['ja_target'],
            'JA_SHORT_DESCRIPTION' => $data['ja_short'],
            'status' => 1,
            // 'CREATE_BY' => auth()->user()->id,
            // 'CREATE_NAME' => auth()->user()->username,

=======
            'nrp' => $data['nrp-dropdown'],
            'NAMA' => $data['name-add'],
            'ADMP_JA_START_DATE' => $data['start_admp'],
            'ADMP_JA_FINISH_DATE' => $data['finis_admp'],
            'JA_RESULT_DESCRIPTION' => $data['result_description'],
            'JA_TARGET_DESCRIPTION' => $data['target_description'],
            'JA_SHORT_DESCRIPTION' => $data['short_description'],
            'keterangan' => $data['ket_admp'],
            'status' => 1
            
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
        ]);
    }

    public function getAllWithDate()
    {
        return DB::table('pocket_moving_tbl_t_admp')
<<<<<<< HEAD
            ->join('users', 'pocket_moving_tbl_t_admp.NRP', '=', 'users.nrp')
            ->select(
                'pocket_moving_tbl_t_admp.*',
                'users.name as username',
                'users.departemen as departemen',
                'users.perusahaan as perusahaan'
            )
            ->orderBy('pocket_moving_tbl_t_admp.ADMP_JA_START_DATE', 'desc');
=======
            ->join('users', 'pocket_moving_tbl_t_admp.nrp', '=', 'users.nrp')
            ->select(
                'pocket_moving_tbl_t_admp.*',
                'users.name as username',
            )
            ->orderBy('pocket_moving_tbl_t_admp.ADMP_JA_START_DATE', 'desc'); 
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
    }

    public function edit($data, $id, $userRole)
    {
<<<<<<< HEAD
        $kodeStatus = 1;
=======
        $kodeStatus = 1; 
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
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
<<<<<<< HEAD
            ->where('PID', $id)
            ->update([
                'NRP' => $data['nrp-dropdown'],
                'NAMA' => $data['nama_admp_add'],
                'ADMP_JA_START_DATE' => $data['star_admp'],
                'ADMP_JA_FINISH_DATE' => $data['finish_admp'],
                'JA_RESULT_DESCRIPTION' => $data['ja_result'],
                'JA_TARGET_DESCRIPTION' => $data['ja_target'],
                'JA_SHORT_DESCRIPTION' => $data['ja_short'],
                'status' => $kodeStatus,
=======
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown'],
                'nama' => $data['nama_admp_add'],
                'jenis' => $data['jenis_admp_add'],
                'informasi' => $data['informasi_admp'],
                'waktu' => $data['waktu_admp'],
                'tempat' => $data['tempat_admp'],
                'kode_status' => $kodeStatus,
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
            ]);
    }

    public function getAll()
    {
        return DB::table('pocket_moving_tbl_t_admp')->get();
    }

    public function getAllWithUsername()
<<<<<<< HEAD
    {
        $data = DB::table('pocket_moving_tbl_t_admp')
            ->join('users', 'pocket_moving_tbl_t_admp.NRP', '=', 'users.nrp')
            ->select('pocket_moving_tbl_t_admp.*', 'users.name as username', 'users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->get();

        return $data;
    }
=======
{
    $data = DB::table('pocket_moving_tbl_t_admp')
        ->join('users', 'pocket_moving_tbl_t_admp.nrp', '=', 'users.nrp')
        ->select('pocket_moving_tbl_t_admp.*', 'users.name as username') 
        ->get();

    return $data;
}
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9

    public function send($userId, $userRole, $sendName, $selectedadmpId)
    {

<<<<<<< HEAD
        $admp = DB::table('pocket_moving_tbl_t_admp')->where('PID', $selectedadmpId)->first();
=======
        $admp = DB::table('pocket_moving_tbl_t_admp')->where('id', $selectedadmpId)->first();
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
        if (!$admp) {
            return "admp not found";
        }

<<<<<<< HEAD
        $currentKodeStatus = $admp->status;
        $newKodeStatus = $currentKodeStatus + 1;

        if ($newKodeStatus == 2) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'status' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 3) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_ATASAN' => 1,
                    'UPDATE_AT_ATASAN' => now(),
                    'status' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 4) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_HR' => 1,
                    'UPDATE_AT_HR' => now(),
                    'status' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 5) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_HR_MNG' => 1,
                    'UPDATE_AT_HR_MNG' => now(),
                    'status' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 6) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_DRC' => 1,
                    'UPDATE_AT_DRC' => now(),
                    'status' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 7) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'status' => 7,
                ]);
        }

=======
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
    
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
        return "Status updated successfully";
    }

    public function revisi($revisiName, $selectedadmpId, $userRole, $pesanRevisi, $userId)
    {
<<<<<<< HEAD
        $kodeStatus = 8; // Default value

        switch ($userRole) {
            case 2:
                $kodeStatus = 8;
                $ket_atasan = $pesanRevisi;
                break;
            case 3:
                $kodeStatus = 9;
                $ket_hr =  $pesanRevisi;
                break;
            case 4:
                $kodeStatus = 10;
                $ket_hr_mng = $pesanRevisi;
                break;
            case 5:
                $kodeStatus = 11;
                $ket_drc = $pesanRevisi;
                break;
            default:
                // $kodeStatus = 8;
                if ($kodeStatus == 8) {
                    $ket_atasan = $pesanRevisi;
                } else if ($kodeStatus == 9) {
                    $ket_hr =  $pesanRevisi;
                } else if ($kodeStatus == 10) {
                    $ket_hr_mng = $pesanRevisi;
                } else if ($kodeStatus == 11) {
                    $ket_drc = $pesanRevisi;
                } else {
                    $ket_atasan = $pesanRevisi;
                }
                break;
        }

        if ($kodeStatus == 8) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'status' => $kodeStatus,
                    'UPDATE_AT_ATASAN' => now(),
                    'keterangan' => $ket_atasan
                ]);
        } else if ($kodeStatus == 9) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'KETERANGAN_HR' => $ket_hr,
                    'UPDATE_AT_HR' => now(),
                    'status' => $kodeStatus
                ]);
        } else if ($kodeStatus == 10) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'KETERANGAN_HR_MNG' => $ket_hr_mng,
                    'UPDATE_AT_HR_MNG' => now(),
                    'status' => $kodeStatus
                ]);
        } else if ($kodeStatus == 11) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'KETERANGAN_DRC' => $ket_drc,
                    'UPDATE_AT_DRC' => now(),
                    'status' => 11,
                ]);
        }
=======
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
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9

        return 'Data admp berhasil di "Revisi"';
    }

<<<<<<< HEAD
    public function reject($rejectName, $selectedadmpId, $pesanReject, $userId, $userRole)
    {

        switch ($userRole) {
            case 2:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'status' => 7,
                        'keterangan' => $pesanReject,
                    ]);
                break;
            case 3:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_HR' => 0,
                        'status' => 7,
                        'KETERANGAN_HR' => $pesanReject,
                    ]);
                break;
            case 4:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_HR_MNG' => 0,
                        'status' => 7,
                        'KETERANGAN_HR_MNG' => $pesanReject,
                    ]);
                break;
            case 5:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_DRC' => 0,
                        'status' => 7,
                        'KETERANGAN_DRC' => $pesanReject,
                    ]);
                break;
            default:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'status' => 7,
                        'keterangan' => $pesanReject,
                    ]);
                break;
        }
=======
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
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9

        return 'Data admp Berhasil di "Reject"';
    }

    public function delete($selectedadmpId)
    {
        try {
<<<<<<< HEAD
            DB::table('pocket_moving_tbl_t_admp')->where('PID', $selectedadmpId)->delete();
=======
            DB::table('pocket_moving_tbl_t_admp')->where('id', $selectedadmpId)->delete();
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
            return 'Data admp Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data admp: ' . $e->getMessage();
        }
    }
<<<<<<< HEAD
}
=======
   
}

?>
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
