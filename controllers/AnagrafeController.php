<?php

namespace app\controllers;

use Yii;
use app\models\Anagrafe;
use app\models\AnagrafeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnagrafeController implements the CRUD actions for Anagrafe model.
 */
class AnagrafeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Anagrafe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnagrafeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anagrafe model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Anagrafe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Anagrafe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Il nuovo utente è stato registrato correttamente');
            return $this->redirect(['view', 'id' => $model->idContatto]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Anagrafe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //messaggi FLASH esempi
            Yii::$app->session->addFlash('success', 'Il nuovo utente è stato aggiornato correttamente');               
            Yii::$app->session->addFlash('warning', 'Non ha ancora registrato il programma');
            Yii::$app->session->addFlash('danger', 'smetterà di funzionare tra 10gg');
            Yii::$app->session->addFlash('info', 'sto scherzando :-)');
            return $this->redirect(['view', 'id' => $model->idContatto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Anagrafe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anagrafe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anagrafe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anagrafe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
