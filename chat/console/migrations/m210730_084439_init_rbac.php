<?php

use yii\db\Migration;

/**
 * Class m210730_084439_init_rbac
 */
class m210730_084439_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $sendMessage = $auth->createPermission('sendMessage');
        $sendMessage->description = 'Send message';
        $auth->add($sendMessage);

        $updateMessage = $auth->createPermission('updateMessage');
        $updateMessage->description = 'Update message';
        $auth->add($updateMessage);

        $deleteMessage = $auth->createPermission('deleteMessage');
        $deleteMessage->description = 'Delete message';
        $auth->add($deleteMessage);


        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $sendMessage);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $sendMessage);
        $auth->addChild($admin, $updateMessage);
        $auth->addChild($admin, $deleteMessage);
        $auth->addChild($admin, $user);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210730_084439_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
