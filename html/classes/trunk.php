<?php

namespace Telecube;


class Trunk{

	function list_trunks(){
		global $Db, $dbPDO;
		$q = "select * from trunks;";
		$trunks = $Db->query($q,array(),$dbPDO);
		return $trunks;
	}

	function is_active($id, $bool=false){
		global $Db, $dbPDO;
		$q = "select active from trunks where id = ?;";
		$trunk = $Db->query($q,array($id),$dbPDO);
		if($bool){
			return empty($trunk[0]['active']) || $trunk[0]['active'] == "no" ? false : true;
		}else{
			return empty($trunk[0]['active']) ? "no" : $trunk[0]['active'];
		}
	}

	function is_registered($id){
		global $Db, $dbPDO;
		$q = "select register_status from trunks where id = ?;";
		$trunk = $Db->query($q,array($id),$dbPDO);
		return $trunk[0]['register_status'] == "Registered" ? true : false;
	}

	function get_def_inbound_type($id){
		global $Db, $dbPDO;
		$q = "select def_inbound_type from trunks where id = ?;";
		$trunk = $Db->query($q,array($id),$dbPDO);
		return $trunk[0]['def_inbound_type'];
	}

	function get_def_inbound_id($id){
		global $Db, $dbPDO;
		$q = "select def_inbound_id from trunks where id = ?;";
		$trunk = $Db->query($q,array($id),$dbPDO);
		return $trunk[0]['def_inbound_id'];
	}
}
?>