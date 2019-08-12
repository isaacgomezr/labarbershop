<?php

 include "conn.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id_cita',
    1 => 'nombre', 
	2 => 'telefono',
	3 => 'correo',
    4 => 'fecha_cita',
	5 => 'hora_cita',
	6 => 'fecha_registro',
	7 => 'barbero'  
);


$sql = "SELECT id_cita, nombre, telefono, correo, fecha_cita, hora_cita, fecha_registro, barbero";
$sql.=" FROM citas";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id_cita, nombre, telefono, correo, fecha_cita, hora_cita, fecha_registro, barbero";
	$sql.=" FROM citas";
	$sql.=" WHERE nombre LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	// $sql.=" OR telefono LIKE '".$requestData['search']['value']."%' ";
	// $sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
    // $sql.=" OR direccion LIKE '".$requestData['search']['value']."%' ";
    // $sql.=" OR registrado LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	
	$sql = "SELECT id_cita, nombre, telefono, correo, fecha_cita, hora_cita, fecha_registro, barbero";
	$sql.=" FROM citas where fecha_cita = '".date("Y-m-d")."'";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id_cita"];
    $nestedData[] = $row["nombre"];
	$nestedData[] = $row["telefono"];
	$nestedData[] = $row["correo"];
	$nestedData[] = $row["fecha_cita"];
	$nestedData[] = $row["hora_cita"];
	$nestedData[] = date("d/m/Y", strtotime($row["fecha_registro"]));
	$nestedData[] = $row["barbero"];
    $nestedData[] = '<td><center>
                     <a href="editar.php?id_cita='.$row['id_cita'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="index.php?action=delete&id_cita='.$row['id_cita'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
				     </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>