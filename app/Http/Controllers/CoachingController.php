<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\CoachingRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;

class CoachingController extends Controller
{

    protected $CoachingRepository;

    public function __construct(CoachingRepository $CoachingRepository)
    {
        $this->CoachingRepository = $CoachingRepository;
    }

    public function index()
    {
        $coachingData = $this->CoachingRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();

        return view('/coaching/coaching', [
            'coachingData' => $coachingData,
            'nrpOptions' => $nrpOptions,
        ]);
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

     
        $query = $this->CoachingRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('m_coaching.waktu', [$startDate, $endDate]);
        }

        $coachingData = $query->get();

        return view('/report/report_coaching', [
            'coachingData' => $coachingData,
            'startDate' => $startDate,  
            'endDate' => $endDate,   
        ]);
    }

    public function create(Request $request)
    {
        // $this->validate($request, [
        //         'nama_coaching_add' => 'required|string',   
        //     ]);

        $data = $request->all();

        $result = $this->CoachingRepository->create($data);
        
        if ($result) {
            return Response::json(['status' => 'success']);
        } else {
            return Response::json(['status' => 'error']);
        }
    }

    public function edit($id, Request $request)
    {
        $data = $request->all();
        $userRole = auth()->user()->id_role; 
        $result = $this->CoachingRepository->edit($data, $id, $userRole);
        
        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function send(Request $request)
    {
        $userId = auth()->user()->id; 
        $userRole = auth()->user()->id_role; 
        $sendName = auth()->user()->username; 
        $selectedcoachingId = $request->input('coaching_id');
        //dd($selectedcoachingId);
        $result = $this->CoachingRepository->send($userId, $userRole, $sendName, $selectedcoachingId);
    
        return response()->json(['message' => $result]);
    }

    public function delete(Request $request)
    {

        $selectedcoachingId = $request->input('coaching_id');
    
        $result = $this->CoachingRepository->delete($selectedcoachingId);

        return response()->json(['message' => $result]);
    }

    public function reject(Request $request)
    {
        $userId = auth()->user()->id; 
        $userRole = auth()->user()->id_role; 
        $rejectName = auth()->user()->username; 
        $selectedcoachingId = $request->input('coaching_id');
        $pesanReject = $request->input('reject');

        $result = $this->CoachingRepository->reject($rejectName, $selectedcoachingId, $pesanReject, $userId);

    return response()->json(['message' => $result]);
    }


    public function revisi(Request $request)
    {

        $userId = auth()->user()->id; 
        $userRole = auth()->user()->id_role; 
        $revisiName = auth()->user()->username; 
        $selectedCoachingId = $request->input('coaching_id');
        $pesanRevisi = $request->input('revisi');
//dd($revisiName);
        $result = $this->CoachingRepository->revisi($revisiName, $selectedCoachingId, $userRole, $pesanRevisi, $userId);

    return response()->json(['message' => $result]);
    }

    public function getEdit($id)
    {
        $coaching = $this->CoachingRepository->getById($id);

        return response()->json($coaching);
    }

    // public function getEdit($id)
    // {
    //     $coaching = $this->coachingRepository->getById($id);

    //     // Memeriksa apakah nilai-nilai tertentu adalah null atau 0
    //     if ($coaching->approval_by === null || $coaching->approval_by === 0) {
    //         unset($coaching->approval_by);
    //     }

    //     // Tambahkan pemeriksaan untuk kolom lain jika diperlukan

    //     return response()->json($coaching);
    // }

    public function getUser()
    {
        $nrpOptions = User::select('nrp')->distinct()->get();
        
        return response()->json(['nrpOptions' => $nrpOptions]);
    }

    public function getUserInfo(Request $request)
    {
        $nrp = $request->input('nrp');
        $user = User::where('nrp', $nrp)->first();

        return response()->json([
            'nama' => $user->name,
            'jabatan' => $user->jabatan,
            'departemen' => $user->departemen,
            'divisi' => $user->divisi,
        ]);
    }

    public function exportPDF() {
        return view('coaching/coaching_pdf');
    }

    public function exportToWord(Request $request)
    {
        $id= $request->input('coaching_id');

        $templatePath = 'resources/views/coaching/coachingMitraBara.docx';
        $phpWord = new TemplateProcessor($templatePath);
        //dd($templatePath);
        $data = $this->CoachingRepository->getById($id);
        $phpWord->setValue('name', $data->name);

        $filename = "coaching.docx";
        $phpWord->saveAs($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}