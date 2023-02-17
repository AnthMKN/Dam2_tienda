<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
@php 
    $iteracion=0;


@endphp
@if($pedido->confirmado==1)
    Factura   
@else
    Presupuesto
    
@endif

    <table style="border-collapse: separate; border-spacing: 15px;">
        <thead>
            <tr>
                <th>Nombre Articulo</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Sub total</th>
            </tr>
        </thead>
        <tbody>
            @php
                    $total = 0;
            @endphp 
            @foreach ($detallesPedido as $d_pedido)
            <tr>
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