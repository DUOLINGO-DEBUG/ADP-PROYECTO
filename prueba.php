<!DOCTYPE html>
<html>

<head>
    <title>Ejemplo de Chart.js</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
    $fechaBuscada = '2023-11-09';
    $reportes = array(
        array('dia' => '2023-11-01', 'cantidad_de_reportes' => '2'),
        array('dia' => '2023-11-09', 'cantidad_de_reportes' => '4'),
        array('dia' => '2023-11-14', 'cantidad_de_reportes' => '3')
    );

    $indice = array_search($fechaBuscada, array_column($reportes, 'dia'));

    if ($indice !== false) {
        $cantidadEncontrada = $reportes[$indice]['cantidad_de_reportes'];
        echo "La cantidad de reportes para la fecha $fechaBuscada es: $cantidadEncontrada";
    } else {
        echo "No se encontraron reportes para la fecha $fechaBuscada";
    }

    ?>
    <div>
        <canvas id="RegistroMes"></canvas>
    </div>

    <div>
        <canvas id="lineChart"></canvas>
    </div>

    <div>
        <canvas id="doughnutChart"></canvas>
    </div>

    <script src="mi_script.js"></script>
</body>

</html>
<script>
    const datosBarrasHorizontales = {
        labels: ['01', '02', '03', '04', '05'],
        datasets: [{
                label: 'Reportes aprobados',
                data: [1, 2, 3, 8, 19],
                backgroundColor: '#053F7C',
                borderWidth: 2
            },
            {
                label: 'Reportes reprobados',
                data: [1, 9, 23, 19, 12],
                backgroundColor: '#AD002E',
                borderWidth: 2
            }
        ]
    };

    const datosLinea = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
        datasets: [{
            label: 'Reportes Generados',
            data: [12, 19, 3, 5, 2],
            fill: false,
            borderColor: '#176b87',
            borderWidth: 2
        }]
    };

    const datosRosquilla = {
        labels: ['Rojo', 'Verde', 'Azul'],
        datasets: [{
            label: 'Ejemplo de Gráfico de Rosquilla',
            data: [30, 20, 50],
            backgroundColor: ['red', 'green', 'blue']
        }]
    };

    const configBarrasHorizontales = {
        type: 'bar',
        data: datosBarrasHorizontales,
        options: {
            indexAxis: 'y',
            responsive: true
        }
    };



    const configLinea = {
        type: 'line',
        data: datosLinea,
        options: {
            responsive: true
        }
    };

    const configRosquilla = {
        type: 'doughnut',
        data: datosRosquilla,
        options: {
            responsive: true
        }
    };

    var ctxBarrasHorizontales = document.getElementById('RegistroMes').getContext('2d');
    var ctxLinea = document.getElementById('lineChart').getContext('2d');
    var ctxRosquilla = document.getElementById('doughnutChart').getContext('2d');

    new Chart(ctxBarrasHorizontales, configBarrasHorizontales);
    new Chart(ctxLinea, configLinea);
    new Chart(ctxRosquilla, configRosquilla);
</script>