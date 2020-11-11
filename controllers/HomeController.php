<?php


namespace app\controllers;


use app\models\Product;

class HomeController extends AppController
{
    public function actionIndex()
    {
        $offers = Product::find()->where(['is_offer' => 1])->with('category')->limit(8)->all();
        return $this->render('index', compact('offers'));
    }
}