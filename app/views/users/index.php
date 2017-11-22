<?php require APP_ROOT . '/views/inc/header.php' ?>
    <div class="card card-body mb-3">
        <div class="card-block">
            <h4 class="card-title">Users</h4>
            <div class="table">
                <table class="table table-sm table-condensed">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
<?php foreach($data['users'] as $user) : ?>
                    <tr>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                    </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- end div table-responsive -->
        </div>
    </div>

<?php require APP_ROOT . '/views/inc/footer.php' ?>