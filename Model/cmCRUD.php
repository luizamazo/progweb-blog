<?php

require_once("../config.php");
	
include_once "../class/sql.php";
include_once "../controller/cmCRUDController.php";
	
class cmCRUD{
	
	public function insertComment(){
		
		$sql = new sql();
		$cc = new cmCRUDController();
		$v = $cc->cmInput();

		$autor = $v["autor"];
		$conteudo = $v["conteudo"];
		$estado = 1;

		$result = $sql->query("INSERT INTO comentarios(autor_original, conteudo, estado) 
		VALUES(:AUTOR_O, :CONTEUDO, :ESTADO)", array(
			":AUTOR_O"=>$autor,
			":CONTEUDO"=>$conteudo,
			":ESTADO"=>$estado,
	
		));
			header("Location: /progweb-blog/view/inicio.php");
			//echo "POST INSERIDO";
	}

	public function selectComment($query, $param = array()){
		
		$sql = new sql();
		$result = $sql->select($query, $param);
		
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

	public function editComment(){
		
		$sql = new sql();
		$cc = new cmCRUDController();
		$v = $cc->cmInput();
	
		$autor = $v["autor"];
		$conteudo = $v["conteudo"];
		$cod = $v["id"];
		
		$result = $sql->query("UPDATE posts SET autor_editado = :AUTOR_E, titulo = :TITULO, 
		conteudo = :CONTEUDO, editado = :EDITADO WHERE id = :ID", array(
				":AUTOR_E"=>$autor,
				":TITULO"=>$titulo,
				":CONTEUDO"=>$conteudo,
				":ID"=>$cod,
				":EDITADO"=>1
			));

			header("Location: /progweb-blog/view/inicio.php");
}

    public function deleteComment(){
		$sql = new sql();
		$cc = new cmCRUDController();
		$v = $cc->cmInput();
		$cod = $v["id"];
		$estado = 2;

		$result = $sql->query("UPDATE posts SET estado = :ESTADO WHERE id = :ID", array(
			":ESTADO"=>$estado,
			":ID"=>$cod
		));

		  header("Location: /progweb-blog/view/inicio.php");
	}

	public function checkDelCM($cod){
		
		$sql = new sql();
		$cc = new cmCRUDController();
		$v = $cc->cmInput();
		$id = $cod;
		
		$t = $sql->select("SELECT estado FROM posts WHERE id = :ID", array(
			":ID"=>$id
		));

		if($t[0]["estado"] == "2"){
			return true;
		}else{
			return false;
		}
	}

	public function checkEditCM($cod){

		$sql = new sql();
		$cc = new cmCRUDController();
		$v = $cc->cmInput();
		$id = $cod;
		
		$t = $sql->select("SELECT editado FROM posts WHERE id = :ID", array(
			":ID"=>$id
		));
		//onde 1 é editado e 0 não editado
		if($t[0]["editado"] == 1){
			return true;
		}else{
			return false;
		}

	}

	public function callSelectCM(){
		$v = $this->selectPost("SELECT * FROM comentarios");
		return $v;
	}
}


?>









