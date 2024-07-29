@extends('layouts.index')

@section('title')
    Valor UF
@endsection

@section('content')
    <h2>Página que te dice el precio de la UF hoy</h2>
    <div class="container" id="UFcontent">
        {{-- <h3 id="fecha"></h3> --}}
    </div>

    <script>
        imprimeUF(<?php echo $UFData; ?>);

        function imprimeUF(_datosEndpoint) {
            const contenidoUF = document.getElementById('UFcontent');
            contenidoUF.innerHTML = '';
            _datosEndpoint.data.forEach(element => {
                if (element.activo) {
                    const valor = document.createElement(h4);
                    valor.innerText = 'Valor: ' + element.valor;
                    const fecha = document.createElement(h4);
                    fecha.innerText = 'Fecha: ' + element.fecha;
                    contenidoUF.appendChild(valor);
                    contenidoUF.appendChild(fecha);
                }
            });
        }
    </script>

@endsection