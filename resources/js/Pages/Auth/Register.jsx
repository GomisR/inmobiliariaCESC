import React from 'react';
import { Head, useForm } from '@inertiajs/react';

export default function Register() {
    const { data, setData, post, processing, errors } = useForm({
        nombre: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post('/register');
    };

    return (
        <>
            <Head title="Registro" />

            <h1>Crear cuenta</h1>

            <form onSubmit={submit}>
                <div>
                    <label>Nombre</label>
                    <input
                        type="text"
                        value={data.nombre}
                        onChange={(e) => setData('nombre', e.target.value)}
                    />
                    {errors.nombre && <div style={{ color: 'red' }}>{errors.nombre}</div>}
                </div>

                <div>
                    <label>Email</label>
                    <input
                        type="email"
                        value={data.email}
                        onChange={(e) => setData('email', e.target.value)}
                    />
                    {errors.email && <div style={{ color: 'red' }}>{errors.email}</div>}
                </div>

                <div>
                    <label>Contraseña</label>
                    <input
                        type="password"
                        value={data.password}
                        onChange={(e) => setData('password', e.target.value)}
                    />
                    {errors.password && <div style={{ color: 'red' }}>{errors.password}</div>}
                </div>

                <div>
                    <label>Confirmar contraseña</label>
                    <input
                        type="password"
                        value={data.password_confirmation}
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                    />
                </div>

                <button type="submit" disabled={processing}>
                    Registrarse
                </button>
            </form>
        </>
    );
}
