<?php
use yii\helpers\Url;
?>

<div class="col-md-8">

    <article class="post">

        <div class="post-thumb">

            <a href="blog.html"> <img src="<?= $article->getImage() ?>" alt=" image"></a>

        </div>

        <div class="post-content">

            <header class="entry-header text-center text-uppercase">

                <h6>

                    <a href="<?= Url::toRoute(['/topic', 'id' => $article->topic->id]) ?>"> <?= $article->topic->name; ?></a>

                </h6>

                <h1 class="entry-title"><a href="# <a href="blog.html"><?= $article->title; ?></a></h1>

            </header>

            <div class="entry-content">

                <?= nl2br($article->description); ?>

            </div>

            <div class="decoration">

                <?php foreach (preg_split("/[\s,]+/", $article->tag) as $tag): ?>

                    <a href="/search?SearchForm[text]=<?= str_replace('#', '', $tag) ?>"

                       class="btn btn-default text-light"><?= $tag ?></a>

                <?php endforeach; ?>

            </div>

            <div class="social-share">

                <span class="social-share-title pull-left text-capitalize">By <?= $article->user->name; ?> On <?= $article->getDate(); ?>
                </span>

                <ul class="text-center pull-right">

                    <li><a class="s-facebook"

                           href="https://www.facebook.com/sharer/sharer.php?u=<?= Url::base('http'); ?>"><i

                                    class="fa fa-facebook"></i></a></li>

                    <li><a class="s-twitter" href="https://twitter.com/intent/tweet?url=<?= Url::base('http'); ?>"><i

                                    class="fa fa-twitter"></i></a></li>

                    <li><a class="s-google-plus" href="https://plus.google.com/share?url=<?= Url::base('http'); ?>"><i

                                    class="fa fa-google-plus"></i></a></li>

                    <li><a class="s-linkedin"

                           href="http://www.linkedin.com/shareArticle?mini=true&url=<?= Url::base('http'); ?>"><i

                                    class="fa fa-linkedin"></i></a></li>

                </ul>

            </div>

        </div>

    </article>

    <div class="leave-comment"><!--leave comment-->

        <?php if (!Yii::$app->user->isGuest): ?>

            <?php $form = \yii\widgets\ActiveForm::begin([

                'action' => ['site/comment', 'id' => $article->id],

                'options' => ['class' => '', 'role' => 'form']]) ?>

            <div class="leave-comment"><!--leave comment-->

                <h4>Залишити коментар</h4>

                <form class="form-horizontal contact-form" role="form" method="post" action="#">

                    <div class="form-group">

                        <div class="col-md-12">

                            <?= $form->field($commentForm, 'comment')->textarea(['class' => 'form-control',
                                'placeholder' => 'Write Message', 'maxlength' => true,'style' => 'resize: none;',])->label(false) ?>

                        </div>

                    </div>

                    <button type="submit" class="btn send-btn">Відправити</button>

                    <?php \yii\widgets\ActiveForm::end() ?>

                </form>

            </div><!--end leave comment-->

        <?php endif; ?>

    </div><!--end leave comment-->

    <div class="comments-block">

        <?php if (!empty($commentsParent)): ?>

            <div class="comments-block">

                <?php foreach ($commentsParent as $comment): ?>

                    <div class="comment-block">

                        <?php if (!$comment->delete): ?>

                            <div class="comment">

                                <a href="/user/user" class="comment-img">

                                    <img class="img-round" src="<?= $comment->user->getImage(); ?>" alt="">

                                </a>

                                <div class="comment-body">

                                    <div class="comment-top">
                                        <h5 style="margin-right: 10px; font-size: 16px; margin-top: 3px"><?= $comment->user->name; ?></h5>




                                        <p class="comment-date" style="color: #33c46d; margin-right: 10px">

                                            <?= $comment->getDate(); ?>

                                        </p>
                                        <?php if (!Yii::$app->user->isGuest): ?>
                                            <button class="butn_repl" onclick="ShowReplay(this)"> Відповісти
                                            </button>
                                        <?php endif; ?>
                                    </div>

                                    <div class="comment-text">

                                        <?= $comment->text; ?>

                                    </div>



                                    <?php if ($comment->user_id == Yii::$app->user->id): ?>

                                        <?php $form = \yii\widgets\ActiveForm::begin([

                                            'action' => ['site/comment-delete', 'id' => $article->id, 'id_comment' => $comment->id],

                                            'options' => ['class' => '', 'role' => 'form']]) ?>

                                        <div class="comment-delete">

                                            <button type="submit" class="bg-dark border-0">



                                                <img width="40" height="40" src="deletes.png">

                                            </button>

                                        </div>

                                        <?php \yii\widgets\ActiveForm::end() ?>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php else: ?>

                            <?php if (is_int(array_search($comment->id, array_column($commentsChild, 'comment_id')))): ?>

                                <div class="comment" >

                                    <a href="/user/user" class="comment-img" >

                                        <img class="img-round" src="<?= $comment->user->getImage(); ?>" alt="">

                                    </a>

                                    <div class="comment-body">

                                        <div class="comment-top">

                                            <h5 style="margin-right: 10px; font-size: 16px; margin-top: 3px"><?= $comment->user->name; ?></h5>

                                            <p class="comment-date" style="color: #33c46d; margin-right: 10px">

                                                <?= $comment->getDate(); ?>

                                            </p>

                                        </div>

                                        <div class="comment-text">

                                            Comment delete

                                        </div>

                                    </div>

                                </div>

                            <?php endif; ?>

                        <?php endif; ?>

                        <div class="replay-comment" hidden>

                            <?php if (!Yii::$app->user->isGuest): ?>

                                <?php $form = \yii\widgets\ActiveForm::begin([

                                    'action' => ['site/comment', 'id' => $article->id, 'id_comment' => $comment->id],

                                    'options' => ['class' => '', 'role' => 'form']]) ?>

                                <div class="leave-comment-child"><!--leave comment-->

                                    <h4>Leave a reply for <?= $comment->user->name; ?></h4>

                                    <div class="form-group">

                                        <div class="col-md-12">

                                            <?= $form->field($commentForm, 'comment')->textarea(['class' => 'form-control',
                                                'placeholder' => 'Write Message'])->label(false) ?>

                                        </div>

                                    </div>

                                    <button type="submit" class="btn send-btn">Post Comment</button>

                                    <?php \yii\widgets\ActiveForm::end() ?>

                                </div><!--end leave comment-->

                            <?php endif; ?>

                        </div>

                        <div class="comment-childs-container">

                            <div class="comment-childs">

                                <?php foreach ($commentsChild as $commentChild): ?>

                                    <?php if ($commentChild->comment_id == $comment->id): ?>

                                        <div class="comment-block">

                                            <div class="comment" style="margin-bottom: 10px">

                                                <a href="/user/user" class="comment-img">

                                                    <img class="img-round" src="<?= $commentChild->user->getImage(); ?>"

                                                         alt="">

                                                </a>

                                                <div class="comment-body">

                                                    <div class="comment-top">

                                                        <h5 style="margin-right: 10px; font-size: 16px; margin-top: 3px"> <?= $commentChild->user->name; ?></h5>

                                                        <p class="comment-date" style="color: #33c46d; margin-right: 10px">

                                                            <?= $commentChild->getDate(); ?>

                                                        </p>

                                                    </div>

                                                    <div class="comment-text">

                                                        <?= $commentChild->text; ?>

                                                    </div>

                                                    <?php if ($commentChild->user_id == Yii::$app->user->id): ?>

                                                        <?php $form = \yii\widgets\ActiveForm::begin([

                                                            'action' => ['site/comment-delete', 'id' => $article->id,
                                                                'id_comment' => $commentChild->id],

                                                            'options' => ['class' => '', 'role' => 'form']]) ?>

                                                        <div class="comment-delete">

                                                            <button type="submit" class="bg-dark border-0">



                                                                <img width="40" height="40" src="deletes.png">

                                                            </button>

                                                        </div>

                                                        <?php \yii\widgets\ActiveForm::end() ?>

                                                    <?php endif; ?>

                                                </div>

                                            </div>

                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</div>

<?php echo \Yii::$app->view->renderFile('@app/views/site/right.php', compact('popular','recent','topics'));?>

<script>

    function ShowReplay(button) {

        var comment = button.parentElement.parentElement.parentElement.parentElement;

        var repl = comment.getElementsByClassName('replay-comment')[0];

        repl.hidden = !repl.hidden;

        console.log(repl);

    }

</script>
