<?php

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You can add your description here.</p>

    <p>
        <?= Html::a(Html::img('URL_TO_YOUTUBE_IMAGE', ['alt' => 'YouTube', 'class' => 'social-icon']), 'https://www.youtube.com/channel/YOUR_CHANNEL_ID', ['target' => '_blank', 'class' => 'btn btn-success']) ?>
        <?= Html::a(Html::img('URL_TO_TELEGRAM_IMAGE', ['alt' => 'Telegram', 'class' => 'social-icon']), 'https://t.me/YOUR_TELEGRAM_CHANNEL', ['target' => '_blank', 'class' => 'btn btn-primary']) ?>
    </p>
</div>