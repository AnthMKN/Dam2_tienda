<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
@php 
    $iteracion=0;
@endphp
<div>
<img align="right" src="logoInfo.png">


@if($pedido->confirmado==1)
    <h2>Factura</h2>
@else
    <h2>Presupuesto</h2>
@endif
</div>
<br>
<br>
<br>
    <table class="table" style="border-collapse: separate; border-spacing: 15px;">
        <thead>
            <tr>
                <th scope="col">Nombre Articulo</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Sub total</th>
            </tr>
        </thead>
        <tbody>
            @php
                    $total = 0;
            @endphp 
            @foreach ($detallesPedido as $d_pedido)
            <tr scope="row">
                <td>{{$articulos[$iteracion]->nombre}}</td>
                <td>{{$d_pedido->cantidad}}</td>
                <td>{{$d_pedido->precio}}€</td>
                <td>{{$d_pedido->precio * $d_pedido->cantidad}}€</td>
                @php
                    $total += $d_pedido->precio * $d_pedido->cantidad;
                @endphp  
            </tr>
            @php
                $iteracion++
            @endphp  
            @endforeach
        </tbody>
    </table>
    <div class="form-group row" align="right">
        <div class="offset-4 col-8">
            <label for="total" class="col-4 col-form-label">Total: {{$total}}€</label>
        </div>
    </div>
</body>
</html>