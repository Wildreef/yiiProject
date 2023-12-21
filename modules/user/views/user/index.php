<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>





</div>


<div class="user-main-blick">



    <?php foreach ($dataProvider->models as $model): ?>
        <div class="user-main-block">
            <div class="user-main-block-img">
                <?= Html::img($model->getImage(), ['width' => 200]); ?>
                <?= Html::a('Змінити зображення', ['set-image', 'id' => $model->id], ['class' => 'btn btn-primary change_img_new_btn']) ?>
                <?php

                if (!Yii::$app->user->isGuest) {
                    if (Yii::$app->user->id == 1) {

                        echo Html::a('Адмін панель', Url::to(['/admin/default']), ['class' => 'btn btn-primary adminbtngreen']);;
                    } else {

                        echo "";
                    }

                }
                ?>

            </div>
            <div class="user-main-block-info">
                <p>Name: <?= Html::encode($model->name) ?>
                    <a href="<?= Url::to(['update', 'id' => $model->id]) ?>"">
                    <img src="/pen_update.jpg" width="24px" height="24px" alt="update" style="margin-left: 5px">
                    </a>
                </p>
                <p>Login: <?= substr(Html::encode($model->login), 0, 1) . str_repeat('*', strlen($model->login) - 1) ?>
                    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>"">
                    <img src="/eye_view.jpg" width="26px" height="20px" alt="update" style="margin-left: 3px">
                    </a>
                </p>
                <p>Password: <?= substr(Html::encode($model->password), 0, 1) . str_repeat('*', strlen($model->password) - 1) ?></p>

            </div>
            <div class="user-main-block-actions">

            </div>
        </div>
    <?php endforeach; ?>

</div>
<div class="filler1" style="height: 310px"></div>
