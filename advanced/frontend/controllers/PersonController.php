<?php
/**
 * 
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Person;
use yii\data\Sort;
use yii\helpers\Inflector;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\mongodb\Query;

 class PersonController extends Controller
 {
 	public function rules()
    {
        return [
            ['name', 'age', 'gender', 'deleted']
        ];
    }

    public function actionAll() {
        $cookies = Yii::$app->request->cookies;
        
        if ($cookies->has('user')) {

            $data['person']  = Person::findPersons();
            $data = $this->paginationAndSort($data['person']);

            return $this->render("show", $data);
        }

        return $this->redirect("/user/login");
    }

    public function actionAdd() {
        $cookies = Yii::$app->request->cookies;

        if ($cookies->has('user')) {
            return $this->render("add");
        }
        return $this->redirect("/user/login");
        
    }

    public function actionSave() {
    	$request  = Yii::$app->request;
    	$name = $request->post('name');
    	$age = $request->post('age');
    	$gender = $request->post('gender');
        $imageFile = $_FILES["imageFile"]["name"];
        $data['message'] = Person::savePerson($name, $age, $gender, $imageFile);
        if ($data['message'] === 'add successful') {
            move_uploaded_file($_FILES['imageFile']['tmp_name'], './images/'.date("Ymd").'/'.$imageFile);
        }

        return $this->render('add', $data);
    }

    public function actionDel() {
        $cookies = Yii::$app->request->cookies;

        if ($cookies->has('user')) {
            $request = Yii::$app->request;
            $id = $request->get('_id');
            $person = Person::getPerson($id);
            Person::deletePerson($person);
            return $this->redirect('/person/all');
        }
        return $this->redirect("/user/login");
    }

    public function actionToUpdate() {
        $cookies = Yii::$app->request->cookies;

        if ($cookies->has('user')) {
            $request = Yii::$app->request;
            $id = $request->get('_id');
            $data['person'] = Person::getPerson($id);
            $imageFile = $data['person']['imageFile'];
            $data['image'] = basename($imageFile);
            return $this->render('update', $data);
        }
        return $this->redirect("/user/login");
    }
    public function actionUpdate() {
        $request  = Yii::$app->request;
        $id = $request->post('id');
        $name = $request->post('name');
        $age = $request->post('age');
        $gender = $request->post('gender');
        $imageFile = $_FILES['imageFile']['name'];
        $uploadpath = $request->post('hidden-imageFile');
        if (empty($imageFile)) {
            $imageFile = basename($uploadpath);
        }
        $data['message'] = Person::updatePerson($id, $name, $age, $gender, $imageFile);
        if ($data['message'] === 'add successful') {
            move_uploaded_file($_FILES['imageFile']['tmp_name'], dirname($uploadpath).'/'.$imageFile);
        }
        return $this->redirect('/person/all');
    }

    public function actionSel() {
        $cookies = Yii::$app->request->cookies;

        if ($cookies->has('user')) {
            $request = Yii::$app->request;
            $keyword = $request->get('select');

            $data['person'] = Person::getPersonByName($keyword);

            $data = $this->paginationAndSort($data['person']);
            $data['keyword'] = $keyword;
            return $this->render("show", $data);
        }
        
        return $this->redirect("/user/login");
    	
    }

    public function paginationAndSort($person) {
        //排序
        $sort = new Sort([
            'attributes' => [
                'age' => [
                    'asc' => ['age' => SORT_ASC],
                    'desc' => ['age' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => '年龄'
                    /*'label' => Inflector::camel2words('age'),*/
                ],
                'name'=>[
                    'asc' => ['name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => '姓名'
                ],
            ],
            //默认按id排序，现在改成按age排序
            /*'defaultOrder' => ['name' => SORT_ASC],*/
        ]);
        $data['name'] = $sort->link('name');
        $data['age'] = $sort->link('age');

        //分页
        $data['pagination'] = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $person->count(),
        ]);
        
        //$data['person']必须是一个Query对象，才可以调用orderBy(),offset(),limit()等方法
        $data['persons'] = $person->orderBy($sort->orders)
            ->offset($data['pagination']->offset)
            ->limit($data['pagination']->limit)
            ->all();
        return $data;
    }
 } 