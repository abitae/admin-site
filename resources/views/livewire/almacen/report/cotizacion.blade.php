@php
function convertImageBase64($image){
$pathImage = "./storage/fagah/".$image;
$arrContextOptions = array(
"ssl" => array (
"verify_peer" => false,
"verify_peer_name" => false
),
);
$path = $pathImage;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path, false, stream_context_create($arrContextOptions));
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
return $base64;
}
function convertImageBase64Product($image){
$pathImage = "./storage/".$image;
$arrContextOptions = array(
"ssl" => array (
"verify_peer" => false,
"verify_peer_name" => false
),
);
$path = $pathImage;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path, false, stream_context_create($arrContextOptions));
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
return $base64;
}
@endphp
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <style>
        html {
            margin: 0px;
        }

        body {
            height: 1120px;
            width: 794px;
            background-image: url("{{ convertImageBase64("fagahperu_fondo.jpeg") }}");
            background-repeat: no-repeat;
            page-break-after: always;
            margin-top: -5px;
            margin-left: -5px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .content {
            margin-top: 50px;
            margin-left: 50px;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 570px;
            width: 120px;
            font-size: 14px;
        }

        .title {
            margin-top: 100px;
            margin-left: -100px;
            font-size: 14px;
            line-height: 20%;
            text-align: center;
        }

        .fecha {
            position: absolute;
            top: 140px;
            left: 520px;
            font-size: 14px;
            text-align: center;
        }

        .customer {
            margin-top: 0px;
            margin-left: 0px;
            font-size: 13px;
            line-height: 20%;
            text-align: justify;
            width: 650px;
            page-break-after: auto;
        }

        .saludo {
            margin-top: 0px;
            margin-left: 0px;
            font-size: 13px;
            text-align: justify;
            width: 620px;
        }

        br {
            display: none;
        }

        n {
            font-weight: bold;
        }

        .table {
            border: 1px solid #ffffff;
            margin-left: 0px;
            width: 650px;
        }

        .table th {
            padding: 8px;
            padding-top: 12px;
            padding-bottom: 12px;
            font-size: 10px;
            text-align: left;
            background-color: #13065e;
            color: white;
            white-space: nowrap;
        }

        .table td {
            border: 1px solid #ffffff;
            padding: 8px;
            font-size: 9px;
            background-color: #ffffff;
        }

        .table td img {
            width: 100px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 10;
            width: 100%;
        }

        .footer .condition {
            margin-left: 50px;
            font-size: 9px;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="content">
        <img class="logo" src="{{ convertImageBase64("fagahperu_logo.png") }}" alt="">
        <div class="title">
            <h2>COTIZACIÓN</h2>
            <h4>N° 773-ISPSAC/SSP-2024</h4>
        </div>
        <div class="fecha">
            Lima, 25 de Junio del 2024
        </div>
        <div class="customer">
            <p>
                <n>Señor(es):</n> {{ $cotizacion->customer->first_name }}
            </p>
            <p>
                <n>{{ $cotizacion->customer->type_code }}:</n> {{ $cotizacion->customer->code }}
            </p>
            <p>
                <n>Dirección:</n> {{ $cotizacion->customer->address }}
            </p>
        </div>
        <div class="saludo">
            <p>Reciba un cordial saludo en representación de la marca S SUCAMM PERU. A continuación, adjuntamos nuestras
                propuestas a susrequerimientos según el catálogo electrónico de PERÚ COMPRAS enmarcadas en el CONVENIO
                EXT-CE-2023-11 MOBILIARIO ENGENERAL.</p>
            <p>Agradecemos la oportunidad de servirle y quedamos a su disposición para cualquier consulta o aclaración
                adicional.
            </p>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>CODIGO</th>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO UNIT.</th>
                    <th>SUB TOTAL</th>
                </tr>
                @forelse ($cotizacion->cotizaciondetalles as $item)
                <tr>
                    <td>{{ $item->product->code }}</td>
                    <td>
                        {{ $item->product->description }}
                    </td>
                    <td>{{ $item->cantidad }}</td>
                    <td>{{ $item->price_cotizacion }}</td>
                    <td>{{ $item->cantidad * $item->price_cotizacion }}</td>
                </tr>
                <tr>
                    <td colspan="5">
                        @php
                            $img = $item->product->image;
                        @endphp
                        @if(file_exists('storage/'.$img)) 
                            <img src="{{ convertImageBase64Product("$img") }}" alt="">
                        @else
                            Could not find file
                        @endif
                        
                    </td>
                </tr>
                @empty

                @endforelse

                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td style="background-color: #13065e;" colspan="2">
                        <n style="color: white"> PRECIO TOTAL INCLUIDO IGV </n>
                    </td>
                    <td colspan="1">
                        S/ {{ $total_cotizacion }}
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer">
        <div class="condition">
            <h4>CONDICIONES DE VENTA</h4>
            <ul>
                <li>Forma de pago: AL CONTADO.</li>
                <li>Tiempo de entrega: 12 a 14 días.</li>
                <li>Validez de la co zación: 3 días.</li>
                <li>Una vez recibidos los productos no se pueden devolver.</li>
                <li>Los productos son iguales de acuerdo a la Ficha Técnica.</li>
                <li>Una vez recibida la muestra se considerará aprobada, salvo comunicación escrita que indique lo
                    contrario.</li>
                <li>La entrega coordina la marca con la parte usuaria para lo cual de acuerdo a su OCAM facilitar toda
                    su
                    documentación.</li>
            </ul>
        </div>
    </div>
</body>

</html>