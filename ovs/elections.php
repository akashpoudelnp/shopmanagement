<?php require("db.php"); ?>
<?php
require("header.php");
$title="Home";
?>
<?php

$sql2=$conn->query("SELECT * FROM `election`");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">

                <div class="col-sm-6">
                         <h2 class="m-0 text-dark">
                         </h2> 
                </div><!-- /.col -->

            </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
       <!--Content GOes here -->
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Elections</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>

    
            <tr>
                <th style="width: 1%">
                 #
                </th>
                <th style="width: 20%">
                    Election Title
                </th>
                <th style="width: 30%">
                    Candidates
                </th>
                <th style="width: 10%">
                </th>
                <th>
                   Current Status
                </th>
               
               
            </tr>
        
        </thead>
        <tbody>
        <?php
        $counter="0";
        while($etable=$sql2->fetch_assoc()){
                $counter=$counter+1;
        ?>
            <tr>
                <td>
                <?php echo $counter;  ?>
                </td>
                <td>
                    <a>
               <b>     <?php echo $etable['etitle'];  ?>    </b>
                    </a>
                    <br>
                    <small>
                    <?php echo $etable['edesc'];  ?>
                    </small>
                </td>
                <td>
                    <ul class="list-inline">
               <?php
               $elid=$etable['eid'];
               $sql3=$conn->query("Select * from `candidate` where eid='$elid' ");
               while($canav=$sql3->fetch_assoc()){?>
                        <li class="list-inline-item">
                      <a title="<?php  echo $canav['cname']; ?>">  <img alt="Avatar" class="table-avatar" src="<?php  echo $canav['cphoto']; ?>"> </a> 
                        </li>

               <?php  } ?>
                    </ul>
                </td>
                <td class="project_progress">
                    
                </td>
                <td class="project-state">
                    
                    <?php 
                    if($etable['estatus']!=0){
                       ?>
<span class="badge badge-success">Running</span>

                       <?php
                    }else{
                    
                    ?>
<span class="badge badge-danger">Not Running</span>
                    <?php   } ?>
                </td>
                <td class="project-actions text-right">
                    
                    <a class="btn btn-danger btn-sm" href="vote.php?election=<?php echo $etable['eid']; ?>">
                        <i class="fas fa-poll-alt">
                        </i>
                        Vote
                    </a>
                </td>
        </tr>
        <?php  } ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<?php
require("footer.php");
?>