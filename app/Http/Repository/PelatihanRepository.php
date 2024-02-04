<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; //Baru
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

class pelatihanRepository
{
    public function getById($id)
    {
        $data = DB::table('m_pelatihan')
            ->join('users', 'm_pelatihan.nrp', '=', 'users.nrp')
            ->where('m_pelatihan.id', $id)
            ->first(['m_pelatihan.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);

        return $data;
    }

    public function create($data, $userRole)
    {
        return DB::table('m_pelatihan')->insert([
            'nrp' => $data['nrp'],
            'nama' => $data['nama_pelatihan'],
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
        return DB::table('m_pelatihan')
            ->where('id', $id)
            ->update([
                'nama' => $data['nama_pelatihan'],
                'informasi' => $data['informasi_pelatihan'],
                'narasumber' => $data['narasumber'],
                'alasan' => $data['alasan_pelatihan'],
                'sharing' => $data['sharing_pelatihan'],
                'waktu' => $data['waktu_pelatihan'],
                'tempat' => $data['tempat_pelatihan'],
                'biaya' => $data['biaya_pelatihan'],
                'kode_status' => 1,
            ]);
    }

    public function getAll()
    {
        return DB::table('pocket_moving_tbl_t_pelatihan')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('pocket_moving_tbl_t_pelatihan')
            ->join('users', 'pocket_moving_tbl_t_pelatihan.NRP', '=', 'users.nrp')
            ->select('pocket_moving_tbl_t_pelatihan.*', 'users.name as username', 'users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->get();

        return $data;
    }

    public function getAllWithDate()
    {
        return DB::table('pocket_moving_tbl_t_pelatihan')
            ->join('users', 'pocket_moving_tbl_t_pelatihan.NRP', '=', 'users.nrp')
            ->select(
                'pocket_moving_tbl_t_pelatihan.*',
                'users.name as username',
                'users.departemen as departemen',
                'users.perusahaan as perusahaan'
            )
            ->orderBy('pocket_moving_tbl_t_pelatihan.MULAI_TRAINING', 'desc');
    }

    public function getAllWithUsernameAndDateRange($start_date, $end_date)
    {
        $query = DB::table('pocket_moving_tbl_t_pelatihan')
            ->join('users', 'pocket_moving_tbl_t_pelatihan.NRP', '=', 'users.nrp')
            ->select('pocket_moving_tbl_t_pelatihan.*', 'users.name as username', 'users.departemen as departemen', 'users.perusahaan as perusahaan')
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                // Ubah format input tanggal ke format yang diharapkan oleh database
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));

                return $query->whereBetween('pocket_moving_tbl_t_pelatihan.MULAI_TRAINING', [$start_date, $end_date]);
            })
            ->get();

        return $query;
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

        $pelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('PID', $selectedPelatihanId)->first();
        if (!$pelatihan) {
            return "Pelatihan not found";
        }

        // $kodeStatus = 1; // Default value
        $currentKodeStatus = $pelatihan->STATUS;
        $newKodeStatus = $currentKodeStatus + 1;

        if ($newKodeStatus == 2) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 3) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_ATASAN' => 1,
                    'UPDATE_AT_ATASAN' => now(),
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 4) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_HR' => 1,
                    'UPDATE_AT_HR' => now(),
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 5) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_HR_MNG' => 1,
                    'UPDATE_AT_HR_MNG' => now(),
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 6) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_DRC' => 1,
                    'UPDATE_AT_DRC' => now(),
                    'STATUS' => $newKodeStatus,
                    'IS_PLAN_ATMP' => 'Yes',
                    'TRAINING_DONE' => 'Yes',
                ]);
        }

        return "Status updated successfully";
    }

    public function revisi($revisiName, $selectedPelatihanId, $pesanRevisi, $userId)
    {
    
        DB::table('m_pelatihan')
            ->where('id', $selectedPelatihanId)
            ->update([
                'revisi_by' => $userId,
                'revisi_name' => $revisiName,
                'kode_status' => 9,
                'revisi_desc' => $pesanRevisi
            ]);

        return 'Data Pelatihan berhasil di "Revisi"';
    }



    public function reject($rejectName, $selectedPelatihanId, $pesanReject, $userId, $userRole)
    {
        switch ($userRole) {
            case 2:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_ATASAN' => $pesanReject,
                    ]);
                break;
            case 3:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_HR' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_HR' => $pesanReject,
                    ]);
                break;
            case 4:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_HR_MNG' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_HR_MNG' => $pesanReject,
                    ]);
                break;
            case 5:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_DRC' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_DRC' => $pesanReject,
                    ]);
                break;
            default:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_ATASAN' => $pesanReject,
                    ]);
                break;
        }




        return 'Data Pelatihan Berhasil di "Reject"';
    }

    public function delete($selectedPelatihanId)
    {
        try {
            DB::table('m_pelatihan')->where('id', $selectedPelatihanId)->delete();
            return 'Data pelatihan berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data pelatihan: ' . $e->getMessage();
        }
    }


    
}

