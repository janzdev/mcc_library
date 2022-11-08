<?php
include('authentication.php');

//Validate School Id Number
if(isset($_POST['submit']))
{
   $student_number = $_POST['student_id_number'];

   $query = "SELECT * FROM user WHERE student_id_no ='$student_number'";
   $query_run = mysqli_query($con, $query);
   

   if(mysqli_num_rows($query_run) > 0)
   {
      $user_row = mysqli_fetch_array($query_run);

      $_SESSION['message'] = 'Successfully Match ID Number';
      header("Location: borrow_book.php?school_number='.$student_number.'");
      exit(0);
   }
   else
   {
      $_SESSION['message'] = "No match found for Studenr ID Number ";
      header("Location: transaction.php");
   }
}

// Add book
if(isset($_POST['addbook']))
{
    
     $book_title = ($_POST['book_title']);
     $category_id = ($_POST['category_id']);
     $author = ($_POST['author']);
     $author_2 = ($_POST['author_2']);
     $author_3 = ($_POST['author_3']);
     $author_4 = ($_POST['author_4']);
     $author_5 = ($_POST['author_5']);
     $book_copies = ($_POST['book_copies']);
     $book_publication = ($_POST['book_publication']);
     $publisher_name = ($_POST['publisher_name']);
     $isbn = ($_POST['isbn']);
     $copyright_year = ($_POST['copyright_year']);
     $status = ($_POST['status']);
     
    
   //   $book_image = mysqli_real_escape_string($con, $_POST['book_image']);

   //   if($book_title == NULL || $category_id == NULL || $author == NULL ||  $book_copies == NULL || $book_publication == NULL ||  $publisher_name == NULL ||   $isbn == NULL || $copyright_year == NULL ||  $status == NULL ) 
   //  {
   //     $res = [
   //        'status' => 422,
   //        'message' => 'Please fill all the fields'
   //     ];
   //     echo json_encode($res);
   //     return false;
   //  }
         $pre = "MCC";
         $mid = $_POST['new_barcode'];
         $suf = "LMS";
         $gen = $pre.$mid.$suf;


         if ($status == 'Lost') {
            $remark = 'Not Available';
         } elseif ($status == 'Damaged') {
            $remark = 'Not Available';
         } else {
            $remark = 'Available'; 
         }

         $image = $_FILES['book_image']['name'];
         // Rename Image
         $image_extension = pathinfo($image, PATHINFO_EXTENSION);
         $filename = time().'.'.$image_extension;

         
    $query = "INSERT INTO book (book_image, book_title, book_barcode, category_id, author, author_2, author_3, author_4, author_5, book_copies, status, book_publication, publisher_name, isbn, copyright_year,  remarks) VALUES('$filename','$book_title', '$gen', '$category_id',  '$author', '$author_2', '$author_3', '$author_4', '$author_5', '$book_copies', '$status', '$book_publication', '$publisher_name', '$isbn', '$copyright_year', '$remark')";
    $query_run= mysqli_query($con, $query);

    
   
    if($query_run)
    {
      move_uploaded_file($_FILES['book_image']['tmp_name'], '../uploads/books'.$filename);
      echo "<script>
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('Book Added Successfully');
           </script>";
         header('Location: books2.php');
    }
    else
    {
      echo "<script>
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('Book not Added');
           </script>";
         header('Location: books2.php');
    }

   $query = "INSERT INTO barcode (pre_barcode, mid_barcode, suf_barcode) VALUES ('$pre','$mid', '$suf')";
   $query_run= mysqli_query($con, $query);
   

   }

// Delete Book
if(isset($_POST['delete_id']))
{
   $id = $_POST['delete_id'];
    $query = "DELETE FROM book WHERE book_id='$id'";
    $query_run= mysqli_query($con, $query);
    if($query_run)
    {
      echo "<script>alertify.success('Book Deleted Successfully');</script>";
      header("Location: books2.php");
    }
    else
    {
      echo "<script>alertify.error('Book not Deleted');</script>";
      header("Location: books2.php");
    }
}






   // Add book
// if(isset($_POST['save_book']))
// {
//      $book_title = mysqli_real_escape_string($con, $_POST['book_title']);
//      $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
//      $author = mysqli_real_escape_string($con, $_POST['author']);
//      $author_2 = mysqli_real_escape_string($con, $_POST['author_2']);
//      $author_3 = mysqli_real_escape_string($con, $_POST['author_3']);
//      $author_4 = mysqli_real_escape_string($con, $_POST['author_4']);
//      $author_5 = mysqli_real_escape_string($con, $_POST['author_5']);
//      $book_copies = mysqli_real_escape_string($con, $_POST['book_copies']);
//      $book_publication = mysqli_real_escape_string($con, $_POST['book_publication']);
//      $publisher_name = mysqli_real_escape_string($con, $_POST['publisher_name']);
//      $isbn = mysqli_real_escape_string($con, $_POST['isbn']);
//      $copyright_year = mysqli_real_escape_string($con, $_POST['copyright_year']);
//      $status = mysqli_real_escape_string($con, $_POST['status']);
//    //   $book_image = mysqli_real_escape_string($con, $_POST['book_image']);

//      if($book_title == NULL || $category_id == NULL || $author == NULL ||  $book_copies == NULL || $book_publication == NULL ||  $publisher_name == NULL ||   $isbn == NULL || $copyright_year == NULL ||  $status == NULL ) 
//     {
//        $res = [
//           'status' => 422,
//           'message' => 'Please fill all the fields'
//        ];
//        echo json_encode($res);
//        return false;
//     }
//          if ($status == 'Lost') {
//             $remark = 'Not Available';
//          } elseif ($status == 'Damaged') {
//             $remark = 'Not Available';
//          } else {
//             $remark = 'Available'; 
//          }
//     $query = "INSERT INTO book (book_title, category_id, author,author_2, author_3, author_4, author_5, book_copies, status, book_publication, publisher_name, isbn, copyright_year, remarks) VALUES('$book_title', '$category_id',  '$author', '$author_2', '$author_3', '$author_4', '$author_5', '$book_copies', '$status', '$book_publication', '$publisher_name', '$isbn','$copyright_year', '$remark' )";
//     $query_run= mysqli_query($con, $query);
   
//     if($query_run)
//     {
//       $res = [
//          'status' => 200,
//          'message' => 'Book Added Successfully'
//       ];
//       echo json_encode($res);
//       return false;
//     }
//     else
//     {
//       $res = [
//          'status' => 500,
//          'message' => 'Book not Added'
//       ];
//       echo json_encode($res);
//       return false;
//     }
// }

// // Edit Book
// if(isset($_GET['book_id']))
// {
//    $book_id = mysqli_real_escape_string($con, $_GET['book_id']);

//     $query = "SELECT * FROM book WHERE book_id='$book_id'";
//     $query_run= mysqli_query($con, $query);

//     if(mysqli_num_rows($query_run) == 1)
//     {
//       $book = mysqli_fetch_array($query_run);
        
//       $res = [
//          'status' => 200,
//          'message' => 'Book fetched successfully',
//          'data' => $book
//       ];
//       echo json_encode($res);
//       return false;
//     }
//     else
//     {
//       $res = [
//          'status' => 404,
//          'message' => 'Book Id Not Found'
//       ];
//       echo json_encode($res);
//       return false;
//     }
// }

// // Update Book
// if(isset($_POST['update_book']))
// {
     
//      $book_id = mysqli_real_escape_string($con, $_POST['book_id']);

//      $book_title = mysqli_real_escape_string($con, $_POST['book_title']);
//      $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
//      $author = mysqli_real_escape_string($con, $_POST['author']);
//      $author_2 = mysqli_real_escape_string($con, $_POST['author_2']);
//      $author_3 = mysqli_real_escape_string($con, $_POST['author_3']);
//      $author_4 = mysqli_real_escape_string($con, $_POST['author_4']);
//      $author_5 = mysqli_real_escape_string($con, $_POST['author_5']);
//      $book_copies = mysqli_real_escape_string($con, $_POST['book_copies']);
//      $book_publication = mysqli_real_escape_string($con, $_POST['book_publication']);
//      $publisher_name = mysqli_real_escape_string($con, $_POST['publisher_name']);
//      $isbn = mysqli_real_escape_string($con, $_POST['isbn']);
//      $copyright_year = mysqli_real_escape_string($con, $_POST['copyright_year']);
//      $status = mysqli_real_escape_string($con, $_POST['status']);
//      $book_barcode = mysqli_real_escape_string($con, $_POST['book_barcode']);
//    //   $book_image = mysqli_real_escape_string($con, $_POST['book_image']);

//      if($book_title == NULL || $category_id == NULL || $author == NULL ||  $book_copies == NULL || $book_publication == NULL ||  $publisher_name == NULL ||   $isbn == NULL || $copyright_year == NULL ||  $status == NULL ||  $book_barcode == NULL) 

//     {
//        $res = [
//           'status' => 422,
//           'message' => 'Please fill all the fields'
//        ];
//        echo json_encode($res);
//        return false;
//     }
    
  
//     $query = "UPDATE book SET book_title = '$book_title', category_id = '$category_id',
//               author ='$author', author_2 = '$author_2', author_3 = '$author_3', author_4 = '$author_4', author_5 = '$author_5' , book_copies = '$book_copies', book_publication = '$book_publication', publisher_name = '$publisher_name', isbn = '$isbn', copyright_year = '$copyright_year', book_barcode = '$book_barcode' WHERE book_id = '$book_id'";
//     $query_run= mysqli_query($con, $query);
   
//     if($query_run)
//     {
//       $res = [
//          'status' => 200,
//          'message' => 'Book Updated Successfully'
//       ];
//       echo json_encode($res);
//       return false;
//     }
//     else
//     {
//       $res = [
//          'status' => 500,
//          'message' => 'Book not Updated'
//       ];
//       echo json_encode($res);
//       return false;
//     }
// }


// // Delete Book
// if(isset($_POST['delete_book']));
// {
//    $book_id = mysqli_real_escape_string($con, $_POST['book_id']);

//    $query = "DELETE FROM book WHERE book_id='$book_id'";
//    $query_run= mysqli_query($con, $query);

//    if($query_run)
//     {
      
//       $res = [
//          'status' => 200,
//          'message' => 'Book Deleted  Successfully'
//       ];
      
//       echo json_encode($res);
//       return false;
//     }
//     else
//     {
//       $res = [
//          'status' => 500,
//          'message' => 'Book not Created'
//       ];
//       echo json_encode($res);
//       return false;
//     }
// }



?>