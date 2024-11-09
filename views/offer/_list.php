<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;
use yii\helpers\Html;


/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?php if ($dataProvider->count > 0): ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID <?= Html::a('', ['sort', 'sort' => 'id', 'order' => 'ASC'], ['class' => 'sort-link', 'data-sort' => 'id', 'data-order' => 'ASC']) ?> <?= Html::a('', ['sort', 'sort' => 'id', 'order' => 'DESC'], ['class' => 'sort-link', 'data-sort' => 'id', 'data-order' => 'DESC']) ?></th>
                <th>Название Оффера <?= Html::a('', ['sort', 'sort' => 'name', 'order' => 'ASC'], ['class' => 'sort-link', 'data-sort' => 'name', 'data-order' => 'ASC']) ?> <?= Html::a('', ['sort', 'sort' => 'name', 'order' => 'DESC'], ['class' => 'sort-link', 'data-sort' => 'name', 'data-order' => 'DESC']) ?></th>
                <th>Email Представителя</th>
                <th>Телефон Представителя</th>
                <th>Дата Добавления</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $offer): ?>
                <tr>
                    <td><?= Html::encode($offer->id) ?></td>
                    <td><?= Html::encode($offer->name) ?></td>
                    <td><?= Html::encode($offer->email) ?></td>
                    <td><?= Html::encode($offer->phone) ?></td>
                    <td><?= Yii::$app->formatter->asDatetime($offer->created_at) ?></td>
                    <td>
                        <?= Html::button('Редактировать', [
                            'class' => 'btn btn-primary edit-button',
                            'data-url' => Yii::$app->urlManager->createUrl(['offer/update', 'id' => $offer->id]),
                        ]) ?>
                        <?= Html::button('Удалить', [
                            'class' => 'btn btn-danger delete-button',
                            'data-url' => Yii::$app->urlManager->createUrl(['offer/delete', 'id' => $offer->id]),
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'options' => [
            'class' => 'pagination justify-content-center mt-4', 
        ],
        'firstPageLabel' => 'Первая',
        'lastPageLabel'  => 'Последняя',
        'nextPageLabel'  => 'Следующая',
        'prevPageLabel'  => 'Предыдущая',
        'maxButtonCount' => 5, 
        'linkOptions' => ['class' => 'page-link'], 
        'prevPageCssClass' => 'page-item', 
        'nextPageCssClass' => 'page-item',
        'firstPageCssClass' => 'page-item',
        'lastPageCssClass' => 'page-item',
        'disabledPageCssClass' => 'page-item disabled', 
        'activePageCssClass' => 'page-item active',
    ]); ?>
<?php else: ?>
    <p>Офферов не найдено.</p>
<?php endif; ?>
