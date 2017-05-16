<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Workspace;
use app\models\Collection;
use app\models\Dataset;
/* @var $this yii\web\View */
/* @var $model app\models\Workspace */
/* @var $form ActiveForm */
$this->title = 'Create Dataset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="powerbi-createworkspace">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
		
		<?= $form->field($model, 'collection_id')->dropDownList(ArrayHelper::map($collections,'collection_id','collection_name'), ['prompt'=>'Select Collection','onChange'=>'$.get("'.Yii::$app->urlManager->createUrl('workspace/workspaceslist?collection_id=').'"+$(this).val(),function(data){$("#dataset-workspace_id").html(data);})',])?>
        <?= $form->field($model, 'workspace_id')->dropDownList([''=>'Select Workspace']) ?>
        <?= $form->field($model, 'dataset_name')->textInput() ?>
		<?= $form->field($model, 'file')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- powerbi-createworkspace -->
