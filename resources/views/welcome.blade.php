<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Residence Link</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 50px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        .header p {
            margin-top: 10px;
            font-size: 1.2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
        }

        .feature {
            flex: 1;
            min-width: 300px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature h3 {
            margin-top: 0;
            font-size: 1.5rem;
            color: #4CAF50;
        }

        .feature p {
            font-size: 1rem;
            color: #555;
        }

        .cta {
            text-align: center;
            margin: 60px 0;
        }

        .cta a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }

        .cta a:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
        }

        footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header class="header">
        <h1>Residence Link</h1>
        <p>Conectando comunidades con eficiencia y tecnología</p>
    </header>

    <main class="container">
        <section class="features">
            <div class="feature">
                <h3>Gestión de Zonas</h3>
                <p>Administra y organiza las zonas residenciales de manera centralizada y eficiente.</p>
            </div>
            <div class="feature">
                <h3>Propiedades y Residentes</h3>
                <p>Controla las propiedades y brinda herramientas para residentes desde una sola plataforma.</p>
            </div>
            <div class="feature">
                <h3>Horarios de Guardias</h3>
                <p>Planifica y asigna horarios de manera clara y accesible para todos.</p>
            </div>
            <div class="feature">
                <h3>Reportes de Incidencias</h3>
                <p>Permite a los residentes reportar problemas con facilidad y obtener soluciones rápidas.</p>
            </div>
        </section>

        <div class="cta">
            <a href="{{ route('login') }}">Comenzar Ahora</a>
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Residence Link. Todos los derechos reservados. | <a href="#">Política de Privacidad</a></p>
    </footer>

</body>
</html>
