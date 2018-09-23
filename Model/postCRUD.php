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
		//date_default_timezone_set('America/Sao_Paulo');

		$result = $sql->query("INSERT INTO posts(autor_original, titulo, conteudo, estado) 
		VALUES(:AUTOR_O, :TITULO, :CONTEUDO, :ESTADO)", array(
			":AUTOR_O"=>$autor,
			":TITULO"=>$titulo,
			":CONTEUDO"=>$conteudo,
			":ESTADO"=>$estado,
	
		));
			header("Location: /progweb-blog/view/inicio.php");
			//echo "POST INSERIDO";
	}

	public function selectPost($query, $param = array()){
		//"SELECT * FROM posts ORDER BY data_original DESC"
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



	public function editPost(){
		
		$sql = new sql();
		$pc = new postCRUDController();
		$v = $pc->postInput();
	
		$autor = $v["autor"];
		$titulo = $v["titulo"];
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

    public function deletePost(){
		$sql = new sql();
		$pc = new postCRUDController();
		$v = $pc->postInput();
		$cod = $v["id"];
		$estado = 2;

		$result = $sql->query("UPDATE posts SET estado = :ESTADO WHERE id = :ID", array(
			":ESTADO"=>$estado,
			":ID"=>$cod
		));

		  header("Location: /progweb-blog/view/inicio.php");
	}

	public function checkDel($cod){
		
		$sql = new sql();
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

	public function checkEdit($cod){

		$sql = new sql();
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

	public function callSelectP(){
		$v = $this->selectPost("SELECT * FROM posts ORDER BY data_original DESC");
		return $v;
	}
}


?>









