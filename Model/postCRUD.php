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
		date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y-m-d H:i:s");
		
		$result = $sql->query("INSERT INTO posts(autor_original, titulo, conteudo, estado, data_original) 
		VALUES(:AUTOR_O, :TITULO, :CONTEUDO, :ESTADO, :DATA_O)", array(
			":AUTOR_O"=>$autor,
			":TITULO"=>$titulo,
			":CONTEUDO"=>$conteudo,
			":ESTADO"=>$estado,
			":DATA_O"=>$data
		));
			echo "POST INSERIDO";
	}

	public function selectPost(){
		
		$sql = new sql();
		$result = $sql->select("SELECT * FROM posts ORDER BY data_original DESC", array());
		
		foreach($result as $key => $res){	
			foreach($res as $chave => $re){
			if($chave == "data_original"){
				$fdt = date("d/m/Y, H:i:s", strtotime($res["data_original"]));
				$result[$key][$chave] = $fdt;
			}
		}
	}

		foreach($result as $key => $res){	
			foreach($res as $chave => $re){
			if($chave == "data_editado"){
				$fdt = date("d/m/Y, H:i:s", strtotime($res["data_editado"]));
				$result[$key][$chave] = $fdt;
			}
		}
	}
	return $result;
}	



	public function editPost(){
		
		$sql = new sql();
		$pc = new postCRUDController();
		$v = $pc->postInput();
		var_dump($v);
		$autor = $v["autor"];
		$titulo = $v["titulo"];
		$conteudo = $v["conteudo"];
		$cod = $v["id"];
		$estado = 1;
		date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y-m-d H:i:s");
		
		$result = $sql->query("UPDATE posts SET autor_editado = :AUTOR_E, titulo = :TITULO, 
		conteudo = :CONTEUDO, data_editado = now() WHERE id = :ID", array(
				":AUTOR_E"=>$autor,
				":TITULO"=>$titulo,
				":CONTEUDO"=>$conteudo,
			 //	":DATA_E"=>$data,
				":ID"=>$cod
			));
			echo "alterado com sucesso";
	 
			return $editado = $cod;
	}

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









