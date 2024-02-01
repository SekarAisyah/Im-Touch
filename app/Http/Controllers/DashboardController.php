<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\pelatihanRepository;
use App\Http\Repository\AdmpRepository;
use App\Http\Repository\CoachingRepository;
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

class DashboardController extends Controller
{

    protected $pelatihanRepository;
    protected $AdmpRepository;
    protected $CoachingRepository;

    public function __construct(PelatihanRepository $pelatihanRepository, AdmpRepository $AdmpRepository, CoachingRepository $CoachingRepository)
    {
        $this->pelatihanRepository = $pelatihanRepository;
        $this->AdmpRepository = $AdmpRepository;
        $this->CoachingRepository = $CoachingRepository;
    }

    // public function reportPelatihan(Request $request)
    // {
    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');
    //     $minBiaya = $request->input('min_biaya');
    //     $maxBiaya = $request->input('max_biaya');

    //     // Gunakan filter waktu dan biaya jika ada
    //     $query = $this->pelatihanRepository->getAllWithDate();
    //     $query = $this->AdmpRepository->getAllWithDate();
    //     $query = $this->CoachingRepository->getAllWithDate();

    //     if ($startDate && $endDate) {
    //         $query->whereBetween('m_pelatihan.waktu', [$startDate, $endDate]);
    //     }

    //     if ($minBiaya !== null && $maxBiaya !== null) {
    //         $query->whereBetween('m_pelatihan.biaya', [$minBiaya, $maxBiaya]);
    //     }

    //     $pelatihanData = $query->get();
    //     $admpData = $query->get();
    //     $coachingData = $query->get();

    //     return view('/dashboard/dashboard', [
    //         'pelatihanData' => $pelatihanData,
    //         'admpData' => $admpData,
    //         'coachingData' => $coachingData,
    //         'startDate' => $startDate,
    //         'endDate' => $endDate,
    //         'minBiaya' => $minBiaya,  // Pass min_biaya to the view
    //         'maxBiaya' => $maxBiaya,  // Pass max_biaya to the view
    //     ]);
    // }

    public function reportPelatihan(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $minBiaya = $request->input('min_biaya');
    $maxBiaya = $request->input('max_biaya');

    // Use separate queries for each repository
    $pelatihanQuery = $this->pelatihanRepository->getAllWithDate();
    $admpQuery = $this->AdmpRepository->getAllWithDate();
    $coachingQuery = $this->CoachingRepository->getAllWithDate();

    // Apply date filter to each query
    if ($startDate && $endDate) {
        $pelatihanQuery->whereBetween('waktu', [$startDate, $endDate]);
        $admpQuery->whereBetween('waktu', [$startDate, $endDate]); // Adjust column name accordingly
        $coachingQuery->whereBetween('waktu', [$startDate, $endDate]); // Adjust column name accordingly
    }

    // Apply cost filter to each query
    if ($minBiaya !== null && $maxBiaya !== null) {
        $pelatihanQuery->whereBetween('biaya', [$minBiaya, $maxBiaya]);
        $admpQuery->whereBetween('biaya', [$minBiaya, $maxBiaya]); // Adjust column name accordingly
        $coachingQuery->whereBetween('biaya', [$minBiaya, $maxBiaya]); // Adjust column name accordingly
    }

    // Retrieve data for each type
    $pelatihanData = $pelatihanQuery->get();
    $admpData = $admpQuery->get();
    $coachingData = $coachingQuery->get();

    return view('/dashboard/dashboard', [
        'pelatihanData' => $pelatihanData,
        'admpData' => $admpData,
        'coachingData' => $coachingData,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'minBiaya' => $minBiaya,
        'maxBiaya' => $maxBiaya,
    ]);
}


    public function reportADMP(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        

        // Gunakan filter waktu jika ada
        $query = $this->AdmpRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('m_admp.waktu', [$startDate, $endDate]);
        }

        $admpData = $query->get();

        return view('/dashboard/dashboard', [
            'admpData' => $admpData,
            'startDate' => $startDate,  // Pass start_date to the view
            'endDate' => $endDate,      // Pass end_date to the view
        ]);
    }

    public function reportCoaching(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

     
        $query = $this->CoachingRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('m_coaching.waktu', [$startDate, $endDate]);
        }

        $coachingData = $query->get();

        return view('dashboard/dashboard', [
            'coachingData' => $coachingData,
            'startDate' => $startDate,  
            'endDate' => $endDate,   
        ]);
    }

    public function reportData(Request $request)
    {
        $type = $request->input('type', 'pelatihan'); 
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $minBiaya = $request->input('min_biaya');
        $maxBiaya = $request->input('max_biaya');

        $query = null;
        $data = null;

        switch ($type) {
            case 'pelatihan':
                $query = $this->pelatihanRepository->getAllWithDate();
                break;
            case 'coaching':
                $query = $this->CoachingRepository->getAllWithDate();
                break;
            // Add more cases for other data types if needed

            default:
                abort(404); // Not found
        }

        if ($startDate && $endDate) {
            $query->whereBetween("m_{$type}.waktu", [$startDate, $endDate]);
        }

        if ($minBiaya !== null && $maxBiaya !== null) {
            $query->whereBetween("m_{$type}.biaya", [$minBiaya, $maxBiaya]);
        }

        $data = $query->get();

        return view('/dashboard/dashboard', [
            'data' => $data,
            'type' => $type,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'minBiaya' => $minBiaya,
            'maxBiaya' => $maxBiaya,
        ]);
    }
}


