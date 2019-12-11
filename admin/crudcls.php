<?php
//include_once 'header.php';
$connect = mysqli_connect("localhost", "root", "", "checker");
$query = "SELECT * FROM classe";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Classe Crud</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <br /><br />
    <div class="container">
        <h3 align="center">Gestion de classe</h3>
        <br />
        <div class="table-responsive">
            <div align="right">
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
            </div>
            <br />
            <div id="employee_table">
                <table class="table table-bordered">
                    <tr>
                        <th width="55%">Class </th>
                        <th width="15%">Edit</th>
                        <th width="15%">View</th>
                        <th width="15%">delete</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["niveau"] . " " . $row["section"] . " " . $row["indice"]; ?></td>
                            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id_c"]; ?>" class="btn btn-warning btn-xs edit_data" /></td>
                            <td><input type="button" name="view" value="view" id="<?php echo $row["id_c"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                            <td><input type="button" name="delete" value="delete" id="<?php echo $row["id_c"]; ?>" class="btn btn-danger btn-xs delete_data" /></td>

                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Employee Details</h4>
            </div>
            <div class="modal-body" id="class_details">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ajouter une classe</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">

                    <label>Section</label>
                    <select name="section" id="Section" class="form-control form-control-lg">
                        <?php $sql = "SELECT * FROM section ";
                        $query = mysqli_query($connect, $sql);
                        $resu = $query->fetch_assoc();
                        echo "<option value='" .$resu['nom_sec'] . "'>" . $resu['nom_sec'] . "</option>";
                        while ($row = $query->fetch_assoc()) {

                            echo "<option value='".$row['nom_sec']. "'>" . $row['nom_sec'] . "</option>";
                        }
                        ?>
                    </select>
                    <br />
                    <label>Niveau</label>
                    <input type="number" name="niveau" id="niveau" class="form-control" />
                    <br />
                    <label>indice</label>
                    <input type="number" name="indice" id="indice" class="form-control" />
                    <br />
                    <input type="hidden" name="id_c" id="id_c" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#add').click(function() {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function() {
            var id_c = $(this).attr("id");
            $.ajax({
                url: "inc/fetch.php",
                method: "POST",
                data: {
                    id_c: id_c
                },
                dataType: "json",
                success: function(data) {
                    $('#section').val(data.section);
                    $('#niveau').val(data.niveau);
                    $('#indice').val(data.indice);
                    $('#id_c').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#section').val() == "") {
                alert("section is required");
            } else if ($('#niveau').val() == '') {
                alert("niveau is required");
            } else if ($('#indice').val() == '') {
                alert("indice is required");
            
            } else {
                $.ajax({
                    url: "inc/insert.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }
        });
        $(document).on('click', '.view_data', function() {
            var id_c = $(this).attr("id");
            if (id_c != '') {
                $.ajax({
                    url: "inc/select.php",
                    method: "POST",
                    data: {
                        id_c: id_c
                    },
                    success: function(data) {
                        $('#class_details').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });
        $(document).on('click', '.delete_data', function() {
            var id_c = $(this).attr("id");
            if (id_c != '') {
                $.ajax({
                    url: "inc/delete.php",
                    method: "POST",
                    data: {
                        id_c: id_c
                    },
                    success: function(data) {
                       alert ('record supprimer');
                       location.reload();
                    }
                });
            }
        });
    });
</script>