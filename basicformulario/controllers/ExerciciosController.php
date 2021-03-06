<?php
    namespace app\controllers;
    use app\models\CadastroModel;
    use yii\base\Controller;
    use Yii;

class ExerciciosController extends Controller{
   
    public function actionFormulario(){
        
        $cadastroModel = new CadastroModel;
        $post = Yii::$app->request->post();

        if($cadastroModel->load($post) && $cadastroModel->validate()){ //se foram enviados post para o CadastroModel e foi validado com as regras(rules)
            return $this->render('formulario-confirmacao',[
                'model'=>$cadastroModel
            ]);
        }else{
            return $this->render('formulario',[
                'model'=>$cadastroModel
            ]);
        }
        
    }
}

?>