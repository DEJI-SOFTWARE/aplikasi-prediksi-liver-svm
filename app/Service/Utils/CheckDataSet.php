<?php
namespace App\Service\Utils;

use Illuminate\Support\Facades\Storage;

class CheckDataSet
{
    public static function CheckData($data)
    {
        if ($data->count() <= 0) {
            $dataAktual = [
                'dataPositif' => 0,
                'dataNegatif' => 0,
            ];
            $dataPrediksi = [
                'dataPositif' => 0,
                'dataNegatif' => 0
            ];
            $DataSelisih = [
                'positif' => 0,
                'negatif' => 0
            ];
            $data = [
                'dataAktual' => $dataAktual,
                'dataPrediksi' => $dataPrediksi,
                'selisih' => [
                    'positif' => 0,
                    'negatif' => 0
                ],
                'akurasi' => 0,
            ];

            return $data;
        }

        $dataAktual = [
            'dataPositif' => $data->where('hasil', 1)->count(),
            'dataNegatif' => $data->where('hasil', -1)->count()
        ];
        $dataPrediksi = [
            'dataPositif' => $data->where('prediksi', 1)->count(),
            'dataNegatif' => $data->where('prediksi', -1)->count()
        ];
        $DataSelisih = [
            'positif' => abs($dataAktual['dataPositif'] - $dataPrediksi['dataPositif']),
            'negatif' => abs($dataAktual['dataNegatif'] - $dataPrediksi['dataNegatif'])
        ];
        $data = [
            'dataAktual' => $dataAktual,
            'dataPrediksi' => $dataPrediksi,
            'selisih' => [
                'positif' => abs($dataAktual['dataPositif'] - $dataPrediksi['dataPositif']),
                'negatif' => abs($dataAktual['dataNegatif'] - $dataPrediksi['dataNegatif'])
            ],
            'akurasi' => (($data->count() - ($DataSelisih['positif'] + $DataSelisih['negatif'])) / $data->count()) * 100,
        ];

        return $data;
    }

    public static function IsDataEmpty($data)
    {
        if ($data->count() <= 0)
            return true;

        return false;
    }
}