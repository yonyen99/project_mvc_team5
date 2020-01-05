<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-center text-white">
                <h2>Student Information Form</h2>
            </div>
            <?php
            if(isset($data['student_data'])){
                foreach($data['student_data'] as $rows){
            ?>
            <form action="index1.php?action=edit_data&id=<?php echo $rows['id']; ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $rows['firstname'];?>">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $rows['lastname'];?>">
                    </div>
                    <div class="form-group">
                        <label for="sex">Gender:</label><br>
                        <input type="radio" <?php if($rows['sex']=="Male"){?> checked ="checked" <?php } ?> name="sex" value="Male">Male <br>
                        <input type="radio" <?php if($rows['sex']=="Female"){?> checked ="checked" <?php } ?> name="sex" value="Female">Female
                    </div>

                    <div class="form-group">
                        <label for="class">Class:</label>
                        <select name="class" id="class" class="form-control">
                            <?php
                            foreach ($data['class_data'] as $row) { ?>
                                <option <?php if($rows['title']== $row['title']){?> selected="selected"<?php }?> value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="index1.php?action=view" class="btn btn-success">Go Back</a>
                    <input type="submit" name="create" value="Submit" class="btn btn-primary float-right">
                </div>
            </form>
            <?php
                }
            }
            ?>
        </div>
        </div>
    </div>
</div>