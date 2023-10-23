<?php

use yii\db\Migration;
use frontend\models\SignupForm;
use common\models\User;

/**
 * Class m210730_094813_add_admin
 */
class m210730_094813_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $signup = new SignupForm();

        $signup->signupAdmin([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $admin = User::findByUsername('admin');
        
        if ($admin) {
            $admin->delete();    
        }
    }
    
}
