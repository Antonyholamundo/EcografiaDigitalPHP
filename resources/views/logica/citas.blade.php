<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita - Clínica de Ecografías</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- CSS Personalizado -->
     <link rel="stylesheet" href="stilo.css">
</head>
<body>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./img/logo.jpg" alt="Logo Ecografía Digital Machala" style="max-height: 30px;">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="citas.html">Agendar Cita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pacientes.html">Pacientes</a>
                </li>
               
            </ul>
             <!-- Menú desplegable de Configuración y Salir -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <!-- Ícono de Configuración -->Opciones
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Configuración</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="login.html" id="btn-salir"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
                </ul>
        </div>
    </div>
</nav>
    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class>Agendar Cita</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgendarCita">
            Agregar Cita
        </button>
        <!-- Tabla de Citas Agendadas -->
        <h2 class="mt-2">Citas Agendadas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Paciente</th>
                    <th>Fecha</th>
                    <th>Tipo de Ecografía</th>
                    <th>Hora</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-citas">
                <!-- Las citas se agregarán dinámicamente aquí -->
            </tbody>
        </table>
    </div>

    <!-- Modal para Agregar/Editar Cita -->
    <div class="modal fade" id="modalAgendarCita" tabindex="-1" aria-labelledby="modalAgendarCitaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgendarCitaLabel">Agendar Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <form action="{{ route('citas.store') }}" method="POST" id="form-cita">
    @csrf
    <div class="mb-3">
        <label for="nombre-paciente" class="form-label">Nombre del Paciente</label>
        <input type="text" class="form-control" id="nombre-paciente" name="paciente" required>
    </div>

    <div class="mb-3">
        <label for="fecha-cita" class="form-label">Fecha de la Cita</label>
        <input type="date" class="form-control" id="fecha-cita" name="fecha" required>
    </div>

    <div class="mb-3">
        <label for="tipo-ecografia" class="form-label">Tipo de Ecografía</label>
        <select class="form-select" id="tipo-ecografia" name="tipo" required>
            <option value="">Seleccione un tipo</option>
            <option value="ecografia-abdominal">Ecografía Abdominal</option>
            <option value="ecografia-obstetrica">Ecografía Obstétrica</option>
            <option value="ecografia-mamaria">Ecografía Mamaria</option>
            <option value="ecografia-tiroidea">Ecografía Tiroidea</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="hora-cita" class="form-label">Hora de la Cita</label>
        <input type="time" class="form-control" id="hora-cita" name="hora" required>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
    </div>

    <div class="mb-3">
        <label for="estado-paciente" class="form-label">Estado del Paciente</label>
        <select class="form-select" id="estado-paciente" name="estado" required>
            <option value="">Seleccione un estado</option>
            <option value="pendiente">Pendiente</option>
            <option value="atendido">Atendido</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cita</button>
</form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-guardar-cita">Guardar Cita</button>
                </div>
            </div>
        </div>
    </div>
 <!-- Footer -->
 <footer class="text-white mt-auto">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h5>Contacto</h5>
                <p>Dirección: Buenavista y Boyaca</p>
                <p>Teléfono: 0963947466</p>
                <p>Email: ecografiadigitalmachala@gmail.com</p>
            </div>
            <div class="col-md-6">
                <h5>Horario de Atención</h5>
                <p>Lunes a Viernes: 8:00 AM - 6:00 PM</p>
                <p>Sábado: 9:00 AM - 1:00 PM</p>
            </div>
        </div>
    </div>
</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script para manejar la lógica de agendar citas -->
    <script src="programa.js"></script>
      
    </script>
</body>
</html>