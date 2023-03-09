<?php
    class Retangulo{
        private $largura;
        private $altura; 

        function __construct(){
            $this->largura = 1; 
            $this->altura = 1; 
        }

        function setLargura($largura){
            $this->largura = $largura;
        }
        function getLargura($largura){
            return $this->largura; 
        }

        function setAltura($altura){
            $this->altura = $altura;
        }
        function getAltura($altura){
            return $this->altura; 
        }
        public function ehQuadrado(){
            if($this->largura == $this->altura){
                return $texto = "É quadrado.";
            } 
            else{
                return $texto = "Não é quadrado.";
            }
        }
        public function calcPerimetro(){
            $resultado = ($this->largura + $this->largura) + ($this->altura + $this->altura);
            return $resultado;
        }
        public function calcArea(){
            $area = $this->largura * $this->altura; 
            return $area;
        }

        
    }
    $ret1 = new Retangulo();
    $ret1->setLargura(4);
    $ret1->setAltura(4); 
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            echo $ret1->ehQuadrado();
            echo "<br>";
            echo $ret1->calcArea();
            echo "<br>";
            echo $ret1->calcPerimetro();  
            ?>
        
    </body>
    </html>
