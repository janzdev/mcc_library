<script>
<?php 
if(isset($_SESSION['message']))
{
  ?>
alertify.set('notifier', 'position', 'top-center');
alertify.success('<?= $_SESSION['message']; ?>');

// alertify.notify('', 'custom', 3, function() {
//      console.log('dismissed');
// });
<?php
unset($_SESSION['message']);
}
?>
</script>