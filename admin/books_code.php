<?php
include('authentication.php');



// Delete Admin
if(isset($_POST['delete_book']))
{
     $book_id = mysqli_real_escape_string($con, $_POST['delete_book']);

     $query = "DELETE FROM book WHERE book_id ='$book_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Book deleted successfully';
          header("Location: books.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Book not deleted';
          header("Location: books.php");
          exit(0);
     }
}

// Update Book
if(isset($_POST['update_book']))
{
     $book_id =mysqli_real_escape_string($con, $_POST['book_id']);

     $call_number = mysqli_real_escape_string($con, $_POST['call_number']);
     $accessial_number = mysqli_real_escape_string($con, $_POST['accessial_number']);
     $title = mysqli_real_escape_string($con, $_POST['title']);
     $author = mysqli_real_escape_string($con, $_POST['author']);
     $copyright_date = mysqli_real_escape_string($con, $_POST['copyright_date']);
     $publisher = mysqli_real_escape_string($con, $_POST['publisher']);
     $copy = mysqli_real_escape_string($con, $_POST['copy']);
     $barcode = mysqli_real_escape_string($con, $_POST['barcode']);

     $query = "UPDATE book SET call_number='$call_number', accessial_number='$accessial_number', title='$title', author='$author', copyright_date='$copyright_date', publisher='$publisher', copy='$copy', barcode='$barcode' WHERE book_id = '$book_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Book updated successfully';
          header("Location: books.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Book not updated';
          header("Location: books.php");
          exit(0);
     }
     
}

// Add Book
if(isset($_POST['add_book']))
{
     $call_number = mysqli_real_escape_string($con, $_POST['call_number']);
     $accessial_number = mysqli_real_escape_string($con, $_POST['accessial_number']);
     $title = mysqli_real_escape_string($con, $_POST['title']);
     $author = mysqli_real_escape_string($con, $_POST['author']);
     $copyright_date = mysqli_real_escape_string($con, $_POST['copyright_date']);
     $publisher = mysqli_real_escape_string($con, $_POST['publisher']);
     $copy = mysqli_real_escape_string($con, $_POST['copy']);
    

     $pre = "MCC";
     $mid = $_POST['new_barcode'];
     $suf = "LRC";
     $gen = $pre.$mid.$suf;

     $query = "INSERT INTO book (call_number, accessial_number, title, author, copyright_date, publisher, copy, barcode, date_added) VALUES ('$call_number', '$accessial_number', '$title', '$author', '$copyright_date', '$publisher', '$copy', '$gen', NOW())";
     $query_run = mysqli_query($con, $query);

     mysqli_query($con,"insert into barcode (pre_barcode,mid_barcode,suf_barcode) values ('$pre', '$mid', '$suf') ") or die (mysqli_error());

     if($query_run)
     {
          $_SESSION['message_success'] = 'Book Added successfully';
          header("Location: books.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Book not Added';
          header("Location: books.php");
          exit(0);
     }
     
}
?>