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
        <a id="BotonInicio" href="{{route('login')}}">
            <button id="AvatarBoton">
                <img id="Avatar" src="{{ asset('images/AvatarFondo.png') }}" width="50"/>
                @guest
                <p>Iniciar Sesion</p>
                @endguest
                @auth
                    <p>{{ auth()->user()->name }}</p>
                    <form action="{{route("logout")}}" method="POST">
                @csrf
                    <input class="btn  btn-glass" type="submit" value="Logout">
                </form>
                Logout

               @endauth
            </button>
        </a>
        @auth <!-- PISOS FAVORITOS SOLO SI ESTÁ LOGEADO -->
            <a class="h-full btn btn-warning" href="{{route('favoritos')}}">Favoritos</a>
        @endauth
    </header>
    <br>
    <div id="cuerpoFichas">
        <!-- Todas las "fichas" de las casas -->
        <div class="ficha">
            <a class="centrado" href="{{route('calleConstitucion1')}}">
                <img class="imagenFicha" src="{{asset('images/piso1/CalleConstitucion1.png')}}"/>
                <div class="textoficha">
                    <h3>180.000€</h3>
                    <p>Calle Constitucion Cuarte de Huerva, Zaragoza</p>
                </div>
            </a>
        </div>
        <div class="ficha">
            <a class="centrado" href="./piso1.html">
                <img class="imagenFicha" src="{{asset('images/piso1/CalleConstitucion1.png')}}" usemap="#piso1map"/>
                <div class="textoficha">
                    <h3>225.000€</h3>
                    <p>Calle Cuarta Zaragoza</p>
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
            <form method="POST" action="{{ route('index') }}">
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
            <a href="#Contactanos" class="enlaceFooter">
                <p>CONTACTANOS</p>
            </a>
    </footer>
</body>
</html>
