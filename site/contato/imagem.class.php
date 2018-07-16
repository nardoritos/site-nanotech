<?

/******************************************************
**
**	Nome do Arquivo: imagem.class.php
**	Data de Cria��o: 01/05/2007
**	Autor: Thiago Felipe Festa - thiagofesta@gmail.com
**	�ltima altera��o: 
**	Modificado por: 
**
******************************************************/

/*****************************************
**	Classe		-	Imagem
**	Descri��o	-	Cria a imagem
******************************************/

// Inicio a sess�o, pois estamos trabalhando com sess�es.
session_start(); 

class Imagem{
	var $carac;
	
	function geraImagem(){
	
		// Seleciona uma imagem que est� na pasta bg/ com o nome 0.jpg � 9.jpg,
		// est� imagem que vai ser o fundo da nossa imagem de seguran�a.
		$fundo = "bg/";
		$fundo .= rand(0,9);
		$fundo .= ".jpg";
		echo $fundo;
		die();
		// Cria a imagem.
		$imagem = imagecreatefromjpeg($fundo);

		// seta o $this->carac que � a sess�o carac.
		$this->carac = $_SESSION["carac"];
		
		// percorre o array carac, e traz os valores.
		foreach($this->carac as $linha) {
			// Aqui crio a cor de cada caractere, RGB.
			$cor = imagecolorallocate($imagem, $linha["corR"], $linha["corG"], $linha["corB"]);
			// desenho o lugar dos caracteres de acordo com as posi��es x e y.
			imagestring($imagem, $linha["tam"], $linha["x"], $linha["y"], $linha["c"], $cor);
		}
		
		// ele informa que isso � um arquivo PNG
		
		
		// cria a imagem PNG
		imagepng($imagem);
		
	}

}
geraImagem();
?>