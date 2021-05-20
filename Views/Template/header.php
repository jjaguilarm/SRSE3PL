<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title><?= $data["pageTitle"] ?></title>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">ARSET</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Rastrear envío</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cotiza tu envío</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Envíos
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Registrar envío</a></li>
                  <li><a class="dropdown-item" href="#">Recolectar envío</a></li>
                  <li><a class="dropdown-item" href="#">Entregar envío</a></li>
                  <li><a class="dropdown-item" href="#">Reportar recepción de envíos</a></li>
                  <li><a class="dropdown-item" href="#">Manejar incidencias</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Facturación
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                  <li><h6 class="dropdown-header">Reporte de facturación</h6></li>
                  <li><a class="dropdown-item" href="#">Factura preliminar</a></li>
                  <li><a class="dropdown-item" href="#">Factura definitiva</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Registrar y comprobar pago</a></li>
                  <li><a class="dropdown-item" href="#">Reporte de estado de cuenta</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Infraestructura
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Configurar rutas de entrega</a></li>
                  <li><a class="dropdown-item" href="#">Administrar transportistas</a></li>
                  <li><a class="dropdown-item" href="#">Gestionar catálogo de clientes</a></li>
                </ul>
              </li>
            </ul>
            <a class="btn btn-outline-info" role="button" href="#" data-bs-toggle="button">Iniciar sesión</a>
            &nbsp;
            <a class="btn btn-outline-info" role="button" href="#" data-bs-toggle="button">Registrate</a>
          </div>
        </div>
      </nav>
    </header>