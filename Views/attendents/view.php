
<div class="row">
    <div class="col-md-12">
    </div>
</div>
<table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FullName</th>
      <th scope="col">Sex</th>
      <th scope="col">Class</th>
      <th scope="col">Subject</th>
      <th scope="col">Permission</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
    if(isset($data['attendents_data'])){
      $id = 1;
        foreach ($data['attendents_data'] as $rows) {
  ?>
  <tbody>
    <tr>
      <td><?php echo $id;?></td>
      <td><?php echo $rows['firstname']." ".$rows['lastname'];?></td>
      <td><?php echo $rows['sex'];?></td>
      <td><?php echo $rows['title'];?></td>
      <td><?php echo implode(", ",$rows['sub_title']);?></td>
      <td><?php echo $rows['permission'];?></td>
      <td><?php echo $rows['description'];?></td>
      <td>
        <a href="index1.php?action=edit&id=<?php echo $rows['id'];?>"><i class="material-icons">edit</i></a>
        <a href="index4.php?action=delete&id=<?php echo $rows['id'];?>"><i class="material-icons" onclick="return confirm('Are you sure you want to delete?');">delete</i></a>
      </td>
    </tr>
  </tbody>
  <?php
        $id++;
        }
    }
  ?>
</table>