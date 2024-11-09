<?php

namespace app\controllers;

use Yii;
use app\models\Offer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class OfferController extends Controller
{
    /**
     * Lists all Offer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $offers = Offer::find()->orderBy(['id' => SORT_ASC])->all();

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('_list', [
                'offers' => $offers,
            ]);
        }

        return $this->render('index', [
            'offers' => $offers,
        ]);
    }



    /**
     * Creates a new Offer model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Offer();

        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->load(Yii::$app->request->post());
            if ($model->validate() && $model->save()) {
                return ['success' => true, 'message' => 'Оффер успешно создан'];
            } else {
                return ['success' => false, 'errors' => $model->getErrors()];
            }
        }

        return $this->renderPartial('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Offer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->load(Yii::$app->request->post());
            if ($model->validate() && $model->save()) {
                return ['success' => true, 'message' => 'Оффер успешно обновлен'];
            } else {
                return ['success' => false, 'errors' => $model->getErrors()];
            }
        }

        return $this->renderPartial('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Offer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);
        if ($model->delete()) {
            return ['success' => true, 'message' => 'Оффер успешно удален'];
        } else {
            return ['success' => false, 'message' => 'Ошибка при удалении оффера'];
        }
    }

    /**
     * Filters offers based on name and email.
     * @return mixed
     */
    public function actionFilter()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $name = Yii::$app->request->post('name');
        $email = Yii::$app->request->post('email');

        $query = Offer::find();

        if (!empty($name)) {
            $query->andWhere(['like', 'name', $name]);
        }

        if (!empty($email)) {
            $query->andWhere(['like', 'email', $email]);
        }

        $offers = $query->orderBy(['id' => SORT_ASC])->all();

        $content = $this->renderPartial('_list', [
            'offers' => $offers,
        ]);

        return ['content' => $content];
    }


    public function actionSort()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $sort = Yii::$app->request->post('sort'); 
        $order = Yii::$app->request->post('order');

        $allowedSort = ['id', 'name'];
        $allowedOrder = ['ASC', 'DESC'];

        if (!in_array($sort, $allowedSort)) {
            return ['success' => false, 'message' => 'Некорректное поле для сортировки.'];
        }

        if (!in_array($order, $allowedOrder)) {
            return ['success' => false, 'message' => 'Некорректный порядок сортировки.'];
        }

        $query = Offer::find()->orderBy([$sort => ($order === 'ASC') ? SORT_ASC : SORT_DESC]);

        $offers = $query->all();

        $content = $this->renderPartial('_list', [
            'offers' => $offers,
        ]);

        return ['success' => true, 'content' => $content];
    }
 
    

    /**
     * Finds the Offer model based on its primary key value.
     * @param integer $id
     * @return Offer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Offer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Оффер не найден.');
    }
}
