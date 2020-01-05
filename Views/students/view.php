<div class="row">
    <div class="col-md-12">
        <a href="index1.php?action=add" class="btn btn-success">Add New</a>
        <a href="index4.php?action=setpermission" class="btn btn-warning">Set Permission</a>
    </div>
</div>
<table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Class</th>
      <th scope="col">Sex</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
    if(isset($data['student_data'])){
      $id = 1;
        foreach ($data['student_data'] as $rows) {
  ?>
  <tbody>
    <tr>
      <td><?php echo $id;?></td>
      <td><?php echo $rows['firstname'];?></td>
      <td><?php echo  $rows['lastname'];?></td>
      <td><?php echo $rows['title'];?></td>
      <td><?php echo $rows['sex'];?></td>
      <td>
        <a href="index1.php?action=edit&id=<?php echo $rows['id'];?>"><i class="material-icons">edit</i></a>
        <a href="index1.php?action=delete&id=<?php echo $rows['id'];?>"><i class="material-icons" onclick="return confirm('Are you sure you want to delete?');">delete</i></a>
      </td>
    </tr>
  </tbody>
  <?php
        $id++;
        }
    }
  ?>
</table>