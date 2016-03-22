<?php

class Up_xml_model extends CI_Model {

	public function __construct() {
 		parent::__construct();
		$this->load->model('Up_xml_model','up_xml_model');

}

public function query_iduuid() {

 	$consulta = $this->db->query(" SELECT id_uuid FROM concepto; ");
	foreach ($consulta->result_array() as $row) {
		echo $row->id_uuid;
	}
		return($row);

}

public function insert_concepto($datos_concepto, $cont) {

	for ($i=0; $i<$cont; $i++){

		$this->db->set('id_uuid', $datos_concepto['id_uuid']);
		$this->db->set('cantidad', $datos_concepto['cantidad'][$i]);
		$this->db->set('descrip', $datos_concepto['descrip'][$i]);
		$this->db->set('val_unit',$datos_concepto['val_unit'][$i]);
		$this->db->set('unidad', $datos_concepto['unidad'][$i]);
		$this->db->insert('concepto');
	}

}

public function query_idrfc() {

	$consulta = $this->db->query( " SELECT id_rfc FROM proveedor; ");
 	foreach ($consulta->result_array() as $row) {
		echo $row->id_rfc;
	}
		return($row);

}

public function query_idproductos() {

	$consulta=$this->db->query(" SELECT id_productos FROM productos; ");
	$d_ant=$this->db->insert_id($consulta);
	$d_antmas1=$d_ant+1;
  	$this->db->delete('productos', array('id_productos' => $d_antmas1));
  	return($d_ant);
	exit();

}

public function proveedor_data_insert($id_rfc, $rfc_nom, $calle, $no_ext, $no_int, $colonia, $referen, $mun, $estado, $pais, $cp) {

	$datos_proveedor=array(
						'id_rfc' => $id_rfc,
						'rfc_nom' => $rfc_nom,
						'calle' =>	$calle,
						'no_ext' =>	$no_ext,
						'no_int' =>	$no_int,
						'colonia' =>	$colonia,
						'referen' =>	$referen,
						'mun' =>	$mun,
						'estado' =>	$estado,
						'pais' =>	$pais,
						'cp' =>	$cp
						);

 		$this->db->insert('proveedor', $datos_proveedor);

}

public function factura_data_insert($id_uuid, $fecha, $subtotal, $moneda, $total, $id_rfc) {

	$datos_factura=array(
						'id_uuid'	=> $id_uuid,
						'fecha' => $fecha,
						'subtotal' => $subtotal,
						'moneda' => $moneda,
						'total' => $total,
						'id_rfc' => 	$id_rfc
						);

	$this->db->insert('factura',$datos_factura);

}

public function insert_in($noserie, $elementos) {

	for ($k=0; $k<$elementos; $k++){
		$this->db->set('noserie',$noserie[$k]);
		$var=$this->db->insert('productos');
	}

}

public function id_c_c_concepto(){

	$consultar_concepto = $this->db->query(" SELECT id_concepto, cantidad FROM concepto; ");
	foreach ($consultar_concepto->result() as $value){
		$dato_de_idconcepto_concepto[]=$value->id_concepto;
		$dato_de_cantidad_concepto[]=$value->cantidad;
		$contando_split=count($dato_de_idconcepto_concepto);
		}

			$d_1['dato_de_idconcepto_concepto']=$dato_de_idconcepto_concepto;
			$d_1['dato_de_cantidad_concepto']=$dato_de_cantidad_concepto;
			$d_1['contando_split']=$contando_split;
			return($d_1);

}

public function id_c_p_productos(){

	$consultar_productos = $this->db->query(" SELECT id_productos, id_concepto FROM productos; ");
	foreach ($consultar_productos->result() as $value){
		$dato_de_id_productos[]=$value->id_productos;
		$dato_de_idconcepto_productos[]=$value->id_concepto;
	}

			$d_ant_productos=$this->db->insert_id($dato_de_id_productos);
			$d_2['dato_de_id_productos']=$dato_de_id_productos;
			$d_2['dato_de_idconcepto_productos']=$dato_de_idconcepto_productos;
			$d_2['d_ant_productos']=$d_ant_productos;
			return($d_2);

}

public function update_productos($d_ant_productos, $n_id_concepto, $dato_de_id_productos){

	for ($u=0; $u <$d_ant_productos; $u++) {
		$this->db->set('id_concepto', $n_id_concepto[$u]);
		$this->db->where('id_productos', $dato_de_id_productos[$u]);
		$this->db->update('productos', $id_productos);
	}

}

public function con_noserie_productos(){

	$vacio = $this->db->query(" SELECT noserie FROM productos; ");
	return($vacio);

}

public function id_productos_productos(){

	$this->db->query(" SELECT id_productos FROM productos; ");
	$d_ant2=$this->db->insert_id($id_prod_prod);
		for ($a=0; $a<$elementos; $a++) {
   			$this->db->delete('productos', array('id_productos' => $d_ant2));
   			$d_ant2--;
	  	}
			return($d_ant2);

}

public function q_del_elemento(){

	$rs = $this->db->query("SELECT MAX(id_concepto) AS id FROM concepto");
	return($rs);

}

public function del_elem($c){

	foreach ($c as $key => $value) {
		$this->db->where('id_concepto', $value);
		$this->db->delete('concepto');
	}

}


} // Fin de Class
