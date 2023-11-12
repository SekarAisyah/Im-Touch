<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repository\pelatihanRepository;
use Illuminate\Support\Facades\Response;





class PelatihnController extends Controller
{
//     protected $pelatihanRepository;

//     public function __construct(pelatihanRepository $pelatihanRepository)
//     {
//         $this->pelatihanRepository = $pelatihanRepository;
//     }

//     // Metode untuk menampilkan data pelatihan
//     // public function index()
//     // {
//     //     $pelatihan = $this->opiniRepository->getAllPelatihan();
//     //     return view('pelatihan.index', compact('pelatihan'));
//     // }

//     // Metode untuk menambahkan pelatihan
//     public function pelatihan_action(Request $request)
//     {
//         // dd($request->all());
//         $action_flag = $request->action_flag;
//         // $user = $request->session()->get('user');

//         $data = array(
//             'id_pelatihan' => $request->id_pelatihan,
//             'jenis_pelatihan' => $request->no_ref,
//             'nama_pelatihan' => $request->nama_pelatihan,
//             'informasi_pelatihan' => $request->informasi_pelatihan,
//             'narasumber' => $request->narasumber,
//             'alasan_pelatihan' => $request->alasan_pelatihan,
//             'sharing_pelatihan' => $request->sharing_pelatihan,
//             'waktu_pelatihan' => $request->waktu_pelatihan,
//             'tempat_pelatihan' => $request->tempat_pelatihan,
//             'biaya_pelatihan' => $request->biaya_pelatihan,
//             'kode_status' => 1, //create
//             // 'id_user' => $user->id_user,
//             // 'nama_user' => $user->first_name.' '.$user->last_name,
//         );

    
//         // dd($data);

//         if($action_flag == 'A'){
//             $ket_log = 'Add';
//             $action = $this->pelatihanRepository->Add($data);
//         }else if($action_flag == 'E'){
//             $ket_log = 'Edit';
//             // $action = $this->pelatihanRepository->Edit($data);
//         }

        
//         $result[] = array("status" => $action['status'], "message" => 'Item has been '.$ket_log.'ed', "type" => $action['type']);  
//         return response()->json($result[0]);
//     }  

// }


//     // // Metode untuk mengedit pelatihan
//     // public function edit(Request $request, $id)
//     // {
//     //     // Validasi data masukan dari form
//     //     $this->validate($request, [
//     //         'jenisPelatihan' => 'required',
//     //         'informasi_pelatihan' => 'required',
//     //         // Tambahkan validasi lainnya sesuai kebutuhan
//     //     ]);

//     //     // Proses penyuntingan pelatihan dengan repository
//     //     $result = $this->pelatihanRepository->Edit($request->all());

//     //     // Tampilkan pesan sukses atau kesalahan
//     //     if ($result['status'] == 1) {
//     //         return redirect()->route('pelatihan.index')->with('success', $result['message']);
//     //     } else {
//     //         return redirect()->route('pelatihan.index')->with('error', $result['message']);
//     //     }
//     // }

//     // // Metode untuk menghapus pelatihan
//     // public function delete($id)
//     // {
//     //     // Proses penghapusan pelatihan dengan repository
//     //     $result = $this->pelatihanRepository->Deleted(['id' => $id]);

//     //     // Tampilkan pesan sukses atau kesalahan
//     //     if ($result['status'] == 1) {
//     //         return redirect()->route('pelatihan.index')->with('success', $result['message']);
//     //     } else {
//     //         return redirect()->route('pelatihan.index')->with('error', $result['message']);
//     //     }
//     // }

//     // // Metode untuk mengirim pelatihan
//     // public function send(Request $request, $id)
//     // {
//     //     // Proses pengiriman pelatihan dengan repository
//     //     $result = $this->pelatihanRepository->Send(['id' => $id]);

//     //     // Tampilkan pesan sukses atau kesalahan
//     //     if ($result['status'] == 1) {
//     //         return redirect()->route('pelatihan.index')->with('success', $result['message']);
//     //     } else {
//     //         return redirect()->route('pelatihan.index')->with('error', $result['message']);
//     //     }
//     // }

protected $pelatihanRepository;

    public function __construct(PelatihanRepository $pelatihanRepository)
    {
        $this->pelatihanRepository = $pelatihanRepository;
    }

    public function index()
    {
        $pelatihanData = $this->pelatihanRepository->getAll();
        return view('pelatihan', ['pelatihanData' => $pelatihanData]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $result = $this->pelatihanRepository->create($data);

        if ($result) {
            return Response::json(['status' => 'success']);
        } else {
            return Response::json(['status' => 'error']);
        }
    }

    // public function send(Request $request)
    // {
    //     $user = auth()->user();

    //     $userId = $user->id;
    //     $newStatus = 2; 
    //     $userLevel = $user->id_role;

    //     $this->pelatihanRepository->updateKodeStatus($userId, $newStatus, $userLevel);

    //     return response()->json(['message' => 'Status updated successfully']);
    // }

}
