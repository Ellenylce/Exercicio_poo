<?php
// 1. ------- CONTA BANCÁRIA -----


//Class (Molde para objetos)
class ContaBancaria {
    public $titular;
    public $saldo;

    // Construtor
    public function __construct($titular, $saldoInicial = 0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Método para depósito
    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
            echo "Depósito de R$ $valor realizado com sucesso.<br>";
        } else {
            echo "Valor de depósito inválido.<br>";
        }
    }

    // Método para saque
    public function sacar($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            echo "Saque de R$ $valor realizado com sucesso.<br>";
        } else {
            echo "Saldo insuficiente ou valor de saque inválido.<br>";
        }
    }

    // Método para verificar o saldo
    public function verificarSaldo() {
        echo "O saldo atual da conta de $this->titular é de R$ $this->saldo.<br><br>";
    }
}

// Criando instâncias da classe e testando os métodos
$conta1 = new ContaBancaria("João da Silva", 1000);
$conta2 = new ContaBancaria("Maria Souza");

$conta1->depositar(500);
$conta1->sacar(200);
$conta1->verificarSaldo();

$conta2->depositar(1500);
$conta2->sacar(2000); // Tentativa de saque acima do saldo
$conta2->verificarSaldo();


// 2. ------- Criando uma Classe para Gerenciar Produtos  -------
 class produto{
    public $nome;
    public $preco;
    public $descricao;

    public function __construct($nome, $preco, $descricao){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
     }
    
    
    //O metodo retorna uma string formatada com o nome, preço e descrição do produto. 
    public function exibirInformacoes(){
        return "O produto $this->nome, custa R$ $this->preco: $this->descricao";
    }
}
    // Criando instâncias de produtos
    $produto1 = new Produto("Smartphone", 1500, "Smartphone Samsung A03");
    $produto2 = new Produto("Televisão", 2500, "Televisão Smart TV");
    $produto3 = new Produto("Fones de Ouvido", 200, "Fones de ouvido via bluetooth <br>");
    
    // Exibindo as informações dos produtos
    echo $produto1->exibirInformacoes() . "<br>";
    echo $produto2->exibirInformacoes() . "<br>";
    echo $produto3->exibirInformacoes() . "<br>";


// 3.-------- Modelando uma hierarquia de veiculos ---------

//Criando a class --- Veiculos ----
class Veiculo{
    public $marca; 
    public $modelo;
    public $ano;

    //Construtor
    public function __construct($marca,$modelo,$ano){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this ->ano = $ano;
    }

    //Metodo
    public function informacoes(){
        return "Marca: $this->marca; <br> Modelo: $this->modelo; <br> Ano: $this->ano;<br>";
    }
}

//Class Carro herda atributos e metodo da class Veiculo
class Carro extends Veiculo{
    public $tipoMotor;

    //construtor
    public function __construct($marca,$modelo,$ano, $tipoMotor){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this-> ano = $ano;
        $this-> tipoMotor = $tipoMotor;
    }

    //Metodo
    public function informacoes(){
        return parent::informacoes() . "Tipo de motor: $this->tipoMotor.<br><br>";
    }
}

//Class moto herda atributos e método da class Veiculo
class Moto extends Veiculo{
    public $cilindradas;

    //Construtor
    public function __construct($marca, $modelo,$ano,$cilindradas){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this-> ano = $ano;
        $this-> cilindradas = $cilindradas;
    }

    //Metodo
    public function informacoes(){
        return parent:: informacoes(). "Cilindradas: $this->cilindradas.<br><br> ";
    }
}

$Carro = new Carro ("Fiat","Uno","2010","1.8 litros, híbrido");
$Moto = new Moto ("Honda","CBR 1000RR","2023","Quatro cilindros em linha, 1000cc, líquido refrigerado");

echo $Carro->informacoes() ;
echo $Moto-> informacoes();


// 4. -------- Métodos Estáticos em uma Classe de Utilitários --------
//metodos statics não há necessidade de instanciar
class Calculadora {
    public static function somar($num1, $num2){
        return $num1 + $num2 ."<br>";
    }

    public static function subtrair($num1, $num2){
        return $num1 - $num2."<br><br>";
    }
}

echo Calculadora::somar(2,2);
echo calculadora::subtrair(3,2);

//5. ------ Crie uma interface chamada TransportInterface com os seguintes métodos ------
// andar()
// parar()
// Implemente essa interface em uma classe chamada Carro e em uma classe chamada Bicicleta. Cada implementação deve exibir uma mensagem apropriada para o método correspondente.

interface TransportInterface{
    public function andar();
    public function parar ();
}

class Carro1 implements TransportInterface {
    public function andar(){
        echo "o carro está andando<br>";
    }

    public function parar(){
        echo "O carro está parado<br>";
    }

}

class Bicicleta implements TransportInterface{
    public function andar(){
        echo "A bicicleta está sendo pedalada<br>";
    }

    public function parar(){
        echo "A bicicleta está parada<br>";
    }
} 

$Carro1 = new Carro1();
$Carro1->andar();
$Carro1 ->parar();

$Bicicleta = new Bicicleta();
$Bicicleta->andar();
$Bicicleta->parar();

?>




