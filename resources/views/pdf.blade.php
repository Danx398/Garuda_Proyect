<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }

        table {
            width: 100%;
            /* border: 1px solid #000; */
        }

        th,
        td {
            width: 25%;
            text-align: center;
            vertical-align: top;
            border: 1px solid #000;
        }

        .texto {
            text-align: justify;
            font-family: Arial, Helvetica, sans-serif;
        }

        .firma {
            margin-top: 250px;
            text-align: center;
        }
    </style>
</head>

<body>
    <img src="" alt="">
    <?php
    $path = public_path('img/Logo-TecNM-2017.png');
    $pathItma = public_path('img/itma2.webp');
    // obtenemos la extensión
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $typeItma = pathinfo($pathItma, PATHINFO_EXTENSION);
    
    // obtenemos el contenido de la imagen
    $data = file_get_contents($path);
    $dataItma = file_get_contents($pathItma);
    
    // generamos la cadena
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    $base64Itma = 'data:image/' . $type . ';base64,' . base64_encode($dataItma);
    ?>
    <Table class="table">
        <thead>
            <th>
                <img src="<?=$base64?>" alt=""
                    style="width: 70%; margin-top: 8%">
                </th>
            <th colspan="2">
                <h3>Instituto Tecnologico de Milpa alta II</h3>
                <hr>
                Departamento de actividades extraescolares
            </th>
            <th><img src="<?=$base64Itma?>" alt="" style="width: 50%; margin-top: 4%">
            </th>
        </thead>
        <tbody>
            <tr>
                <td>Numero de control</td>
                <td colspan="2">{{$num_control}}</td>
                <td>{{$anio_actual}}</td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td colspan="3">{{$nombre}}</td>
            </tr>
            <tr>
                <td rowspan="2">Actividad</td>
                <td rowspan="2">{{$actividad}}</td>
                <td>Fecha</td>
                <td>{{$fecha}}</td>
            </tr>
            <tr>
                <td>Carrera</td>
                <td>{{$carrera}}</td>
            </tr>
            <tr>
                <td colspan="2">Hrs Acreditadas</td>
                <td colspan="2">{{$horas}} Horas {{$credito}}</td>
            </tr>
        </tbody>
    </Table>
    <br>
    <p class="texto"><b>NOTA:</b> EL ALUMNO DEBE CONSERVAR ESTE DOCUMENTO Y ENTREGARLO AL DEPARTAMENTO DE
        EXTRAESCOLARES AL COMPLETAR UN CRÉDITO EQUIVALENTE A 20HRS.</p>
    <p class="texto">ESTE DOCUMENTO SERÁ JUSTIFICACIÓN PARA SUS ACTIVIDADES EXTRAESCOLARES EN CADA UNA DE LAS
        ASIGNATURAS.</p>
    <p class="texto">PARA QUE TENGA VALIDEZ ESTE DOCUMENTO DEBE TENER FIRMA Y SELLO DEL JEFE DEL DEPARTAMENTO QUE
        PROPORCIONA EL APOYO.</p>
    <p class="texto">SI EXISTIERA ALGÚN ERROR EN CUALQUIER DATO PRESENTADO, FAVOR DE AVISAR DE INMEDIATO PARA
        CORREGIRLO.</p>
    <div class="firma">
        {{-- <p>ING. Aquino Segura Roldan</p> --}}
        <p>{{strtoupper($profesor)}}<br></p>
        <p>{{$rol}}<br></p>
        <p>{{$ambito}}</p><br>
        <p>{{$firma}}</p>
    </div>
</body>

</html>
