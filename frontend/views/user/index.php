<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'users';
?>
<section class="user__search">
    <?php foreach ($dataProvider->getModels() as $user): ?>
        <div class="content-view__feedback-card user__search-wrapper">
            <div class="feedback-card__top">
                <div class="user__search-icon">
                    <a href="#"><img src="<?= $user->profile->image_url; ?>" width="65" height="65"></a>
                    <span><?= $user->executorTasksCount; ?> заданий</span>
                    <span><?= $user->feedBacksCount; ?> отзывов</span>
                </div>
                <div class="feedback-card__top--name user__search-card">
                    <p class="link-name"><a href="<?= Url::toRoute(['view', 'id' => $user->id]);?>" class="link-regular"><?= $user->name; ?></a></p>
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <?php if ($user->rate > $i): ?>
                            <span></span>
                        <?php else: ?>
                            <span class="star-disabled"></span>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <b><?= $user->rate; ?></b>
                    <p class="user__search-content">
                        <?= $user->profile->about; ?>
                    </p>
                </div>
                <span
                        class="new-task__time">Был на сайте <?= (new DateTime($user->visit_at))->diff(new DateTime())->format("%y лет, %d дней, %h часов, %i минут"); ?> назад</span>
            </div>
            <div class="link-specialization user__search-link--bottom">
                <?php foreach ($user->categories as $category): ?>
                    <a href="#" class="link-regular"><?= $category->name; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<section class="search-task">
    <div class="search-task__wrapper">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
</section>
