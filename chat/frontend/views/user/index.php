<?php
/**
 * @var $dataProvider \common\models\Messages
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'username',
        [
            'label' => 'Role',
            'value' => function($dataProvider) {
                return $dataProvider->getRole();
            }
        ],
        [
            'label' => 'Update User Rule',
            'headerOptions' => ['style' => 'width:100px'],
            'format' => 'raw',
            'value' => function ($dataProvider) {
                $icon = '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg>';
                return Html::a($icon, Url::toRoute(['/user/update', 'id' => $dataProvider->id]));
            }
        ]
    ],
]);?>

