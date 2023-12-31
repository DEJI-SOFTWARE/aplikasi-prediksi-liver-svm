<?php
namespace App\Service;

use App\Models\DataSet;
use \SVM;

class SVMService
{

    public SVM $svm;
    public $model;
    public function __construct(SVM $svm)
    {
        $this->svm = $svm;
    }
    public function TrainingData($dataTraining)
    {
        $result = [];
        foreach ($dataTraining as $data) {
            array_push($result, [
                $data['hasil'],
                'x1' => $data['tb'],
                'x2' => $data['db'],
                'x3' => $data['alkaline'],
                'x4' => $data['alamine'],
                'x5' => $data['aspirate'],
                'x6' => $data['tp'],
                'x7' => $data['alb'],
                'x8' => $data['ag']
            ]);
        }

        $this->svm->setOptions([$this->svm::OPT_KERNEL_TYPE => $this->svm::KERNEL_LINEAR]);
        $model = $this->model = $this->svm->train($result);
        $model->save('model.svm');
        return $model;

    }
    public function PrediksiData($dataTraining, $dataPrediksi, $modelDatabase)
    {
        $model = $this->TrainingData($dataTraining);

        foreach ($dataPrediksi as $data) {
            $dataTest = [
                'x1' => $data['tb'],
                'x2' => $data['db'],
                'x3' => $data['alkaline'],
                'x4' => $data['alamine'],
                'x5' => $data['aspirate'],
                'x6' => $data['tp'],
                'x7' => $data['alb'],
                'x8' => $data['ag']
            ];

            $hasil = $model->predict($dataTest);

            $modelDatabase::where('id', $data['id'])->update([
                'prediksi' => $hasil
            ]);
        }

    }
}
