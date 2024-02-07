<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Expressoes com blade</h1>
    <!--COMENTARIO HTML-->
    {{-- COMENTARIO DE BLADE--}}
    {{-- pegar os dados que vem da rota --}}
    {{-- neste tipo de uso de expressão, o blade realiza o escape automatico, para evitar xss --}}
    <p>Nome: {{$nome}}</p>

    {{-- FORMA SEM ESCAPE --}}
    <p>Nome sem escape: {!!$nome!!}</p>
</body>
</html>