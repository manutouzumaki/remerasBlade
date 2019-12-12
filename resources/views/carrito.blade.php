@extends('app')
@extends('header')
@section('main')
<head>
  <link rel="stylesheet" href="{{asset('css/perfil.css')}}">
  <link rel="stylesheet" href="{{asset('css/carrito.css')}}">
</head>
<body class="carro">
  <main>
    <div class="cuerpo">
    <div class="compras">
      <?php
        if(count($usuarioLogeado->carrito) > 0){
          foreach ($usuarioLogeado->carrito as $productoCarro) {
           ?>
           <div class="compra">
                <div class="texto">
                    <h5>{{$productoCarro->nombre}}</h5>
                    <p>{{$productoCarro->detalle}}</p>
                    <p>{{$productoCarro->precio}}</p>
                </div>
                <form class="botonEliminar" action="/eliminarCarrito" method="post">
                  {{csrf_field()}}
                  <button type="submit" name="eliminar" class="btn btn-dark" value="{{$productoCarro->id}}">eliminar</button>
                </form>
                <div class="imagen">
                    <img src="img/{{$productoCarro->foto}}" width="200px" height="150px">
                </div>
          </div>
          <?php
         }
       }else {
         ?>
         <div class="compra">No tienes productos en el carrito</div>
         <?php
       }
      ?>



    </div>
    <div class="perfil">
      <?php if(isset($usuarioLogeado)){ ?>
      <div class="logoPerfil">
        <img src="img/<?php echo $usuarioLogeado->foto;?>" alt="foto perfil" width="320px" height="320px">
      </div>
      <h5><?php echo $usuarioLogeado->name; ?></h5>
      <?php
        $precioFinal = 0;
          foreach ($usuarioLogeado->carrito as $productoCarro) {
            $precioFinal = $precioFinal + $productoCarro->precio;
          } ?>
      <p>total a pagar: </p>
      <h5>$<?php echo $precioFinal; ?></h5>
      <a class="btn btn-dark" href="home" role="button">Volver</a>
      <button class="btn btn-dark" type="button" name="comprar" value="comprar" >comprar</button>
      <?php }else{
        ?> tienes que iniciar secion para realizar una compra <?php
      } ?>
    </div>
    </div>
  </main>
</body>
@stop
@extends('footer')