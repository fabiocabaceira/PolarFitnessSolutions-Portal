<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PhysicalEvaluationBooking;
use frontend\models\PhysicalEvaluationBookingSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Physical_evaluation_bookingController implements the CRUD actions for PhysicalEvaluationBooking model.
 */
class Physical_evaluation_bookingController extends Controller
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
                            'actions' => ['update', 'delete','create'],
                            'allow' => true,
                            'roles' => ['funcionario'],
                        ],
                        [
                            'actions' => ['index','view'],
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
     * Lists all PhysicalEvaluationBooking models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PhysicalEvaluationBookingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhysicalEvaluationBooking model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $booking = PhysicalEvaluationBooking::findOne(['id'=>$id]);

        if(Yii::$app->user->id == $booking->client_id || Yii::$app->user->id == $booking->worker_id){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new NotFoundHttpException();
        }
    }

    /**
     * Creates a new PhysicalEvaluationBooking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PhysicalEvaluationBooking();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing PhysicalEvaluationBooking model.
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
     * Deletes an existing PhysicalEvaluationBooking model.
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
     * Finds the PhysicalEvaluationBooking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PhysicalEvaluationBooking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhysicalEvaluationBooking::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
