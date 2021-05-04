<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
<?php require_once 'process.php'; ?>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="process.php" method="POST">
                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Role</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body" id="modal-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" id="role" name="role" class="form-control" value="<?php echo $role; ?>" placeholder="Enter Role">
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $gender; ?>" placeholder="Enter Gender">
                                </div>

                                <div class="form-group">
                                    <label>Show</label>
                                    <input type="text" id="showcolumn" name="showcolumn" class="form-control" value="<?php echo $showcolumn; ?>" placeholder="Enter Show">
                                </div>

                                <div class="form-group">
                                    <label>Actor</label>
                                    <input type="text" id="actor" name="actor" class="form-control" value="<?php echo $actor; ?>" placeholder="Enter Actor">
                                </div>

                                <div class="form-group">
                                    <label>Backup</label>
                                    <input type="text" id="backup" name="backup" class="form-control" value="<?php echo $backup; ?>" placeholder="Enter Backup">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <?php if ($update != true) : ?>
                                    <button type="submit" class="btn btn-info" name="update">Update</button>
                                <?php else : ?>
                                    <input type="submit" id="add-role-btn" class="btn btn-success" name="save" value="Save">
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>