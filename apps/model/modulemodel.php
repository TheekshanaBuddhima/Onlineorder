<?php
	class modulemodel{

		function getUserModules($role_id, $con){
			$sql = "SELECT * FROM module m, module_role mr WHERE m.m_id = mr.m_id AND mr.role_id = \"$role_id\"";
			$r = $con->query($sql);
			return $r;
		}
	}

?>