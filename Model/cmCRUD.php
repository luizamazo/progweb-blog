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
		$postID = $v["post_id"];
		$estado = 1;

		if(isset($v["resp_id"])){
			$respID = $v["resp_id"];
			$respUser = $v["resp_user"];
		}
		
		var_dump($v);
		//se eh nulo quer dizer que eh novo e é pra somente inserir
		if(!isset($v["resp_id"])){
			
			$result = $sql->query("INSERT INTO comentarios(autor_original, conteudo, estado, post_id) 
			VALUES(:AUTOR_O, :CONTEUDO, :ESTADO, :POST_ID)", array(
			":AUTOR_O"=>$autor,
			":CONTEUDO"=>$conteudo,
			":ESTADO"=>$estado,
			":POST_ID"=>$postID
		));
		//se não for comentário novo ele é resposta então insere resposta id
		}else{
			$result = $sql->query("INSERT INTO respostas(autor_original, conteudo, estado, post_id, resp_id, resp_user)
			VALUES(:AUTOR_O, :CONTEUDO, :ESTADO, :POST_ID, :RESP_ID, :RESP_USER)", array(
				":AUTOR_O"=>$autor,
				":CONTEUDO"=>$conteudo,
				":ESTADO"=>$estado,
				":RESP_ID"=>$respID,
				":RESP_USER"=>$respUser,
				":POST_ID"=>$postID
			));
		}
		
		//header("Location: /progweb-blog/view/inicio.php");
			//echo "Coment inserido";
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

	public function editComment($edID){
		
		$sql = new sql();
		$cc = new cmCRUDController();
		$v = $cc->cmInput();

		$autor = $v["autor"];
		$conteudo = $v["conteudo"];
		
		if(isset($v["resp_id"])){
			$respID = $v["resp_id"];
			$respUser = $v["resp_user"];
		}
		
		if(!isset($v["resp_id"])){
			$result = $sql->query("UPDATE comentarios SET autor_editado = :AUTOR_E, 
			conteudo = :CONTEUDO, editado = :EDITADO WHERE id = :ID", array(
				":AUTOR_E"=>$autor,
				":CONTEUDO"=>$conteudo,
				":ID"=>$edID,
				":EDITADO"=>1
			));
		}else{
			$result = $sql->query("UPDATE respostas SET autor_editado = :AUTOR_E, 
			conteudo = :CONTEUDO, editado = :EDITADO, resp_id = :RESP_ID, resp_user = :RESP_USER WHERE id = :ID", array(
				":AUTOR_E"=>$autor,
				":CONTEUDO"=>$conteudo,
				":ID"=>$edID,
				":RESP_ID"=>$respID,
				":RESP_USER"=>$respUser,
				":EDITADO"=>1
			));
		}
		

			header("Location: /progweb-blog/view/inicio.php");
}

    public function deleteComment($delID){
		$sql = new sql();
		$estado = 2;
	
		$result = $sql->query("UPDATE comentarios SET estado = :ESTADO WHERE id = :ID", array(
			":ESTADO"=>$estado,
			":ID"=>$delID
		));

		  header("Location: /progweb-blog/view/inicio.php");
	}

	public function checkDelCM($comID){
		
		$sql = new sql();
		$id = $comID;
		
		$t = $sql->select("SELECT estado FROM comentarios WHERE id = :ID", array(
			":ID"=>$id
		));

		if($t[0]["estado"] == "2"){
			return true;
		}else{
			return false;
		}
		
	}

	public function checkEditCM($comID){

		$sql = new sql();
		$id = $comID;
		
		$t = $sql->select("SELECT editado FROM comentarios WHERE id = :ID", array(
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
		$v = $this->selectComment("SELECT * FROM comentarios");
		return $v;
	}

	public function callSelectR(){
		$v = $this->selectComment("SELECT * FROM respostas");
		return $v;
	}

	//pra listar os comentários do usuário logado
	public function callCMUser(){
		$v = $this->selectComment("SELECT * FROM comentarios WHERE autor_original = :AUTOR_O", array(
			":AUTOR_O"=>$_SESSION['nome']
		));
		return $v;
	}


}

/*$t = new cmCRUD();
$v = $t->callSelectCM();
var_dump($v[0]["autor_original"]);
*/
?>









