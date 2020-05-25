<?php

namespace app\controllers;

use Yii;
use app\models\Examples;
use app\models\ExamplesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\models\Question;
use app\models\QuestionList;
use app\models\QuestionSearch;
use yii\helpers\ArrayHelper;
/**
 * ExamplesController implements the CRUD actions for Examples model.
 */
class ExamplesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Examples models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExamplesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        }
        
        public function actionList(int $lesson_id,int $exam_set_id)
        {
            $searchModel = new QuestionSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where(['exam_set_id' => $exam_set_id]);
            $dataProvider->pagination = ['pageSize' => 1];
        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'lesson_id' => $lesson_id,
            'exam_set_id' => $exam_set_id
        ]);
    }

    /**
     * Displays a single Examples model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Examples model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $lesson_id = Yii::$app->request->get('lesson_id');
        $exam_set_id = Yii::$app->request->get('exam_set_id');
        $question_id = Yii::$app->request->get('question_id');

        $list = ArrayHelper::map(QuestionList::find()->where([
                'lesson_id' => $lesson_id,
                'exam_set_id' => $exam_set_id,
                'question_id' => $question_id
                ])->all(),'clause','title');

        $findEx = Examples::find()->where([
            'lesson_id' => $lesson_id,
            'exam_set_id' => $exam_set_id,
            'question_id' => $question_id
        ])->one();

        $model = $findEx ? $findEx : new Examples([
            'lesson_id' => $lesson_id,
            'exam_set_id' => $exam_set_id,
            'question_id' => $question_id
         ]);
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->response->format = Response::FORMAT_JSON;
            return  'success';
        }
        if(Yii::$app->request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('create', [
            'model' => $model,
            'list' => $list
        ]);
    }
        else{
            return $this->render('create', [
                'model' => $model,
                'list' => $list
            ]);
        }
    }

    /**
     * Updates an existing Examples model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Examples model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Examples model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Examples the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Examples::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}