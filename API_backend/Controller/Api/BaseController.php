<?php 
	include_once __DIR__."/../../Model/db.php";

	class BaseController extends DB
	{
		
		function ObtenerUsuarios()
		{
			$query = $this -> connect() -> query("SELECT * FROM `usuarios`");
			return $query;
		}
		function ObtenerUsuario($id)
		{
			$query = $this->connect()->prepare("SELECT * FROM `usuarios` WHERE `id_usuario` = :id");
			$query->execute(["id"=>$id]);

			return $query;
		}
		function CrearUsuario($nombre,$apellido,$edad,$foto,$tipo_de_documento){
			$query = $this->connect()->prepare("INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `edad`, `foto`, `tipo_de_documento`) VALUES (NULL, :nombre, :apellido, :edad, :foto, :tipo_de_documento)");
			$query->execute(["nombre"=>$nombre,"apellido"=>$apellido,"edad"=>$edad,"foto"=>$foto,"tipo_de_documento"=>$tipo_de_documento]);
			return $query;
		}
		function ActualizarUsuarioByID($id,$colToUpdate,$varToUpdate)
		{
			$query = $this->connect()->prepare("UPDATE `usuarios` SET `".$colToUpdate."` = :varToUpdate WHERE `usuarios`.`id_usuario` = :id");
			$query->execute(["id"=>$id,"varToUpdate"=>$varToUpdate]);
			return $query;
		}	
		function BorrarUsuarioById($id)
		{
			$query = $this->connect()->prepare("DELETE FROM usuarios WHERE `usuarios`.`id_usuario` = :id");
			$query->execute(["id"=>$id]);
			return $query;
		}
	}
?>