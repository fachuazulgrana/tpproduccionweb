<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = 'comentarios';
    require_once("head_admin.php");
    
    if($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/comentarios.php")
    {
        header('Location:home.php');
    }


    if (isset($_GET['edit'])) {
        $cont = $Continente->get($_GET['edit']);
    }

    ?>
    <title>Comentarios Dinamicos</title>

    <style>
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
		border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td> <td><input type='text' name='info[][label]' value='"+name+"'></td> <td><input type='text' name='info[][text]' value='"+name+"'></td> <td><input type='text' name='info[][text]' value='"+name+"'></td> <td><input type='checkbox' name='record'></td></tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
</head>

<body>
    <?php
    require_once "sidebar.php";
    ?>
    <div class="content">
        <div class="main container-fluid">
            <h1 class="page-header"><?php echo 'Comentarios Dinámicos'; ?></h1>
            
            <form>
                <input type="button" class="add-row btn btn-success btn-xs" value="Add Row">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Texto del Campo</th>
                        <th>Tipo de Campo</th>
                        <th>Validación</th>
                        <th>¿Es Obligatorio?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="delete-row btn btn-danger btn-xs">Delete Row</button>

        </div>
    </div>
</body>
</html>
