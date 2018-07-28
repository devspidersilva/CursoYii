<?php
    namespace app\controllers;
    use app\models\Pessoas;
    use app\models\CadastroModel;
    use yii\base\Controller;
    use Yii;
    use yii\data\Pagination;

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

    public function actionPessoas(){
        /* //listando pessoas 
        $pessoas =  Pessoas::find()->orderBy('nome')->all();
        echo '<pre>';
        var_dump($pessoas);*/
        
        // busca apenas pelo registro do id 5
        /*$pessoa = Pessoas::findOne(5);

        echo $pessoa->nome. ' - '.$pessoa->email;*/

        //update
        /*$pessoa = Pessoas::findOne(5);
        $pessoa->nome = 'Clovis Nogueira';
        $pessoa->save();
        echo $pessoa->nome;*/

        $query = Pessoas::find();
        $pagination = new Pagination([
            'defaultPageSize'=>3,//três registros por página
            'totalCount'=> $query->count() //total de registros que irão carregar
        ]);
        $pessoas = $query->orderBy('nome')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
        
        return $this->render('pessoas',[
            'pessoas'=>$pessoas,
            'pagination'=>$pagination
        ]);
    }
}

?>