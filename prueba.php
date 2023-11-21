<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Descargar PDF</title>
</head>
<body>

<form action="Controlador/ctr.documentos.php" method="post">
    <input type="hidden" name="numero_documento" value="1">
  <button type="submit">Descargar PDF</button>
</form>
<form action="Controlador/ctr.documentos.php" method="post">
    <input type="hidden" name="numero_documento" value="2">
  <button type="submit">Descargar PDF</button>
</form>
<form action="Controlador/ctr.documentos.php" method="post">
    <input type="hidden" name="numero_documento" value="3">
  <button type="submit">Descargar PDF</button>
</form>

</body>
</html>
