<?php


namespace common\services;

use common\repositories\MessageRepository;
use Yii;

class MessageService
{
    /**
     * @param $message
     * @return string
     */
    public function filterMessage($message): string
    {
        return htmlspecialchars($message);
    }

    /**
     * @return string
     */
    private function messagePath(): string
    {
        return Yii::getAlias('@frontend/views/message/');
    }

    /**
     * @param int $page
     * @return string
     */
    public function getContent(int $page): string
    {
        $messageRepository = new MessageRepository();
        $messages = $messageRepository->getMessages($page);

        $messages = array_reverse($messages);

        $content = '';
        $userId = Yii::$app->user->id;
        foreach ($messages as $message) {

            if ($message->user_id == $userId) {
                $content .= Yii::$app->controller->renderFile(
                    $this->messagePath() . '_outgoing.php',
                    compact('message')
                );
            } else {
                $content .= Yii::$app->controller->renderFile(
                    $this->messagePath() . '_incoming.php',
                    compact('message')
                );
            }
        }

        return $content;
    }
}