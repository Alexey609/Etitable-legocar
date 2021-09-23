<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.tabledit.min.js"></script>
</head>
<body>
<div class="container">
    <br/>
    <table id="editable_table" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Машина</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($result)) 
        {
            echo '
            <tr>
            <td> '.$row["id"]. '</td>
            <td> '.$row["name"]. ' </td>
            <td> '.$row["car"]. ' </td>
            </tr>
            ';
        }
        ?>
        </tbody>
    </table>
    <a href="/reg.php">Форма регистрации</a>
</div>
<script>
$(document).ready(function () {
  $('#editable_table').Tabledit({
    url: 'action.php',
    columns: {
        identifier:[0, "id"],
        editable:[[1, "login"], [2, "email"], [3, "password"]]
    },
    restoreButton: false,
    onSuccess: function(data, textStatus, jqXHR)
    {
    if (data.action == 'delite') 
     {
     $('#'+data.id).remove();
    }
    }
  });
});
</script>
</body>
</html>
