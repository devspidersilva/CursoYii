<?php
namespace app\models;
use \yii\base\Model; // sem banco de dados

class CadastroModel extends Model{
    public $nome;
    public $email;
    public $idade;

    //regras = rules
    public function rules(){

        return [
            [['nome','email','idade'],'required'] ,
            ['email','email'], 
            ['idade', 'number', 'integerOnly'=>true]
        ];
    }

    public function attributeLabels(){
        // o atributo nome nas views sera chamado de nome completo e o email será E-mail
        return[
            'nome'=> 'Nome completo',
            'email'=> 'E-mail',
            'idade'=> 'Idade'
        ];
    }
}
?>
