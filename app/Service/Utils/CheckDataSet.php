<?php
namespace App\Service\Utils;

class CheckDataSet
{
    public static function CheckData($dataSet)
    {
        if ($dataSet->count() <= 0) {
            $data = [
                'dataAktual' => [
                    'dataPositif' => 0,
                    'dataNegatif' => 0,
                ],
                'dataPrediksi' => [
                    'dataPositif' => 0,
                    'dataNegatif' => 0
                ],
                'selisih' => [
                    'positif' => 0,
                    'negatif' => 0
                ],
                'akurasi' => 0,
            ];

            return $data;
        }

        $dataSalah = self::TotalWrongData($dataSet);
        $aktualPositif = $dataSet->where('hasil', 1)->count();
        $aktualNegatif = $dataSet->where('hasil', -1)->count();
        $prediksiPositif = $dataSet->where('prediksi', 1)->count();
        $prediksiNegatif = $dataSet->where('prediksi', -1)->count();

        $data = [
            'dataAktual' => [
                'dataPositif' => $aktualPositif,
                'dataNegatif' => $aktualNegatif
            ],
            'dataPrediksi' => [
                'dataPositif' => $prediksiPositif,
                'dataNegatif' => $prediksiNegatif
            ],
            'selisih' => [
                'positif' => abs($aktualPositif - $prediksiPositif),
                'negatif' => abs($aktualNegatif- $prediksiNegatif)
            ],
            'akurasi' => (($dataSet->count() - $dataSalah)/ $dataSet->count()) * 100,
        ];

        return $data;
    }

    public static function IsDataEmpty($data)
    {
        if ($data->count() <= 0)
            return true;

        return false;
    }

    public  static  function  TotalWrongData($data) : int
    {
        $wrongData = 0;
        foreach ($data as $dta)
        {
            if($dta['hasil'] != $dta['prediksi']) $wrongData += 1;
        }
        return $wrongData;
    }
}
