<?php
//determinando uma variavel e definindo o seu tipo de dados
$resultado = (double) 0;
$valor1 = (double)0;
$valor2 = (double)0;
$operacao = (string)null;

//criando constantes para o projeto
//Forma 1 de criar constante
define('ERROCAIXAVAZIA' , "<span calss='msgErro'>Não é possivel calcular sem preencher todos os dados!!!</span>");
//Forma 2 de criar constante
const ERRODADOSNAONUMERICOS = "<span calss='msgErro'> Não é possivel realizar calculos com valores não númericos</span>";


//string(texto), 
//int ou integer(númérico inteiro), 
//double(numérico com casas decimais), 
//float ( = double só que com pouco armazenamento), 
//boolean ou bool(true e false ou 0 e 1), 
//array(tipode de dados para vetores e matrizes),
//object(tipo de dados para colocar um objeto)
//verificação se o botão foi acionado
if(isset($_POST['btnCalcular'])){
    //empty=() - serve para substituir [ == "" ]
    //serve para ver se o elemento esta vazia
    if($_POST['txtValor1'] == "" || $_POST['txtValor2']== ""){
        echo (ERROCAIXAVAZIA);
    }
    else{  
        //regatando valres do formulario no html
            $valor1 = $_POST['txtValor1'];
            $valor2 = $_POST['txtValor2'];
            
        //Resgata o valor dp radio e converte a escrita para MAIUSCULO
        //strtoupper() maiusculo
        //strtolower() minusculo
        // validação para indentificar os tipos de calculos
        if(isset($_POST['rdoResultado'])){
            
            $operacao = strtoupper($_POST['rdoResultado']);
                if(is_numeric($valor1) && is_numeric($valor2)){

                    if($operacao == 'SOMA'){
                        $resultado = $valor1 + $valor2;
                    }
                    elseif($operacao == 'SUB'){
                        $resultado = $valor1 - $valor2;
                    }
                    if($operacao == 'MULT')
                    {
                        $resultado = $valor1 * $valor2;
                    }
                    elseif( $operacao == "DIV"){
                        $resultado = $valor1 / $valor2;
                    }
                }
            else{
                echo(ERRODADOSNAONUMERICOS);
            }
        }
        else{
            echo (ERROCAIXAVAZIA);
        }
    }
}
?>
<!DOCTYPE html>

<html lang="pt BR">
    <head>
        <title>
            Calculadora Simples
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet"
              type="text/css"
              href="style/style.css">              
    </head>
    <body>
        <main>
            <h1>Calculadora Simples</h1>
            <form name="frmCalculo" action="" method="post">
                <div>
                    <lable>
                        Valor1 :  
                    </lable> 
                    <input type="text" placeholder="Insira um número" name="txtValor1" size="27" maxlength="25" value = "<?=$valor1?>"  >
                </div>
                <div>
                    <lable>
                        Valor2 : 
                    </lable>
                    <input type="text" placeholder="Insira um número" name="txtValor2" size="27" maxlength="25" value = "<?=$valor2?>"  >
                </div>
                    
                <div id="radios">
                    <div>
                    <lable>Calculos : </lable>
                    </div>
                    <div>
                    <input type="radio" name="rdoResultado" value="Soma"<?php if($operacao == 'SOMA'){echo('checked');}?>><span>Somar </span>
                    </div>
                    <div>
                    <input type="radio" name="rdoResultado" value="Sub" <?php if($operacao == 'SUB'){echo('checked');}?>><span>Subtrair</span>
                    </div>
                    <div>
                    <input type="radio" name="rdoResultado" value="Mult" <?php if($operacao == 'MULT'){echo('checked');}?>><span>Multiplicar</span>
                    </div>
                    <div>
                    <input type="radio" name="rdoResultado" value="Div" <?php if($operacao == 'DIV'){echo('checked');}?>><span>Dividir</span>
                    </div>
                </div>
                <div id="resultado">
                    <div id="result"><?=$resultado;?></div>
                    <input id="btnCalcular" type="submit" name="btnCalcular" value="Calcular">
                </div>
            </form>
        </main>
    </body>
</html>