<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class ShopController extends AppController
{

    public function actionIndex()
    {
        $this->setMeta("Все товары :: " . \Yii::$app->name);

        $query = Product::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 6,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('products', 'pages'));
    }

    public function actionSearch()
    {
        $q = trim(\Yii::$app->request->get('q'));

        $this->setMeta("Поиск: {$q} :: " . \Yii::$app->name);

        if(!$q) {
            return $this->render('search');
        }

        $query = Product::find()->where(['LIKE', 'title', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 2,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('products','pages', 'q'));
    }
}