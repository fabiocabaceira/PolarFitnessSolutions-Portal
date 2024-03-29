<?php

namespace backend\controllers;

use backend\models\WorkoutPlan;
use backend\models\WorkoutPlanSearch;
use frontend\models\Workout_plan_exercise_relationSearch;
use Throwable;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * Workout_planController implements the CRUD actions for WorkoutPlan model.
 */
class Workout_planController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all WorkoutPlan models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new WorkoutPlanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkoutPlan model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        $searchModel = new Workout_plan_exercise_relationSearch();
        $searchModel->workout_plan_id = $id;

        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new WorkoutPlan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new WorkoutPlan();

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
     * Updates an existing WorkoutPlan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
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
     * Deletes an existing WorkoutPlan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     */
    public function actionDelete(int $id): Response
    {
        try {
            $this->findModel($id)->delete();
        } catch (Throwable $e) {
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkoutPlan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return WorkoutPlan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): WorkoutPlan
    {
        if (($model = WorkoutPlan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
