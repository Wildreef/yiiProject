<?php

/* @var $this yii\web\View */

/* @var $form yii\bootstrap5\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;

use yii\bootstrap5\ActiveForm;

$this->title = 'Реєстрація';

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-login">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([

        'id' => 'login-form',

        'layout' => 'horizontal',

        'fieldConfig' => [

            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",

            'labelOptions' => ['class' => 'col-lg-1 control-label'],

        ],

    ]); ?>

    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label("Ім'я") ?>

    <?= $form->field($model, 'login')->textInput()->label("Логін") ?>

    <?= $form->field($model, 'password')->passwordInput()->label("Пароль") ?>

    <div class="form-group">

        <div class="col-lg-offset-1 col-lg-11">

            <?= Html::submitButton(' Зареєструватися ', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="filler1" style="height: 500px"></div>