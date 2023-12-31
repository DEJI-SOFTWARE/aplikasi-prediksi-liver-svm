<?php
namespace App\Service\Utils;

class CheckDataSet
{
    public static function CheckData($dataSet) : array
    {

        /* Default jika dataset tidak ada */
        $dataSalah = 0;
        $aktualPositif = 0;
        $aktualNegatif = 0;
        $prediksiPositif = 0;
        $prediksiNegatif = 0;
        $akurasi = 0;

        if ($dataSet->count() > 0) {

            $dataSalah = self::TotalWrongData($dataSet);
            $aktualPositif = $dataSet->where('hasil', 1)->count();
            $aktualNegatif = $dataSet->where('hasil', -1)->count();
            $prediksiPositif = $dataSet->where('prediksi', 1)->count();
            $prediksiNegatif = $dataSet->where('prediksi', -1)->count();
            $akurasi = (($dataSet->count() - $dataSalah)/ $dataSet->count()) * 100;
        }

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
                'negatif' => abs($aktualNegatif - $prediksiNegatif)
            ],
            'akurasi' => $akurasi
        ];

        return $data;
    }

    public static function IsDataEmpty($data) : bool
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
