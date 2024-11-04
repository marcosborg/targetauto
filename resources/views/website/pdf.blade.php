<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pdf generated</title>
    <style>
        html {
            font-family: sans-serif;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
        }

        @page {
            margin-top: 40px;
            margin-bottom: 0;
            margin-left: 40px;
            margin-right: 40px;
        }

        body {
            margin: 0;
        }

        footer {
            position: fixed;
            bottom: -0px;
            left: 0px;
            right: 0px;
            height: 50px;
            line-height: 35px;
        }

        table.bordered {
            border-collapse: collapse;
        }

        table.bordered th {
            border: solid 1px #ccc;
        }

        table.bordered td {
            border: solid 1px #ccc;
        }

        table.bordered thead th {
            background: #eeeeee;
        }

    </style>
</head>
<body>
    <table border="0" width="100%">
        <tbody>
            <tr>
                <td width="50%" style="padding: 20px; vertical-align: top;">
                    <img src="{{ public_path('website/assets/img/logo.svg') }}" width="100%">
                    <table style="font-size: 12px;">
                        <tr>
                            <td width="50%" style="vertical-align: top;">
                                SA B.V.<br>
                                Daalwijkdreef 47<br>
                                1103AD Amsterdam
                            </td>
                            <td style="vertical-align: top;">
                                +351 960 494 213<br>
                                info@sabvautomotiv.com
                            </td>
                        </tr>
                    </table>
                    <h1 style="margin-bottom: 0;">{{ $vehicle->car_model->brand->name }} {{ $vehicle->car_model->name }} - {{ $vehicle->year->number }}</h1>
                    <h2 style="margin-top: 0;">{{ number_format($vehicle->price, 0, ',', '.') }}€</h2>
                    <br>
                    @if ($vehicle->photos)
                    <table width="100%" cellspacing="0" cellpadding="5">
                        <tr>
                            @foreach ($vehicle->photos as $index => $photo)
                            <td width="48%" style="padding: 1%;">
                                <img src="{{ $photo->getUrl() }}" width="100%" alt="Vehicle Photo">
                            </td>
                            @if (($index + 1) % 2 == 0)
                        </tr>
                        <tr>
                            @endif
                            @endforeach
                        </tr>
                    </table>
                    @endif
                    <p>&nbsp;</p>
                    <p style="font-size: 12px;"><strong>QRCode para partilhar a viatura</strong></p>
                    <img src="data:image/svg+xml;base64,{{ $link }}" alt="QR Code">
                </td>
                <td style="vertical-align: top; padding: 20px;">
                    <!-- Basic Info -->
                    <h3>Vehicle info</h3>
                    <ul class="list-unstyled">
                        <li><strong>Fuel:</strong> {{ $vehicle->fuel->name }}</li>
                        <li><strong>Transmission:</strong> {{ $vehicle->transmission->name }}</li>
                        <li><strong>Type:</strong> {{ $vehicle->type }}</li>
                        <li><strong>Bodywork:</strong> {{ $vehicle->bodywork }}</li>
                    </ul>

                    <!-- Performance -->
                    <h3>Performance</h3>
                    <ul class="list-unstyled">
                        <li><strong>Power:</strong> {{ $vehicle->power }}</li>
                        <li><strong>Cylinder:</strong> {{ $vehicle->cylinder }}</li>
                        <li><strong>Weight:</strong> {{ $vehicle->weight }} kg</li>
                    </ul>

                    <!-- Vehicle Details -->
                    <h3>Vehicle Details</h3>
                    <ul class="list-unstyled">
                        <li><strong>License Plate:</strong> {{ $vehicle->license_plate }}</li>
                        <li><strong>Kilometers:</strong> {{ $vehicle->quilometers }}</li>
                        <li><strong>Colour:</strong> {{ $vehicle->colour }}</li>
                        <li><strong>VAT/Margin:</strong> {{ $vehicle->vat_margin }}</li>
                    </ul>

                    <!-- Consumption -->
                    <h3>Fuel Consumption</h3>
                    <ul class="list-unstyled">
                        <li><strong>Average Consumption:</strong> {{ $vehicle->average_consumption }}</li>
                        <li><strong>City Consumption:</strong> {{ $vehicle->consumption_city }}</li>
                        <li><strong>Highway Consumption:</strong> {{ $vehicle->highway_consumption }}</li>
                        <li><strong>CO2 Emissions:</strong> {{ $vehicle->co_2_emissions }}</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    <footer>
        SABV Automotive ©
        <?php echo date("Y");?>
    </footer>
</body>
</html>