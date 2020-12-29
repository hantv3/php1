<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php include_once './header.php'; ?>

    <div class="container">
        <h2 class="text-center">ADD NEW USER</h2>
        <form action="save_new_user.php" method="post" enctype="multipart/form-data">
            <div class="col-6 offset-3">
                <div class="form-group">
                    <label>User name</label>
                    <input type="text" name="user_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                   <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                   <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-success">Add new</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>