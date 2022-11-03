<?php include('config/dbcon.php');

$output= array();
$sql = "SELECT * FROM book";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(

	
	0 => 'book_barcode',
	1 => 'book_title',
	2 => 'isbn',
	3 => 'author',
	4 => 'book_copies',
	5 => 'category_id',
	6 => 'status',
	
     
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE book_barcode like '%".$search_value."%'";
	$sql .= " OR book_title like '%".$search_value."%'";
	$sql .= " OR isbn like '%".$search_value."%'";
	$sql .= " OR author like '%".$search_value."%'";
	$sql .= " OR book_copies like '%".$search_value."%'";
	$sql .= " OR category_id like '%".$search_value."%'";
	$sql .= " OR status like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY book_id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	
	$sub_array[] = $row['book_barcode'];
	$sub_array[] = $row['book_title'];
	$sub_array[] = $row['isbn'];
	$sub_array[] = $row['author'];
	$sub_array[] = $row['book_copies'];
	$sub_array[] = $row['category_id'];
	$sub_array[] = $row['status'];
	$sub_array[] = '<div class="btn-group" style="background: #DFF6FF;  ">
     <!-- View Book Action-->
     <button type="button" value=""
          class="viewBookBtn btn btn-sm  border text-primary"
          data-bs-toggle="tooltip" data-bs-placement="bottom"
          title="View Book">
          <i class="bi bi-eye-fill"></i>
     </button>
     <!-- Edit Book Action-->
     <button type="button" value=""
          class="editBookBtn btn btn-sm  border text-success"
          data-bs-toggle="tooltip" data-bs-placement="bottom"
          title="Edit Book">
          <i class="bi bi-pencil-fill"></i>
     </button>
     <!-- Delete Book Action-->
     <button type="button" value=">"
          class="deleteBookBtn btn btn-sm  border text-danger"
          data-bs-toggle="tooltip" data-bs-placement="bottom"
          title="Delete Book">
          <i class="bi bi-trash-fill"></i>
     </button>
</div>';
	$data[] = $sub_array;
 
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>  $total_all_rows,
	'data'=>$data,
);
echo json_encode($output);