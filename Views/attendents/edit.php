<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">
                    <h2>Attendants Edit</h2>
                </div>
                <?php
                if(isset($data['attendents_data'])){
                  foreach ($data['attendents_data'] as $row) {
                  ?>
                <form action="index4.php?action=edit_form&id=<?php echo $row['id'];?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" name="fname" id="fname" value="<?php echo $row['firstname']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" name="lname" id="lname" value="<?php echo $row['lastname']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sex">Gender:</label><br>
                            <input type="radio" <?php if($row['sex']=="Male"){?> checked ="checked" <?php } ?> name="sex" value="Male">Male <br>
                            <input type="radio" <?php if($row['sex']=="Female"){?> checked ="checked" <?php } ?> name="sex" value="Female">Female
                        </div>
                        <div class="form-group">
                            <label for="class">Class:</label>
                            <select name="class" id="class" class="form-control">
                            <?php
                            foreach ($data['class_data'] as $rows) { ?>
                                <option <?php if($row['title']== $rows['title']){?> selected="selected"<?php }?> value="<?php echo $rows['id']; ?>"><?php echo $rows['title']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subjects:</label>
                            <select name="subjects[]" class="form-control" multiple>
                                <?php
                                foreach ($data['subject_data'] as $rows){
                                ?>
                                    <option value="<?php echo $rows['id'];?>"><?php echo $rows['sub_title']; ?></option>
                                <?php
                                }
                            }
                                ?>
                            </select>
                        </div>
                        <!-- permission -->
                        <div class="form-group">
                            <select class="form-control" name="permissions">
                                     <option value="0" disabled selected>Permission:</option>
                                    <option value="<?php echo $row['permission'] ?>">Yes</option>
                                   
                            </select>
                        </div>
                        <!-- description -->
                        <div class="form-group">
                            <label for="">description:</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"><?php echo $row['description']?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="index4.php?action=view" class="btn btn-success">Go Back</a>
                        <input type="submit" name="edite" value="Submit" class="btn btn-primary float-right">
                    </div>
                </form>
                <?php
                  }
                ?>
            </div>
        </div>
    </div>
</div>