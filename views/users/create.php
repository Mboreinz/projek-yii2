<?php
    use yii\helpers\Html;

    $this -> title = "Create User";
    $this -> params['breadcrumbs'][] = ['label' => 'Post', 'url' => ['index']];
    $this -> params['breadcrumbs'][] = $this -> title;
?>
    <div class="posts-create">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_from', [
            'model' => $model,
        ])
        ?>
    </div>