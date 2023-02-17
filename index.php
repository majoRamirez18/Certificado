<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Certificado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .form-container {
            width: 500px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div>
                    <h2>Formulario</h2>
                    <form action="assets/php/datatopdf.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidoPaterno">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidoMaterno">Apellido Materno:</label>
                            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" required>
                        </div>
                        <div class="form-group">
                            <label for="curp">CURP:</label>
                            <input type="text" class="form-control" id="curp" name="curp" required>
                        </div>
                        <div class="form-group">
                            <label for="calle">Calle:</label>
                            <input type="text" class="form-control" id="calle" name="calle" required>
                        </div>
                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" id="numero" name="numero" required>
                        </div>
                        <div class="form-group">
                            <label for="colonia">Colonia:</label>
                            <input type="text" class="form-control" id="colonia" name="colonia" required>
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado" required>
                        </div>
                        <div class="form-group">
                            <label for="codigoPostal">Código Postal:</label>
                            <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="button" class="btn btn-secondary">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>