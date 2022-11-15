<?php 
include('authentication.php');

// Borrower = Borrow

if (isset($_POST['borrow'])){
   
   $user_id =$_POST['user_id'];
   $book_id =$_POST['book_id'];
   $date_borrowed =$_POST['date_borrowed'];
   $due_date =$_POST['due_date'];
   
   $trapBookCount= mysqli_query($con,"SELECT count(*) as books_allowed from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed'");
   
   $countBorrowed = mysqli_fetch_assoc($trapBookCount);
   
   $bookCountQuery= mysqli_query($con,"SELECT count(*) as book_count from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed' and book_id = $book_id");
   
   $bookCount = mysqli_fetch_assoc($bookCountQuery);
   
   $allowed_book_query= mysqli_query($con,"select * from allowed_books order by allowed_book_id DESC ");
   $allowed = mysqli_fetch_assoc($allowed_book_query);
   
   if ($countBorrowed['books_allowed'] == $allowed['qntty_books']){
      echo "<script>alert(' ".$allowed['qntty_books']." ".'Books Allowed per User!'." '); window.location='borrow_book.php?student_id_number=".$student_id_number."'</script>";
   }elseif ($bookCount['book_count'] == 1){
      echo "<script>alert('Book Already Borrowed!'); window.location='borrow_book.php?student_id_number=".$student_id_number."'</script>";
   }else{
      
   $update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ");
   $copies_row= mysqli_fetch_assoc($update_copies);
   
   $book_copies = $copies_row['book_copies'];
   $new_book_copies = $book_copies - 1;
   
   if ($new_book_copies < 0){
      echo "<script>alert('Book out of Copy!'); window.location='borrow_book.php?student_id_number=".$student_id_number."'</script>";
   }elseif ($copies_row['status'] == 'Damaged'){
      echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?student_id_number=".$student_id_number."'</script>";
   }elseif ($copies_row['status'] == 'Lost'){
      echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?student_id_number=".$student_id_number."'</script>";
   }else{
      
   if ($new_book_copies == '0') {
      $remark = 'Not Available';
   } else {
      $remark = 'Available';
   }
   
   mysqli_query($con,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id' ");
   mysqli_query($con,"UPDATE book SET remarks = '$remark' where book_id = '$book_id' ");
   
   mysqli_query($con,"INSERT INTO borrow_book(user_id,book_id,date_borrowed,due_date,borrowed_status)
   VALUES('$user_id','$book_id','$date_borrowed','$due_date','borrowed')");
   
   // $report_history=mysqli_query($con,"select * from admin where admin_id = $id_session ");
   // $report_history_row=mysqli_fetch_array($report_history);
   // $admin_row=$report_history_row['firstname']." ".$report_history_row['middlename']." ".$report_history_row['lastname'];	
   
   // mysqli_query($con,"INSERT INTO report 
   // (book_id, user_id, admin_name, detail_action, date_transaction)
   // VALUES ('$book_id','$user_id','$admin_row','Borrowed Book',NOW())");
   
   }
   }
?>
<script>
window.location = "borrow_book.php?student_id_number=<?php echo $student_id_number ?>";
</script>
<?php	
}

// Borrower = Return
if (isset($_POST['return'])) {
   $user_id= $_POST['user_id'];
   $borrow_book_id= $_POST['borrow_book_id'];
   $book_id= $_POST['book_id'];
   $date_borrowed= $_POST['date_borrowed'];
   $due_date= $_POST['due_date'];
   $date_returned = $_POST['date_returned'];

   $update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ");
   $copies_row= mysqli_fetch_assoc($update_copies);
   
   $book_copies = $copies_row['book_copies'];
   $new_book_copies = $book_copies + 1;
   
   if ($new_book_copies == '0') {
      $remark = 'Not Available';
   } else {
      $remark = 'Available';
   }
   
   mysqli_query($con,"UPDATE book SET book_copies = '$new_book_copies' WHERE book_id = '$book_id'");
   mysqli_query($con,"UPDATE book SET remarks = '$remark' WHERE book_id = '$book_id' ");

   $timezone = "Asia/Manila";
   if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
   $cur_date = date("Y-m-d H:i:s");
   $date_returned_now = date("Y-m-d H:i:s");
   //$due_date = strtotime($cur_date);
   //$due_date = strtotime("+3 day", $due_date);
   //$due_date = date('F j, Y g:i a', $due_date);
   ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));			
   
   $penalty_amount_query= mysqli_query($con,"SELECT * FROM penalty ORDER BY penalty_id DESC ");
   $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
   
   if ($date_returned > $due_date) {
      $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
   } elseif ($date_returned < $due_date) {
      $penalty = 'No Penalty';
   } else {
      $penalty = 'No Penalty';
   }

   mysqli_query($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' AND user_id = '$user_id' AND book_id = '$book_id' ");
   
   mysqli_query($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
   values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')");
   
   // $report_history1=mysqli_query($con,"select * from admin where admin_id = $id_session ");
   // $report_history_row1=mysqli_fetch_array($report_history1);
   // $admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];	
   
   // mysqli_query($con,"INSERT INTO report 
   // (book_id, user_id, admin_name, detail_action, date_transaction)
   // VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())");
   
?>
<script>
window.location = "borrow_book.php?student_id_number=<?php echo $student_id_number ?>";
</script>
<?php 
                        }
?>

<?php



// Transaction
if(isset($_POST['submit']))
{ $student_id_number=$_POST['student_id_number'];
$query="SELECT * FROM user WHERE student_id_no='$student_id_number' " ;
$query_run=mysqli_query($con, $query);
$student=mysqli_fetch_array($query_run); if(mysqli_num_rows($query_run)> 0)
{
$student_id_number = $_POST['student_id_number'];
header("Location:borrow_book.php?student_id_number=$student_id_number");

}
else
{
$_SESSION['message_error'] = 'No Match found';
header("Location:transaction.php");
}
}


// Add Books
if(isset($_POST['add_book']))
{
$book_title = mysqli_real_escape_string($con, $_POST['book_title']);
$author = mysqli_real_escape_string($con, $_POST['author']);
$publisher_name = mysqli_real_escape_string($con, $_POST['publisher_name']);
$book_publication = mysqli_real_escape_string($con, $_POST['book_publication']);
$isbn = mysqli_real_escape_string($con, $_POST['isbn']);
$copyright_year = mysqli_real_escape_string($con, $_POST['copyright_year']);
$book_copies = mysqli_real_escape_string($con, $_POST['book_copies']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$category_id = mysqli_real_escape_string($con, $_POST['category_id']);
$book_image = $_FILES['book_image']['name'];

$allowed_extension = array('gif', 'jpg', 'png', 'jpeg' );
$filename = $_FILES['book_image']['name'];
$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

if($book_title == NULL || $author == NULL || $isbn == NULL || $book_copies == NULL || $status == NULL ||
$category_id ==
NULL)
{
$_SESSION['message_error'] = 'Please input all fields';
header("Location:books_add.php");
}
else
{


if(!in_array($file_extension, $allowed_extension) )
{
$_SESSION['message_error'] = '<small>You are allowed only jpg, jpeg, gif, and png images</small>';
header("Location:books_add.php");
}
else
{
if(file_exists("../uploads/books/". $_FILES['book_image']['name']))
{
$filename = $_FILES['book_image']['name'];
$_SESSION['message_error'] = "Image Already Exists ".$filename;
header("Location:books_add.php");
}
else
{
$pre = "MCC";
$mid = $_POST['new_barcode'];
$suf = "LMS";
$gen = $pre.$mid.$suf;

$query = "INSERT INTO barcode (pre_barcode, mid_barcode, suf_barcode) VALUES ('$pre', '$mid', '$suf')";
$query_run = mysqli_query($con, $query);

if($status == 'Lost')
{
$remark = 'Not Available';
}
elseif ($status == 'Damaged')
{
$remark = 'Not Available';
}
else
{
$remark = 'Available';
}

$query = "INSERT INTO book (book_barcode, book_title, author, publisher_name, book_publication, isbn,
copyright_year,
book_copies, status, category_id, book_image, remarks) VALUES ('$gen','$book_title', '$author', '$publisher_name',
'$book_publication', '$isbn', '$copyright_year', '$book_copies', '$status', '$category_id', '$book_image',
'$remark')";
$query_run = mysqli_query($con, $query);

if($query_run)
{
move_uploaded_file($_FILES['book_image']['tmp_name'], '../uploads/books/'.$_FILES['book_image']['name']);
$_SESSION['message_success'] = "Book Added Successfully";
header("Location:books.php");
}
else
{
$_SESSION['message_error'] = "Book not Added";
header("Location:books.php");
}
}

}
}
}

// Update Book
if(isset($_POST['update_book']))
{

$book_id = mysqli_real_escape_string($con, $_POST['book_id']);
$book_title = mysqli_real_escape_string($con, $_POST['book_title']);
$author = mysqli_real_escape_string($con, $_POST['author']);
$publisher_name = mysqli_real_escape_string($con, $_POST['publisher_name']);
$book_publication = mysqli_real_escape_string($con, $_POST['book_publication']);
$isbn = mysqli_real_escape_string($con, $_POST['isbn']);
$copyright_year = mysqli_real_escape_string($con, $_POST['copyright_year']);
$book_copies = mysqli_real_escape_string($con, $_POST['book_copies']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$category_id = mysqli_real_escape_string($con, $_POST['category_id']);

$new_image = mysqli_real_escape_string($con, $_FILES['book_image']['name']);
$old_image = mysqli_real_escape_string($con, $_POST['book_image_old']);

if($new_image != "")
{
$update_filename = $_FILES['book_image']['name'];
}
else
{
$update_filename = $old_image;
}

if(file_exists("../uploads/books/". $_FILES['book_image']['name']))
{
$filename = $_FILES['book_image']['name'];
$_SESSION['message_error'] = "Image Already Exists ".$filename;
header("Location: books.php");
}
else
{
$query = "UPDATE book SET book_title='$book_title', author='$author', publisher_name='$publisher_name',
book_publication
='$book_publication', isbn='$isbn', copyright_year='$copyright_year', book_copies='$book_copies', status='$status',
category_id= '$category_id', book_image='$update_filename' WHERE book_id = $book_id";
$query_run = mysqli_query($con, $query);

if($query_run)
{
if($_FILES['book_image']['name'] != '')
{
move_uploaded_file($_FILES['book_image']['tmp_name'], '../uploads/books/'.$_FILES['book_image']['name']);
unlink("../uploads/books/".$old_image);

$_SESSION['message_success'] = "Book Updated Successfully";
header("Location:books.php");
}
$_SESSION['message_success'] = "Updated Successfully";
header("Location: books.php");
}
else
{
$_SESSION['message_error'] = 'Update Failed';
header("Location: books.php");

}
}
}

// Delete Book
if(isset($_POST['delete_book']))
{
$id = $_POST['delete_id'];
$del = $_POST['delete_book_image'];

$query = "DELETE FROM book WHERE book_id='$id'";
$query_run = mysqli_query($con, $query);

if($query_run)
{
unlink("../uploads/books/".$book_image);
$_SESSION['message_success'] = "Book Deleted Successfully";
header("Location:books.php");
}
else
{
$_SESSION['message_error'] = "Book Not Deleted";
header("Location:books.php");
}
}


?>