<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class pelatihanRepository
{
    // public $database = 'mysql';
    // public $table = 'm_pelatihan';
    // // public $table_file = 'm_opini_kepatuhan_file';
    // // public $primary_key = 'menu_id';
    // public $event = 'Pelatihan';


    // //=============================================== POSTDATA ===============================================
    // public function Add($data){
    //     // dd($data);
    //     $proses = DB::connection($this->database)->table($this->table)->insertGetId(
    //             array(
    //                 'jenisPelatihan' => $data['jenis_pelatihan'],
    //                 'informasi_pelatihan' => $data['informasi_pelatihan'],
    //                 'nama_pelatihan' => $data['nama_pelatihan'],
    //                 'narasumber' => $data['unit_tglmemo'],
    //                 'alasan_pelatihan' => $data['tgl_mulai'],
    //                 'sharing_pelatihan' => $data['id_peraturan_eks_terkait'],
    //                 'waktu_pelatihan' => $data['judul_peraturan_eks_terkait'],
    //                 'tempat_pelatihan' => $data['checklist'],
    //                 'biaya_pelatihan' => $data['status_opini'],
    //                 'kode_status' => $data['kode_status'],
    //                 // 'created_by' => $data['id_user'],
    //                 // 'created_name' => $data['nama_user'],
    //                 'created_on' => date('Y-m-d H:i:s'),
    //             )
    //         );

    //     if($proses){
    //         $hasil = array('status' => 1, 'message' => 'Pelatihan Berhasil Disimpan', 'type' => 'success');
    //     }else{
    //         $hasil = array('status' => 0, 'message' => 'Pelatihan Gagal Disimpan', 'type' => 'error');
    //     }

    //     return $hasil;
    // }

    // public function Edit($data)
    // {
    //     date_default_timezone_set("Asia/Jakarta");
    //     $proses = DB::connection($this->database)->table($this->table)->where('id', $data['id'])
    //     ->update(
    //         array(
    //             'id_jenis_proposal' => $data['id_jenis_proposal'],
    //             'unit_perihal' => $data['unit_perihal'],
    //             'unit_nomor_memo' => $data['unit_nomor_memo'],
    //             'unit_tglmemo' => $data['unit_tglmemo'],
    //             'id_peraturan_eks_terkait' => $data['id_peraturan_eks_terkait'],
    //             'judul_peraturan_eks_terkait' => $data['judul_peraturan_eks_terkait'],
    //             'checklist' => $data['checklist'],
    //             'updated_by' => $data['id_user'],
    //             'updated_name' => $data['nama_user'],
    //             'updated_on' => date('Y-m-d H:i:s'),
    //         )
    //     );

    //     if($proses){
    //         $hasil = array('status' => 1, 'message' => 'Opini Kepatuhan Berhasil Diubah', 'type' => 'success');
    //     }else{
    //         $hasil = array('status' => 0, 'message' => 'Opini Kepatuhan Gagal Diubah', 'type' => 'error');
    //     }

    //     return $hasil;
    // }

    // public function Deleted($data)
    // {
    //     date_default_timezone_set("Asia/Jakarta");
    //     $proses = DB::connection($this->database)->table($this->table)->where('id', $data['id'])
    //     ->update(
    //             array(
    //                 'status_opini' => $data['status_opini'],
    //                 'deleted_by' => $data['id_user'],
    //                 'deleted_name' => $data['nama_user'],
    //                 'deleted_on' => date('Y-m-d H:i:s'),
    //             )
    //         );

    //     if($proses){
    //         $hasil = array('status' => 1, 'message' => 'Opini Kepatuhan Berhasil Dihapus', 'type' => 'success');
    //     }else{
    //         $hasil = array('status' => 0, 'message' => 'Opini Kepatuhan Gagal Dihapus', 'type' => 'error');
    //     }

    //     return $hasil;
    // }

    // public function Send($data)
    // {
    //     date_default_timezone_set("Asia/Jakarta");
    //     $proses = DB::connection($this->database)->table($this->table)->where('id', $data['id'])
    //     ->update(
    //             array(
    //                 'kode_status' => $data['kode_status'],
    //                 'send_by' => $data['id_user'],
    //                 'send_name' => $data['nama_user'],
    //                 'send_on' => date('Y-m-d H:i:s'),
    //             )
    //         );

    //     if($proses){
    //         $hasil = array('status' => 1, 'message' => 'Opini Kepatuhan Berhasil Dikirim', 'type' => 'success');
    //     }else{
    //         $hasil = array('status' => 0, 'message' => 'Opini Kepatuhan Gagal Dikirim', 'type' => 'error');
    //     }

    //     return $hasil;
    // }

    // public function getById($id)
    // {
    //     return DB::table('m_pelatihan')->where('id', $id)->first();
    // }

    // public function getById($id)
    // {
    //     return DB::table('m_pelatihan')
    //         ->join('users', 'm_pelatihan.nrp', '=', 'users.nrp')
    //         ->where('m_pelatihan.id', $id)
    //         ->first(['m_pelatihan.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);

    // }
    public function getById($id)
    {
        $data = DB::table('m_pelatihan')
            ->join('users', 'm_pelatihan.nrp', '=', 'users.nrp')
            ->where('m_pelatihan.id', $id)
            ->first(['m_pelatihan.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);

        return $data;
    }


    public function create($data)
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

    public function edit($data, $id)
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
        return DB::table('m_pelatihan')->get();
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

        return 'Revisi berhasil dikirim dan kode status diperbarui.';
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

        return 'Revisi berhasil dikirim dan kode status diperbarui.';
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

?>