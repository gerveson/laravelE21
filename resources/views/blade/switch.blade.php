<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Switch case com blade</h1>
    @Switch($numero)
        @case(1)
        <p>Numero um</p>
        @break

        @case(2)
        <p>Numero dois</p>
        @break

        @default 
        <p>Numero indefinido</p>        
    @endswitch
</body>
</html>