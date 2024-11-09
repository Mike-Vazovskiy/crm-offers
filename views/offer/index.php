<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $offers app\models\Offer[] */

$this->title = 'Список Офферов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Создать Оффер', ['class' => 'btn btn-success', 'id' => 'create-button']) ?>
    </p>

    <div class="filters" style="margin-bottom: 20px;">
        <?= Html::input('text', 'name', '', ['class' => 'form-control', 'id' => 'filter-name', 'placeholder' => 'Название оффера', 'style' => 'width:200px; display:inline-block; margin-right:10px;']) ?>
        <?= Html::input('text', 'email', '', ['class' => 'form-control', 'id' => 'filter-email', 'placeholder' => 'Email представителя', 'style' => 'width:200px; display:inline-block; margin-right:10px;']) ?>
        <?= Html::button('Фильтровать', ['class' => 'btn btn-primary', 'id' => 'filter-button']) ?>
        <?= Html::button('Сбросить', ['class' => 'btn btn-default', 'id' => 'reset-button']) ?>
    </div>

    <div id="notification" style="display:none;" class="alert"></div>

    <div id="offer-list">
        <?= $this->render('_list', [
            'offers' => $offers,
        ]) ?>
    </div>

</div>

<div id="modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<?php
$createUrl = Yii::$app->urlManager->createUrl(['offer/create']);
$filterUrl = Yii::$app->urlManager->createUrl(['offer/filter']);
$resetUrl = Yii::$app->urlManager->createUrl(['offer/index']);
$sortUrl = Yii::$app->urlManager->createUrl(['offer/sort']);
$script = <<< JS
$(document).ready(function(){
    $('#create-button').click(function(){
        $.get('$createUrl', function(data){
            $('#modal .modal-content').html(data);
            $('#modal').modal('show');
        });
    });

    $('#filter-button').click(function(){
        var name = $('#filter-name').val();
        var email = $('#filter-email').val();
        $.ajax({
            url: '$filterUrl',
            type: 'POST',
            data: {name: name, email: email},
            success: function(data){
                $('#offer-list').html(data.content);
            },
            error: function(){
                showNotification('Ошибка при фильтрации офферов', 'danger');
            }
        });
    });

    $('#reset-button').click(function(){
        $('#filter-name').val('');
        $('#filter-email').val('');
        $.ajax({
            url: '$resetUrl',
            type: 'GET',
            success: function(data){
                $('#offer-list').html(data);
            },
            error: function(){
                showNotification('Ошибка при сбросе фильтров', 'danger');
            }
        });
    });

    $(document).on('submit', 'form#offer-form', function(e){
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response){
                if(response.success){
                    showNotification(response.message, 'success');
                    $('#modal').modal('hide');
                    $('#filter-button').click();
                } else {
                    displayErrors(response.errors);
                }
            },
            error: function(){
                showNotification('Ошибка при отправке формы', 'danger');
            }
        });
    });

    $(document).on('click', '.edit-button', function(){
        var url = $(this).data('url');
        $.get(url, function(data){
            $('#modal .modal-content').html(data);
            $('#modal').modal('show');
        });
    });

    $(document).on('click', '.delete-button', function(){
        if(confirm('Вы уверены, что хотите удалить этот оффер?')){
            var url = $(this).data('url');
            $.post(url, function(response){
                if(response.success){
                    showNotification(response.message, 'success');
                    $('#filter-button').click();
                } else {
                    showNotification('Ошибка при удалении оффера', 'danger');
                }
            }).fail(function(){
                showNotification('Ошибка при удалении оффера', 'danger');
            });
        }
    });

    $(document).on('click', '.sort-link', function(e){
        e.preventDefault();
        var sort = $(this).data('sort');
        var order = $(this).data('order');
        $.ajax({
            url: '$sortUrl',
            type: 'POST',
            data: {sort: sort, order: order},
            success: function(data){
                $('#offer-list').html(data.content);
            },
            error: function(){
                showNotification('Ошибка при сортировке офферов', 'danger');
            }
        });
    });

    function showNotification(message, type){
        $('#notification').removeClass().addClass('alert alert-' + type).text(message).show().delay(3000).fadeOut();
    }

    function displayErrors(errors){
        $('.error-message').text('');
        $.each(errors, function(field, messages){
            $('#error-' + field).text(messages.join(', '));
        });
    }
});
JS;
$this->registerJs($script);
?>
