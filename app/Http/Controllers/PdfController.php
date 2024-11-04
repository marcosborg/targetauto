<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    public function index($vehicle_id)
    {

        $vehicle = Vehicle::find($vehicle_id)->load('car_model.brand', 'year', 'fuel', 'transmission');
        $link = url('/') . '/vehicle/' . $vehicle->id . '/' . Str::slug($vehicle->car_model->brand->name) . '-' . Str::slug($vehicle->car_model->name);

        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($link));

        // Preparando os dados a serem passados para a view
        $dados = [
            'vehicle' => $vehicle,
            'link' => $qrCode,
        ];

        // Gerando o PDF a partir da view 'website.pdf'
        $pdf = PDF::loadView('website.pdf', $dados)
            ->setOption([
                'isRemoteEnabled' => true,
            ]);

        // Retornando o PDF para download
        return $pdf->stream($vehicle->car_model->brand->name . ' ' . $vehicle->car_model->name . ' - ID' . $vehicle->id . '.pdf');
    }
}
