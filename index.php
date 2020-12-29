<?php
    require_once './db.php';

    $listBooksQuery = "SELECT b.*, c.name as cate_name from books b join categories c on b.cate_id = c.id";

    $books = executeQuery($listBooksQuery);

    // varDump($books);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include_once './header.php'; ?>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>
                    <a href="<?= BASE_URL. './add_new_book.php'?>" class="btn btn-sm btn-success">Add new</a>
                </th>
            </thead>
            <tbody>
               <?php foreach ($books as $key):?>
               <tr>
                   <td><?= $key['id']?></td>
                   <td><?= $key['name']?></td>
                   <td>
                       <img src="<?= $key['feature_image']?>" width="50" alt="">
                   </td>
                   <td><?= $key['cate_name']?></td>
                   <td><?= $key['description']?></td>
                   <td><?= $key['price']?></td>
                   <td>
                    <a href="<?= BASE_URL. 'edit_book.php?id='. $key['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= BASE_URL. 'remove_book.php?id='. $key['id'] ?>" class="btn btn-sm btn-danger">Remove</a>
                   </td>
               </tr>
               <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
