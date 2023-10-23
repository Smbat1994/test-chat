<?php


namespace frontend\controllers;


use common\models\User;
use yii\data\ActiveDataProvider;
use Yii;

class UserController extends AdminController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = User::findOne($id);

        $model->role = $model->getRole();
        
        if ($model->load(Yii::$app->request->post())) {
             if (!$model->checkRole()) {
                 
                Yii::$app->session->setFlash('error', "Please select a role.");
                
                return $this->redirect(Yii::$app->request->referrer);
            }
            
            $model->updateUserRole();
            
            Yii::$app->session->setFlash('success', "Role updated successfully.");
            
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        User::findOne($id)->delete();

        return $this->redirect(['index']);
    }
}

