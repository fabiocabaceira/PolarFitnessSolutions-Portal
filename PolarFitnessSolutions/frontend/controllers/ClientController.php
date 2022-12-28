<?php

namespace frontend\controllers;

use frontend\models\client;
use frontend\models\clientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientController implements the CRUD actions for client model.
 */
class ClientController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
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
     * Lists all client models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new clientSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single client model.
     * @param int $client_id Client ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($client_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($client_id),
        ]);
    }

    /**
     * Creates a new client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new client();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'client_id' => $model->client_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $client_id Client ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($client_id)
    {
        $model = $this->findModel($client_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'client_id' => $model->client_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing client model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $client_id Client ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($client_id)
    {
        $this->findModel($client_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $client_id Client ID
     * @return client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($client_id)
    {
        if (($model = client::findOne(['client_id' => $client_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
