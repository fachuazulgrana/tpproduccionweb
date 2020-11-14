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
            var nombre = $("#nombre").val();
            var tipo = $("#tipo").val();
            var texto = $("#texto").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td> <td><input style='width:400px;height:35px' type='text' name='info[][label]' value='ingrese nombre del campo'></td> <td><select type='select' style='width:400px;height:35px'> <option value='1'>Text</option><option value='2'>Checkbox</option><option value='3'>Select</option> </select></td> <td><input style='width:400px;height:35px' type='text' name='info[][text]' value='ingrese contenido del campo'></td></tr>";
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
                <button type="button" class="delete-row btn btn-danger btn-xs">Delete Row</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Nombre del Campo</th>
                        <th>Tipo de Campo</th>
                        <th>Contenido de Campo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
