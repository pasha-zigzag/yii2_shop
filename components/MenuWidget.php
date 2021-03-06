<?php


namespace app\components;


use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menu_html;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if($this->ul_class === null) {
            $this->ul_class = 'menu';
        }
        if($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        //get cache
        if(!YII_ENV_DEV) {
            $menu = \Yii::$app->cache->get('menu');
            if($menu) {
                return $menu;
            }
        }

        $this->data = Category::find()->select('id, title')->indexBy('id')->asArray()->all();
        //$this->tree = $this->getTree();
        $this->menu_html = '<ul class="' . $this->ul_class . '">';
        $this->menu_html .= $this->getMenuHtml();
        $this->menu_html .= '</ul>';

        //set cache
        if(!YII_ENV_DEV) {
            \Yii::$app->cache->set('menu', $this->menu_html, 60);
        }
        return $this->menu_html;
    }

//    protected function getTree() {
//        $tree = [];
//        foreach($this->data as $id => &$node) {
//            if(!$node['parent_id']) {
//                $tree[$id] = &$node;
//            } else {
//                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
//            }
//        }
//        return $tree;
//    }

    protected function getMenuHtml() {
        $tree = [];
        $str = '';
        foreach($this->data as $id => &$node) {
                $tree[$id] = &$node;
        }
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category) {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}