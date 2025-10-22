<?php
include('header.php');
if(isset($_GET['id'])){

    $id=$_GET['id'];
}
if(isset($_POST['delete'])){

    extract($_POST);
    $q=mysqli_query($con,"delete  from tbl_show_time where st_id='$f'");
    if($q){

        $q1=mysqli_query($con,"delete  from tbl_shows where st_id='$f'");
        if($q1){
            ?>
             <script>
                alert("Deleted");
                window.location.href="add_theatre_2.php";
                </script>
            <?php
        }
    }
}
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder;      
  ?> 
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Show Times
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Delete</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <form method="post" action="#">
      <div class="box">
        <div class="box-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group col-md-6">
                <label class="control-label">Select Show Time</label>
                <select class="form-control" required name="f">
                  <option value="0">Select Show Time</option>
                  <?php
                  $q=mysqli_query($con,"select  * from tbl_show_time where screen_id='$id'");
                  while($th=mysqli_fetch_array($q))
                  {
                    ?>
                    <option value="<?php echo $th['st_id'];?>"><?php echo date('h:i A',strtotime($th['start_time']));?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6">
              <i class="fa fa-trash"></i>  <input type="submit" value="delete" name="delete" class="btn btn-sm btn-danger">
                  
              </div>
             
              
            </div>
          </div>
          <div id="disp"></div>
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
                </form>
    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script>
  
</script>