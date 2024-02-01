<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\pelatihanRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;
use Barryvdh\DomPDF\Facade as PDFFacade;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PhpOffice\PhpWord\Writer\PDF as WriterPDF;
use PhpOffice\PhpWord\Writer\PDF\DomPDF;
use PhpOffice\PhpWord\IOFactory;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpWord\Writer\PDF\MPDF as PDFMPDF;

class PelatihanController extends Controller
{

    protected $pelatihanRepository;

    public function __construct(PelatihanRepository $pelatihanRepository)
    {
        $this->pelatihanRepository = $pelatihanRepository;
    }

    public function index()
    {
        
        $pelatihanData = $this->pelatihanRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();

        return view('/pelatihan/pelatihan', [
            'pelatihanData' => $pelatihanData,
            'nrpOptions' => $nrpOptions,
        ]);
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Gunakan filter waktu jika ada
        $query = $this->pelatihanRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('m_pelatihan.waktu', [$startDate, $endDate]);
        }

        $pelatihanData = $query->get();

        return view('/report/report_pelatihan', [
            'pelatihanData' => $pelatihanData,
            'startDate' => $startDate,  // Pass start_date to the view
            'endDate' => $endDate,      // Pass end_date to the view
        ]);
    }

    public function create(Request $request)

    {
        
        // $this->validate($request, [
        //         'nama_pelatihan_add' => 'required|string',   
        //     ]);
        $userRole = auth()->user()->id_role; 
        $data = $request->except('_token');
        //$data = $request->all();

        $result = $this->pelatihanRepository->create($data, $userRole);
        
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
        $result = $this->pelatihanRepository->edit($data, $id, $userRole);
        
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
        $selectedPelatihanId = $request->input('pelatihan_id');
        //dd($selectedPelatihanId);
        $result = $this->pelatihanRepository->send($userId, $userRole, $sendName, $selectedPelatihanId);
    
        return response()->json(['message' => $result]);
    }

    public function delete(Request $request)
    {

        $selectedPelatihanId = $request->input('pelatihan_id');
    
        $result = $this->pelatihanRepository->delete($selectedPelatihanId);

        return response()->json(['message' => $result]);
    }

    public function reject(Request $request)
    {
        $userId = auth()->user()->id; 
        $userRole = auth()->user()->id_role; 
        $rejectName = auth()->user()->username; 
        $selectedPelatihanId = $request->input('pelatihan_id');
        $pesanReject = $request->input('reject');

        $result = $this->pelatihanRepository->reject($rejectName, $selectedPelatihanId, $pesanReject, $userId);

    return response()->json(['message' => $result]);
    }


    public function revisi(Request $request)
    {

        $userId = auth()->user()->id; 
        $userRole = auth()->user()->id_role; 
        $revisiName = auth()->user()->username; 
        $selectedPelatihanId = $request->input('pelatihan_id');
        $pesanRevisi = $request->input('revisi');

        $result = $this->pelatihanRepository->revisi($revisiName,$userRole, $selectedPelatihanId, $pesanRevisi, $userId);

    return response()->json(['message' => $result]);
    }

    public function getEdit($id)
    {
        $pelatihan = $this->pelatihanRepository->getById($id);

        return response()->json($pelatihan);
    }


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
        return view('pelatihan/pelatihan_pdf');
    }

    public function exportToWord($id)
    {
        $templatePath = base_path('resources/views/pelatihan/pelatihan.docx');
        $phpWord = new TemplateProcessor($templatePath);
    
        $data = $this->pelatihanRepository->getById($id);
    
        $phpWord->setValue('nrp', $data->nrp);
        $phpWord->setValue('nama', $data->name);
        $phpWord->setValue('jabatan', $data->jabatan);
        $phpWord->setValue('departemen', $data->departemen);
        $phpWord->setValue('nohp', $data->phone_number);
        $phpWord->setValue('alamat', $data->alamat);

        $outputDirectory = storage_path('app/public/exports/');
        $filename = "Pelatihan.docx";
        $outputPath = $outputDirectory . $filename;
    

        $phpWord->saveAs($outputPath);

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }

}
