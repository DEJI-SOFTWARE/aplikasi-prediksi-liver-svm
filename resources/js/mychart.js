import { Chart } from "chart.js/auto";
import ChartDataLabels from 'chartjs-plugin-datalabels'
import axios from "axios";

const oshi = ''
axios.get('/datatraining')
    .then((response) => {

        const dataSalah = response.data.salah
        const dataPositif = response.data.aktual.positif
        const dataNegatif = response.data.aktual.negatif
        const dataAkurasi = {
            salah: dataSalah,
            benar: ((dataPositif + dataNegatif) - dataSalah)
        }

        const dataVisualChart = {
            labels: [
                'Data Positif',
                'Data Negatif'
            ],
            datasets: [{
                label: 'Data Prediksi',
                data: [dataPositif, dataNegatif],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4
            }]
        }

        const configVisualChart = {
            type: 'doughnut',
            data: dataVisualChart,
            options: {
                responsive: true,
                plugins: {
                    labels: {

                    },
                    datalabels: {
                        align: 'center',
                        color: '#fff',
                        formatter: (value, contex) => {
                            const display = [value, 'orang']
                            return display
                        }
                    }
                }

            },
            plugins: [ChartDataLabels]
        };

        const VisualChart = new Chart(
            document.getElementById('visualChart'),
            configVisualChart,

        );


        const dataAkurasiChart = {
            labels: [
                'Tepat',
                'Tidak Tepat'
            ],
            datasets: [{
                label: 'Data Prediksi',
                data: [dataAkurasi.benar, dataAkurasi.salah],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                ],
                hoverOffset: 4
            }]
        }

        const configAkurasiChart = {
            type: 'doughnut',
            data: dataAkurasiChart,
            options: {
                responsive: true,
                plugins: {
                    labels: {
                        render: (args) => {
                            return args.value
                        },
                        fontColor: '#fff',
                    },
                    tooltip: true,
                    datalabels: {
                        align: 'center',
                        color: '#fff',
                        formatter: (value, contex) => {
                            const dataPoint = contex.chart.data.datasets[0].data
                            function totalSum(total, datapoint) {
                                return total + datapoint
                            }
                            const totalPercentage = dataPoint.reduce(totalSum, 0)
                            const valuePercentage = (value / totalPercentage * 100)
                            const display = [`${valuePercentage} % `]
                            return display
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        const AkurasiChart = new Chart(
            document.getElementById('akurasiChart'),
            configAkurasiChart,

        );
    })
    .catch((err) => {
        console.log(err)
    })

