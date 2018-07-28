<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
<h2>Formulário de cadastros - Yii 2</h2>
<?php
 $form = ActiveForm::begin()
?>
    <?php //inputs... (modelo, campo do modelo) ?>
    <?= $form->field($model,'nome')?>
    <?= $form->field($model,'email')?>
    <?= $form->field($model,'idade')?>

    <div class="form-group">
        <?= Html::submitButton('Enviar dados',['class'=>'btn btn-primary']) ?>
        
    </div>

<?php
  ActiveForm::end()
?>