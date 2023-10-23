<?php


namespace frontend\controllers;

use common\repositories\MessageRepository;
use common\services\MessageService;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class MessageController extends Controller
{
    /**
     * @var MessageRepository
     */
    private $messageRepository;

    /**
     * @var MessageService
     */
    private $messageService;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@', '?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['sendMessage'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['updateMessage'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['deleteMessage'],
                    ],
                ],
            ]
        ];
    }

    /**
     *
     */
    public function init()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $this->messageRepository = new MessageRepository();

        $this->messageService = new MessageService();

        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page') ?? 1;

        return $this->messageService->getContent($page);
    }

    /**
     * @return bool
     */
    public function actionCreate(): bool
    {
        return $this->messageRepository->saveMessage(Yii::$app->request->post('message'));
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete(): bool
    {
        return $this->messageRepository->deleteMessage(Yii::$app->request->post('id'));
    }

    /**
     * @return bool
     */
    public function actionUpdate(): bool
    {
        return $this->messageRepository->updateMessage(Yii::$app->request->post('id'));
    }
}