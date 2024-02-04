<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Charts\MonthlyChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
=======
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
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9

class DashboardController extends Controller
{

<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MonthlyChart $chart, Request $request)
    {
        $date = new Carbon(now());
        $year = $date->format('Y');
        $monthPresent = $date->format('m');
        $month = null;
        // $thisDay = new Carbon(now()); // filter tgl sekarang
        // $thisDay = $thisDay->format('Y-m-d');
        // dd($thisDay);

        $KaryawanTrain = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereYear('MULAI_TRAINING', $year)->get();
        $JumlahKaryawan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereYear('MULAI_TRAINING', $year)->count();
        $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereYear('MULAI_TRAINING', $year)->distinct()->count('NAMA');

        $presentageBiaya = $this->PresentageBiaya($monthPresent, $year);
        $presentagePelatihan = $this->PresentagePelatihan($monthPresent, $year);
        $PresentageTraining = $this->PresentageTraining($monthPresent, $year);

        $aprvAtasan = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_ATASAN', 1)->whereYear('MULAI_TRAINING',$year)->count();
        $aprvHRD = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_HR', 1)->whereYear('MULAI_TRAINING',$year)->count();
        $aprvManager = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_HR_MNG', 1)->whereYear('MULAI_TRAINING',$year)->count();
        $aprvDireksi = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_DRC', 1)->whereYear('MULAI_TRAINING',$year)->count();

        if ($request->input('month')) {
            // dd($request);
            $month = $request->input('month');
            $KaryawanTrain = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->get();
            $JumlahKaryawan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->count();
            $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->distinct()->count('NAMA');

            $presentageBiaya = $this->PresentageBiaya($month, $year);
            $presentagePelatihan = $this->PresentagePelatihan($month, $year);
            $PresentageTraining = $this->PresentageTraining($month, $year);

            
            $aprvAtasan = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_ATASAN', 1)->whereYear('MULAI_TRAINING',$year)->count();
            $aprvHRD = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_HR', 1)->whereYear('MULAI_TRAINING',$year)->count();
            $aprvManager = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_HR_MNG', 1)->whereYear('MULAI_TRAINING',$year)->count();
            $aprvDireksi = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_DRC', 1)->whereYear('MULAI_TRAINING',$year)->count();
        }

        return view('/dashboard/dashboard', [
            'JumlahKaryawan' => $JumlahKaryawan,
            'TotalBiaya' => $KaryawanTrain,
            "TotalPelatihan" => $totalPelatihan,
            'chart' => $chart->build($month, $year),
            'chartLine' => $chart->buildLine($month, $year),
            'chartBar' => $chart->buildBar($month, $year),
            'admpChartDonat' => $chart->buildAdmp($month, $year),
            'coachingChartDonat' => $chart->buildCoaching($month, $year),
            'presenBiaya' => $presentageBiaya,
            'presenPelatihan' => $presentagePelatihan,
            'PresentageTraining' => $PresentageTraining,
            'aprvAtasan' => $aprvAtasan, 
            'aprvHRD' => $aprvHRD, 
            'aprvManager' => $aprvManager, 
            'aprvDireksi' => $aprvDireksi, 
        ]);
    }

    function PresentageBiaya($month, $year)
    {
        $previouseDate = now()->subDays(30);
        $biayaSekarang = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->pluck('total');
        $biayaSebelumnya = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $previouseDate->format('m'))->whereYear('MULAI_TRAINING', $previouseDate->format('Y'))->pluck('total');

        // $biayaSebelumnya =3000;
        if ($biayaSebelumnya[0] == null) {
            $difference =  $biayaSekarang[0] > 0 ? '100' : '0';
        } else {
            $difference = (($biayaSekarang[0] - $biayaSebelumnya[0]) / $biayaSebelumnya[0]) * 100;
        }

        return $difference;
    }


    function PresentagePelatihan($month, $year)
    {
        $previouseDate = now()->subDays(30);
        $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->distinct()->count('NAMA');
        $pelaatihanSebelumnya = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $previouseDate->format('m'))->whereYear('MULAI_TRAINING', $previouseDate->format('Y'))->distinct()->count('NAMA');

        // $totalPelatihan = 15;
        // $pelaatihanSebelumnya = 10;
        if ($pelaatihanSebelumnya == null) {
            $difference =  $totalPelatihan > 0 ? '100' : '0';
        } else {
            $difference = (($totalPelatihan - $pelaatihanSebelumnya) / $pelaatihanSebelumnya) * 100;
        }

        return $difference;
    }


    function PresentageTraining($month, $year)
    {
        $previouseDate = now()->subDays(30);
        $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->count();
        $pelaatihanSebelumnya = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $previouseDate->format('m'))->whereYear('MULAI_TRAINING', $previouseDate->format('Y'))->count();

        // $totalPelatihan = 5;
        // $pelaatihanSebelumnya = 10;
        if ($pelaatihanSebelumnya == null) {
            $difference =  $totalPelatihan > 0 ? '100' : '0';
        } else {
            $difference = (($totalPelatihan - $pelaatihanSebelumnya) / $pelaatihanSebelumnya) * 100;
        }

        return $difference;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
=======
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


>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
