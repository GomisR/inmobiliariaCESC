import React, { useEffect, useState, useRef } from 'react';
import { usePage } from '@inertiajs/react';
import { Carousel } from 'react-responsive-carousel';
import 'react-responsive-carousel/lib/styles/carousel.min.css';
import { Link } from "@inertiajs/react";
import { route } from "ziggy-js";

const CalleMiguelDeCervantes = () => {

    const { props } = usePage();
    const inmueble = props.inmueble;
    const user = props.auth?.user;
    const contactoRef = useRef(null);

    if (!inmueble) return <p>No se encontró el inmueble.</p>;

    return (
        <div className="max-w-5xl mx-auto p-4">
            <nav>
                <div><strong>INMOBILIARIA<br/>CES</strong></div>
                <div>
                    <Link href="/">Inicio</Link>
                    <Link href="/pisos">Inmuebles</Link>
                    <Link href="/nosotras">Nosotras</Link>
                    <Link href="/#contacto">Contacto</Link>
                    <Link href="/blog">Blog</Link>
                    {user ? (
                        <div className="dropdown">
                            <button className="dropdown-toggle">{user.nombre}</button>
                            <div className="dropdown-menu">
                                <Link href="/perfil">Perfil</Link>
                                <Link href={route('logout')} method="post" as="button">Cerrar sesión</Link>
                            </div>
                        </div>
                    ) : (
                        <Link href={route('login')}>Log in</Link>
                    )}
                </div>
            </nav>

            {/* Carrusel de imágenes */}
            <Carousel showThumbs={false} autoPlay infiniteLoop>
                {inmueble.imagenes.map((img, i) => (
                    <div key={i}>
                        <img src={img} alt={`Imagen ${i + 1}`} />
                    </div>
                ))}
            </Carousel>

            {/* Titulo y descripcion */}
            <h1 className="text-3xl font-bold mt-6 mb-2">{inmueble.titulo}</h1>
            <p className="text-gray-700 mb-4">{inmueble.descripcion}</p>

            {/* Info del piso */}
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-800 text-sm leading-6">
                <div>
                    <p><strong>Tipo:</strong> {inmueble.tipo.toLocaleString()}</p>
                    <p><strong>Estado:</strong> {inmueble.estado.toLocaleString()}</p>
                    <p><strong>Precio:</strong> {parseFloat(inmueble.precio).toLocaleString()} €</p>
                    <p><strong>Superficie:</strong> 85 m²</p>
                    <p><strong>Habitaciones:</strong> 3 hab.</p>
                    <p><strong>Ubicación:</strong> Planta 3ª exterior sin ascensor</p>
                    <p><strong>Estado:</strong> Piso reformado en 2010</p>
                </div>
                <div>
                    <p><strong>Calefacción:</strong> Individual, gas natural</p>
                    <p><strong>Orientación:</strong> Sur</p>
                    <p><strong>Año de construcción:</strong> 1936</p>
                    <p><strong>Equipamiento:</strong> Aire acondicionado, cocina equipada</p>
                    <p><strong>Condición:</strong> Muy buena</p>
                </div>
            </div>

            {/* Descripcion del inmueble */}
            <div className="mt-6 text-justify text-gray-800 leading-7">
                <p>
                    Este encantador piso reformado en 2010 se encuentra en una cuarta planta alzada, sin ascensor, en
                    una de las zonas más demandadas de la ciudad, a solo unos pasos de la Gran Vía y la calle Sagasta...
                </p>
            </div>
        </div>
    );
};

export default CalleMiguelDeCervantes;
