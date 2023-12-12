
<html>
<head>
    <title></title>
<!--   Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <?php
    include '..\..\includes\connect.php';



    $sql = "SELECT * FROM info";
    $result = $con->query($sql);
    ?>
    
    <h1>Info</h1>
    <div>

            <a class="float-end " href="">
                <div class="btn btn-primary">
                    Create Info
                </div>
            </a>
    </div>
    <table class="table table-striped">
        <tr>
        
            <th>Name</th>
            <th>images</th>
            <th>Title</th>
            <th>short title</th>
            <th>background-color</th>
            <th>Action</th>
        </tr>
        <?php


        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                
                <td><?= $row['name'] ?></td>
                <td><img width="100" src="/images/<?= $row['image']?>"></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['short_title'] ?></td>
                <td><?= $row['background_color'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>
   