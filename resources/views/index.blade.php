<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inmobiliaria CES</title>
    <link rel="shortcut icon" href="{{asset('images/logo.jpeg')}}" />
    <!-- Estilos -->

    <link rel="stylesheet" href="{{ asset('css/indexCSS.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">

</head>
<body>
    <header id="AnclaInicio">
        <img src="{{asset('images/logo.jpeg')}}" id="Logo">
        <h1>Inmobiliaria CES</h1>
        @guest
            <a id="BotonInicio" href="{{ route('login') }}">
                <button id="AvatarBoton">
                    <img id="Avatar" src="{{ asset('images/AvatarFondo.png') }}" width="50"/>
                    <p>Iniciar Sesión</p>
                </button>
            </a>
        @endguest
        @auth
            <div id="AvatarBoton" style="visibility: hidden">
                <form style="visibility: visible" action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button id="AvatarBoton" style="width: 100%; height: 100%" type="submit">{{ Auth::user()->name }} - Cerrar Sesión</button>
                </form>
            </div>
        @endauth
    </header>
    <br>
    <div id="cuerpoFichas">
        <!-- Todas las "fichas" de las casas -->
        <div class="ficha">
            <a class="centrado" @auth href="{{route('pisos.index')}}" @endauth>
                <img class="imagenFicha" src="{{asset('images/piso1/CalleConstitucion1.png')}}"/>
                <div class="textoficha">
                    <h3>180.000€</h3>
                    <p>Calle Constitucion Cuarte de Huerva, Zaragoza</p>
                    <p>Piso espacioso con 4 habitaciones y 2 baños. Siutado en el centro del pueblo</p>
                </div>
            </a>
        </div>
    </div>
    <div id="SobreNosotras">
        <p>Somos una empresa pequeña con dos trabajadores Celia Cies y Sandra Martinez.
            LLevamos mas de 5 años en este sector trabajando en diferentes inmobiliarias.
            Decidimos embarcar esta nueva aventura con toda la experiencia ya aprendida durante todos los anteriores años y con la experiencia de trabajar en varias inmobiliarias diferentes, cada una de ellas con un método de trabajo diferente.
            Siempre tuvimos una forma de pensar muy similar y decidimos empezar de cero pero con una estilo de trabajo único.
            Creemos que la mejor forma para trabajar en una inmobiliaria es el trabajo personalizado y por eso mismo no tratamos con muchos inmuebles a la vez. Ya que eso implicaría perder un trato de "tú a tú" con nuestros clientes.
            Por nuestra experiencia siempre hemos visto que la forma de trabajo es "vacía" solo se busca vender una inmueble a cualquier costo.
            Nosotras queremos buscar para cada familia su hogar ideal. Para que ambas partes, tanto comprador como vendedor, queden satisfechos en este trato.
        </p>
        <img src="{{ asset('images/celiaysandra.jpg') }}" alt="Nosotras" >
    </div>
    <br>
    @auth
    <div id="Contactanos">
        <fieldset>
            <h3 id="TituloFormulario">Formulario de Contacto</h3>
            <form method="POST" action="{{ route('For') }}">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required value="{{ old('nombre') }}">

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required value="{{ old('apellido') }}">

                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required value="{{ old('correo') }}">

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required value="{{ old('telefono') }}">

                <label for="mensaje">¿Qué deseas?</label>
                <textarea id="mensaje" name="mensaje" required>{{ old('mensaje') }}</textarea>

                <div id="BotonesFormulario">
                    <button id="ConfirmarFormulario" type="submit" name="confirmar">Confirmar</button>
                    <button type="reset">Limpiar</button>
                </div>
            </form>
        </fieldset>
        <!-- Validamos y mostramos el error desde el controller -->
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
    </div>
    @endauth
    <br>
    <footer>
            <a href="#AnclaInicio" class="enlaceFooter">
                <p>INICIO</p>
            </a>
            <a href="#SobreNosotras" class="enlaceFooter">
                <p>NOSOTRAS</p>
            </a>
        @auth
            <a href="#Contactanos" class="enlaceFooter">
                <p>CONTACTANOS</p>
            </a>
        @endauth
    </footer>
</body>
</html>
