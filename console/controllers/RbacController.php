<?php


namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    /**
     * @throws \Exception
     */
    public function actionInit()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('user');
        $role->description = 'Пользователь';
        Yii::$app->authManager->add($role);
    }

    public function actionRole()
    {
        $user = User::find()->where(['username' => 'admin'])->one();
        $adminRole = \Yii::$app->authManager->getRole('admin');
        \Yii::$app->authManager->assign($adminRole, $user->id);
    }
}