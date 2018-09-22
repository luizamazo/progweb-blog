<?php

require_once("../config.php");
	
include_once "../class/sql.php";
include_once "../controller/postCRUDController.php";
	
class postCRUD{
	
	public function insertPost(){
		
		$sql = new sql();
		$pc = new postCRUDController();
		$v = $pc->postInput();

		$autor = $v["autor"];
		$titulo = $v["titulo"];
		$conteudo = $v["conteudo"];
		$estado = 1;
		
		$result = $sql->query("INSERT INTO posts(autor, titulo, conteudo, estado) 
		VALUES(:AUTOR, :TITULO, :CONTEUDO, :ESTADO)", array(
			":AUTOR"=>$autor,
			":TITULO"=>$titulo,
			":CONTEUDO"=>$conteudo,
			":ESTADO"=>$estado
		));
			echo "POST INSERIDO";
	}

	public function selectPost(){
		
		$sql = new sql();
		$result = $sql->select("SELECT id, autor, titulo, conteudo, data FROM posts ORDER BY data DESC", array());
		
		foreach($result as $key => $res){	
			foreach($res as $chave => $re){
			if($chave == "data"){
				$fdt = date("d/m/Y, H:i:s", strtotime($res["data"]));
				$result[$key][$chave] = $fdt;
			}
		}
	}	
	 return $result;
}

	public function editPost(){
		
		$sql = new sql();
		$pc = new postCRUDController();
		//$v = $pc->postInput();

		$autor = $v["autor"];
		$titulo = $v["titulo"];
		$conteudo = $v["conteudo"];
		$estado = 1;
		
		$cod = 7;
		
		$result = $sql->query("UPDATE posts SET autor = :AUTOR, titulo = :TITULO, 
		conteudo = :CONTEUDO WHERE id = :ID", array(
				":AUTOR"=>$autor,
				":TITULO"=>$titulo,
				":CONTEUDO"=>$conteudo,
				":ID"=>$cod
			));
			echo "alterado com sucesso";
	}

	//updatePost($autor, $titulo, $conteudo, $cod);


    public function deletePost($cod){
		$cod = 8;
		$estado = 2;
		$sql = new sql();
		$result = $sql->query("UPDATE posts SET estado = :ESTADO WHERE id = :ID", array(
			":ESTADO"=>$estado,
			":ID"=>$cod
		));
	}

	//deletePost($cod);
}



?>









