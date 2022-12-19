<?php 
	include_once "BaseController.php";

	class UserController{
		function getAll()
		{
			$usuario = new BaseController();
			$usuarios = array();
			$usuarios["items"] = array();

			$res = $usuario->ObtenerUsuarios();
			if($res->rowCount())
			{
				while($row = $res->fetch(PDO::FETCH_ASSOC))
				{
					$item = array(
						"id"=>$row["id_usuario"],
						"nombre"=>$row["nombre"],
						"apellido"=>$row["apellido"],
						"edad"=>$row["edad"],
						"foto"=>$row["foto"],
						"tipo_de_documento"=>$row["tipo_de_documento"]
					);
					array_push($usuarios["items"],$item);
				}
				//echo json_encode($usuarios);
				$this->printJson($usuarios);
			}
			else{
				//echo json_encode(array("mensaje"=>"No hay elementos registrados"));
				$this->error("No hay elementos registrados");
			}

		}
		function getById($id)
		{
			$usuario = new BaseController();
			$usuarios = array();
			$usuarios["items"] = array();

			$res = $usuario->ObtenerUsuario($id);
			if($res->rowCount() == 1)
			{
				$row = $res->fetch();
				$item = array(
					"id"=>$row["id_usuario"],
					"nombre"=>$row["nombre"],
					"apellido"=>$row["apellido"],
					"edad"=>$row["edad"],
					"foto"=>$row["foto"],
					"tipo_de_documento"=>$row["tipo_de_documento"]
				);
				array_push($usuarios["items"],$item);
				
				//echo json_encode($usuarios);
				$this->printJson($usuarios);
			}
			else{
				//echo json_encode(array("mensaje"=>"No hay elementos registrados"));
				$this->error("No hay elementos registrados");
			}
		}

		function CreateUser($nombre,$apellido,$edad,$foto,$tipo_de_documento)
		{
			$usuario = new BaseController();
			$usuarios = array();
			$usuarios["items"] = array();

			$res = $usuario->CrearUsuario($nombre,$apellido,$edad,$foto,$tipo_de_documento);
			if($res->rowCount() == 1)
			{
				$row = $res->fetch();
				$item = array(
					"id"=>$row["id_usuario"],
					"nombre"=>$row["nombre"],
					"apellido"=>$row["apellido"],
					"edad"=>$row["edad"],
					"foto"=>$row["foto"],
					"tipo_de_documento"=>$row["tipo_de_documento"]
				);
				array_push($usuarios["items"],$item);
				
				//echo json_encode($usuarios);
				$this->printJson($usuarios);
			}
			else{
				//echo json_encode(array("mensaje"=>"No hay elementos registrados"));
				$this->error("No hay elementos registrados");
			}
		
		}
		function UpdateById($id,$colToUpdate,$varToUpdate)
		{
			$usuario = new BaseController();
			$usuarios = array();
			$usuarios["items"] = array();

			$res = $usuario->ActualizarUsuarioByID($id,$colToUpdate,$varToUpdate);
		}
		function DelById($id)
		{
			$ids = $_GET['id'];
			print_r($ids);
			$usuario = new BaseController();
			$usuarios = array();
			$usuarios["items"] = array();

			$res = $usuario->BorrarUsuarioById($id);
		}




		function printJson($array)
		{
			echo "<code>".json_encode($array)."</code>";
		}

		function error($mensaje)
		{
			echo "<code>".json_encode(array("mensaje"=>$mensaje))."</code>";
		}

		
	}
?>