import React from 'react';
import { Head, Link, usePage } from '@inertiajs/react';
import '../../css/estiloNosotras.css';
import { route } from 'ziggy-js';
import { Ziggy } from '../ziggy';

export default function Nosotras() {
    const { props } = usePage();
    const isAuthenticated = !!props?.auth?.user;

    return (
        <div>
            <Head title="Nosotras - Inmobiliaria CES" />

            {/* CABECERA */}
            <nav>
                <div><strong>INMOBILIARIA<br />CES</strong></div>
                <div>
                    <Link href="/">Inicio</Link>
                    <Link href="/pisos">Inmuebles</Link>
                    <Link href="/nosotras">Nosotras</Link>
                    <Link href="/#contacto">Contacto</Link>
                    <Link href="/blog">Blog</Link>
                    {isAuthenticated ? (
                        <div className="dropdown">
                            <button className="dropdown-toggle">{props.auth.user.nombre}</button>
                            <div className="dropdown-menu">
                                <Link href={route('profile', undefined, false, Ziggy)}>Perfil</Link>
                                <Link href={route('logout', undefined, false, Ziggy)} method="post" as="button">Cerrar sesión</Link>
                            </div>
                        </div>
                    ) : (
                        <Link href={route('login', undefined, false, Ziggy)}>Log in</Link>
                    )}
                </div>
            </nav>

            {/* FONDO INICIAL CON TÍTULO */}
            <section style={{
                backgroundImage: "url('/images/fondo-nosotras.jpg')",
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                height: '60vh',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                color: 'white',
                textShadow: '2px 2px 4px rgba(0,0,0,0.7)',
                fontSize: '3rem'
            }}>
                <h1>Todo sobre Nosotras</h1>
            </section>

            {/* CONTENIDO PRINCIPAL */}
            <section style={{ display: 'flex', padding: '4rem', gap: '2rem' }}>
                <div style={{ flex: '1', fontSize: '1.2rem', lineHeight: '1.6' }}>
                    <p>
                        Somos dos mujeres apasionadas por el mundo inmobiliario, con más de diez años de experiencia ayudando a personas a encontrar mucho más que una casa: su hogar.
                        Después de trabajar durante años en diferentes agencias, decidimos dar un paso valiente y crear Inmobiliaria CES, un proyecto con alma que pone en el centro a las personas. Aquí no hay prisas ni procesos fríos: te escuchamos, te entendemos y te acompañamos en cada paso del camino.
                        Sabemos lo que se siente al comprar o vender una vivienda. Por eso lo hacemos fácil, claro y con corazón. Apostamos por una inmobiliaria más humana, más cercana y más honesta.
                        Trabajamos contigo de tú a tú, sin tecnicismos vacíos ni promesas imposibles. Te explicamos todo con transparencia, resolvemos tus dudas con paciencia y celebramos contigo cuando llegamos al final del proceso. Porque si tú ganas, nosotras también.
                        Estamos demostrando que se puede hacer inmobiliaria con profesionalidad, pero también con empatía, sensibilidad y compromiso real. Estábamos artas de trabajar con el estilo de muchas agencias. Vender a cualquier cliente sin compromiso y una finalidad más allá de ganar dinero.
                        Defendemos furtemente nuestro estilo de trabajo, ya que creemos que si el cliente queda satisfecho es publicidad durante años. Nuestro objetivo es dar exactamente lo que busca a quien lo busca. De esta forma salimos ganando todos.
                        Bienvenida/o a CES.
                    </p>
                </div>
                <div style={{ flex: '1' }}>
                    <img src="/images/nosotras.jpg" alt="Nosotras" style={{ width: '100%', borderRadius: '1rem' }} />
                </div>
            </section>

            {/* FOOTER */}
            <footer style={{ backgroundColor: '#222', color: 'white', padding: '2rem', textAlign: 'center' }}>
                &copy; {new Date().getFullYear()} Inmobiliaria CES - Todos los derechos reservados
            </footer>
        </div>
    );
}
