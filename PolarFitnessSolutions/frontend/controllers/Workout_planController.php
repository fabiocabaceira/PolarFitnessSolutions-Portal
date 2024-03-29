<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ExerciseSearch;
use frontend\models\Workout_plan;
use frontend\models\Workout_plan_exercise_relationSearch;
use frontend\models\Workout_planSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkoutplanController implements the CRUD actions for Workout_plan model.
 */
class Workout_planController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['index','view','update', 'delete','create'],
                            'allow' => true,
                            'roles' => ['funcionario', 'utilizador'],
                        ],

                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Workout_plan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Workout_planSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Workout_plan model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new Workout_plan_exercise_relationSearch();
        $searchModel->workout_plan_id = $id;

        $dataProvider = $searchModel->search($this->request->queryParams);

        if(Yii::$app->user->can('utilizador')){
            if(Yii::$app->user->id == $this->findModel($id)->client_id){
                return $this->render('view', [
                    'model' => $this->findModel($id),
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
            throw new NotFoundHttpException();
        }
        elseif (Yii::$app->user->can('funcionario')){
            if(Yii::$app->user->id == $this->findModel($id)->worker_id){
                return $this->render('view', [
                    'model' => $this->findModel($id),
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
            throw new NotFoundHttpException();
        }
        else
            throw new NotFoundHttpException();
    }

    /**
     * Creates a new Workout_plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Workout_plan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
               $model->mqttPublish();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Workout_plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Workout_plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Workout_plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Workout_plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Workout_plan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
