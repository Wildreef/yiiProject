<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
    <div class="topclass">
        <img src="mainpageimg2.png">
    </div>
<div class="col-md-8">

    <?php

    foreach ($articles as $article): ?>
        <article class="post">

            <div class="post-thumb">

                <a href=""><img class="img-index" src="<?= $article->getImage() ?> " alt="Image"></a>

            </div>

            <div class="post-content">

                <header class="entry-header text-center text-uppercase">

                    <h6><a href="<?= Url::toRoute(['/topic', 'id' => $article->topic->id]) ?>"> <?= $article->topic->name; ?></a></h6>

                    <h1 class="entry-title"><a href="<?= Url::toRoute(['/view', 'id'=>$article->id]) ?>"> <?= $article->title; ?> </a></h1>

                </header>

                <div class="entry-content">

                    <p> <?= mb_strimwidth($article->description,0, 360, "..."); ?> </p>
                    <a href="<?= Url::toRoute(['/view', 'id'=>$article->id]) ?>" class="more-link">
                    <div class="continue_reading_bnt Right">

                       Читати далі

                    </div>
                    </a>
                </div>

                <div class="social-share">

                    <span class="social-share-title pull-left text-capitalize">By <?= $article->user->name;?> On <?= $article->getDate();?></span>

                    <ul class="text-center pull-right">

                        <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li>

                        <?= (int)$article->viewed; ?>

                    </ul>

                </div>

            </div>

        </article>
        <?php endforeach;
        echo \yii\widgets\LinkPager::widget([
            "pagination" => $pagination,
        ])
        ?>
</div>


<?php echo \Yii::$app->view->renderFile('@app/views/site/right.php', compact('popular','recent','topics'));?>