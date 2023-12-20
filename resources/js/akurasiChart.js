import { Chart } from "chart.js/auto";
import ChartDataLebels from "chartjs-plugin-datalabels"
const DataAkurasiChart = {
    labels: [
        'Data Positif',
        'Data Negatif'
    ],
    datasets: [{
        label: 'Data Akurasi',
        data: [60, 40],
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)'
        ],
        hoverOffset: 4
    }]
}

const ConfigAkurasiChart = {
    type: 'pie',
    data: DataAkurasiChart,

    options: {
        responsive: false,
        plugins: {
            labels: {
                render: (args) => {
                    return args.value
                },
                fontColor: '#0000',
            },
            tooltip: false,
            datalabels: {
                align: 'center',
                formatter: (value, contex) => {
                    const dataPoint = contex.chart.data.datasets[0].data
                    function totalSum(total, datapoint) {
                        return total + datapoint
                    }
                    const totalPercentage = dataPoint.reduce(totalSum, 0)
                    const valuePercentage = (value / totalPercentage * 100)
                    const display = [`${valuePercentage} %`, 'orang']
                    return display
                }
            }
        }
    },
    plugins: [ChartDataLebels]

};

const ChartAkurasi = new Chart(
    document.getElementById('akurasiChart'),
    ConfigAkurasiChart,

);