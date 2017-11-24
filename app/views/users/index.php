<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php flash('user_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Users</h3>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URL_ROOT; ?>/users/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add User
            </a>
        </div>
    </div>
    <div class="card card-body mb-3">
        <div class="card-block">
            <div class="table">
                <table class="table table-sm table-condensed">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
<?php foreach($data['users'] as $user) : ?>
                    <tr>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><form action="<?php echo URL_ROOT; ?>/users/delete/<?php echo $user->id; ?>" method="post">
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- end div table-responsive -->
        </div>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>