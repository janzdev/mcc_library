<?php
include('authentication.php');



// Delete Book
if(isset($_POST['delete_book']))
{
     $book_id = mysqli_real_escape_string($con, $_POST['delete_book']);

     $query = "DELETE FROM web_opac WHERE web_opac_id ='$book_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Book deleted successfully';
          header("Location: web_opac.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Book not deleted';
          header("Location: web_opac.php");
          exit(0);
     }
}

// Update Book
if(isset($_POST['update_book']))
{
     $book_id =mysqli_real_escape_string($con, $_POST['web_opac_id']);

     $opac_image = mysqli_real_escape_string($con, $_POST['opac_image']);
     $opac_title = mysqli_real_escape_string($con, $_POST['opac_title']);
     $author = mysqli_real_escape_string($con, $_POST['author']);
     $copyright_date = mysqli_real_escape_string($con, $_POST['copyright_date']);
     $publisher = mysqli_real_escape_string($con, $_POST['publisher']);
    

     $query = "UPDATE web_opac SET opac_image='$opac_image', title='$opac_title',  author='$author', copyright_date='$copyright_date', publisher='$publisher' WHERE web_opac_id = '$book_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Book updated successfully';
          header("Location: web_opac.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Book not updated';
          header("Location: web_opac.php");
          exit(0);
     }
     
}

// Add Book
if(isset($_POST['add_book']))
{
     $opac_image = mysqli_real_escape_string($con, $_POST['opac_image']);
     $title = mysqli_real_escape_string($con, $_POST['title']);
     $author = mysqli_real_escape_string($con, $_POST['author']);
     $copyright_date = mysqli_real_escape_string($con, $_POST['copyright_date']);
     $publisher = mysqli_real_escape_string($con, $_POST['publisher']);
     
    

     $query = "INSERT INTO web_opac (opac_image, title, author, copyright_date, publisher, added_at) VALUES (' $opac_image', ' $title', '$author', '$copyright_date', '$publisher',  NOW())";
     $query_run = mysqli_query($con, $query);

    
     if($query_run)
     {
          $_SESSION['message_success'] = 'Book Added successfully';
          header("Location: web_opac.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Book not Added';
          header("Location: web_opac.php");
          exit(0);
     }
     
}
?>