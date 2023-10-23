<?php

namespace common\repositories;

use common\models\Message;
use common\models\User;
use common\services\MessageService;
use Yii;
use yii\db\ActiveQuery;

/**
 * Class MessageRepository
 * @package common\repositories
 */
class MessageRepository
{
    const QUANTITY_ON_PAGE = 6;

    /**
     * @param int|null $page
     * @return array
     */
    public function getMessages(int $page = null): array
    {
        $messages = Message::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(self::QUANTITY_ON_PAGE);

        if (!is_null($page)) {
            $messages->offset($page * self::QUANTITY_ON_PAGE);
        }

        if (!User::isAdmin()) {
            $messages->where(['not_correct' => false]);
        }

        return $messages->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvalidMessages(): ActiveQuery
    {
        return Message::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->where(['not_correct' => true]);
    }

    /**
     * @param $message
     * @return bool
     */
    public function saveMessage($message): bool
    {
        $messageObj = new Message();
        $messageService = new MessageService();

        $messageObj->message = $messageService->filterMessage($message);
        $messageObj->user_id = Yii::$app->user->id;

        return $messageObj->save();
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function deleteMessage(int $id): bool
    {
        return Message::findOne($id)->delete();
    }

    /**
     * @param $id
     * @return bool
     */
    public function updateMessage($id): bool
    {
        $message = Message::findOne($id);

        $message->not_correct = $message->not_correct ? false : true;

        return $message->save();
    }
}