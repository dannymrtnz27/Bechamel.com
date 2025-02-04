<?php
include 'conexion.php';

// Validación del ID proporcionado
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Consulta para obtener la información de la mascota
$sql = "SELECT * FROM mascotas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

// Verifica si se encontró la mascota
if ($resultado->num_rows > 0) {
    $mascota = $resultado->fetch_assoc();
} else {
    echo "No se encontraron datos.";
    exit;
}
?>
<!doctype html>
<html lang="ES">
<head>
    <title>iBechamel</title>
    <meta property="og:title" content="ibechamel">
    <meta property="og:description" content="contenido solo de uso personal no de venta, ni propaganda.">
    <meta property="og:image" content="/assets/icons/ibechamelogocolormbtcSpng.png">
    <link rel="icon" href="/assets/icons/ibechamelogocolormbtcSpng.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css?v=1.0.1">
    <link rel="stylesheet" type="text/css" href="/assets/css/animazione.css?v=1.0.1">
</head>
<body>
    <a href="portada.html">
        <svg viewBox="0 0 364 106" fill="none" class="marcanombre">
            <!-- Contenido del SVG -->
        </svg>                    
    </a>
    <div class="ContenedorGeneral">
        <h1 class="brand" id="brand">brand</h1>
        <div class="contenedor-body">
            <div class="contenedor-viewer">
                <div class="pic">
                    <img class="fotoAnuario" src="<?php echo $mascota['foto']; ?>" >
                    <div class="reaccione">
                        <svg class="line" viewBox="0 0 367 3" fill="none">
                            <rect opacity="0.9" width="367" height="15" fill="#D9D9D9"/>
                        </svg>
                        <svg class="heartli" viewBox="0 0 137 180" fill="none">
                            <path class="2" d="M69 29C73.3333 20.3333 88 -3 115 8C135 16.1481 140 43 126 59C114.8 71.8 83.3333 118.333 69 140L12 59C1.66668 44 -3 20 20 7.99999C47.9869 -6.60186 65.6667 20 69 29Z" fill="#FF0000" stroke="#FF0000"/>
                        </svg>
                        <div class="like-count">0</div>
                        <svg class="viewOpen" onclick="showimg();" viewBox="0 -14 137 149" fill="none">
                            <path d="M72 95H6L20 34" stroke="white" stroke-width="8"/>
                            <path d="M125 64L138 4H72" stroke="white" stroke-width="8"/>
                        </svg>
                    </div>
                    </div>
                    <article>
                        <svg width="131" height="137" viewBox="0 0 131 137" fill="none">
                        <path d="M66 26C70.3333 17.3333 85 -6 112 5C132 13.1481 137 40 123 56C111.8 68.8 80.3333 115.333 66 137L9.00001 56C-1.33332 41 -6 17 17 4.99999C44.9869 -9.60186 62.6667 17 66 26Z" fill="#FFF9F9"/>
                        </svg>
                    </article>
                </div>
                <div class="nombres">
                    <h2 class="name"><?php echo $mascota['nombre']; ?></h2>
                    <h2 class="cognome"><?php echo $mascota['apellido']; ?></h2>
                    <h1 class="edad"><?php echo $mascota['edad']; ?></h1>
                    <h2 class="raza"><?php echo $mascota['raza']; ?></h2>
                    <h2 class="raza"><?php echo $mascota['especie']; ?></h2>
                    <h2 class="raza"><?php echo $mascota['sexo']; ?></h2>
                </div>
                <div class="galery">
                    <svg onclick="hideGaleFo(), hidefriend(), showMessenger();" class="gale" width="25" height="24" viewBox="0 0 178 173" fill="none">
                        <rect x="6" y="6" width="166" height="161" rx="9" stroke="white" stroke-width="12"/>
                        <line x1="27" y1="41.5" x2="150" y2="41.5" stroke="white" stroke-width="11"/>
                        <line x1="27" y1="81.5" x2="150" y2="81.5" stroke="white" stroke-width="11"/>
                        <path d="M27 126.5H48M67 126.5H88" stroke="white" stroke-width="11"/>
                    </svg>
                    <svg onclick="hideMessenger(), hidefriend(), showGaleFo();" class="gale" width="25" height="24" viewBox="0 0 178 132" fill="none">
                        <path d="M59.7077 12.5554L51.665 26.6239C48.8119 31.6146 43.3576 34.5357 37.6223 34.1446L21.0204 33.0126C12.3546 32.4217 5 39.2919 5 47.9778V76.0235V112C5 120.284 11.7157 127 20 127H90.1351H158C166.284 127 173 120.284 173 112V76.0235V48.0404C173 39.3313 165.608 32.453 156.922 33.0792L142.994 34.0831C137.081 34.5094 131.472 31.4134 128.681 26.1832L121.614 12.9387C119.007 8.05214 113.919 5 108.38 5H72.7299C67.3481 5 62.3788 7.8832 59.7077 12.5554Z" stroke="white" stroke-width="10"/>
                        <path d="M122.5 75C122.5 92.8925 107.783 107.5 89.5 107.5C71.2175 107.5 56.5 92.8925 56.5 75C56.5 57.1075 71.2175 42.5 89.5 42.5C107.783 42.5 122.5 57.1075 122.5 75Z" stroke="white" stroke-width="9"/>
                    </svg>
                    <svg class="gale" width="20" height="25" viewBox="0 0 170 107" fill="none">
                        <rect x="4" y="4" width="167" height="98.3726" rx="16" stroke="white" stroke-width="8"/>
                        <path d="M73.2026 74.9962V36.1715C73.2026 33.773 75.8779 32.3443 77.8712 33.6784L108.195 53.9731C110.014 55.1909 109.959 57.8845 108.09 59.0261L77.7669 77.5561C75.7678 78.7777 73.2026 77.339 73.2026 74.9962Z" fill="white"/>
                    </svg>
                    <svg onclick="hideMessenger(), hideGaleFo(), showfriend();"  class="gale" width="15" height="23" viewBox="0 0 167 163" fill="none" hoverhover>
                        <circle cx="80.527" cy="40.6973" r="35.6973" stroke="white" stroke-width="10"/>
                        <path d="M154 158H13C8.58172 158 4.94466 154.389 5.33447 149.988C7.89773 121.049 24.6695 118.058 37.4129 110.474C48.5549 103.842 45.5161 95 85.0194 95C124.523 95 116.13 105.23 131.613 110.474C145.884 115.307 159.664 120.621 161.733 149.986C162.044 154.393 158.418 158 154 158Z" stroke="white" stroke-width="10"/>
                        <path d="M146 9V40" stroke="white" stroke-width="10"/>
                        <path d="M130.5 24.5L161.5 24.5" stroke="white" stroke-width="10"/>
                    </svg>
                </div>
                <p class="messenger" id="messenger">
                    Hola, me llamo <b><?php echo $mascota['nombre']; ?></b> y si me he perdido te pido que me ayudes a regresar a mi casa 
                    <b><?php echo $mascota['direccione'] . ', ' . $mascota['municipio'] . ', ' . $mascota['departamento']; ?></b>.
                    También puedes llamar a mi familia al <b><?php echo $mascota['numerotelefono']; ?></b> 
                    o presionando el botón rojo de abajo <b>'avisar en caso de emergencia'.</b>
                </p>
                <div class="Galefotos">
                    <img class="galefoto" src="${mascota.foto}" >
                </div>
                <div class="cuadrobehindu">
                    <input class="barra" type="text" id="search" placeholder="Buscar amigos..." />
                    <ul class="results" id="results"></ul>
                </div>
                <a class="fab fa-whatsapp" href="https://wa.me/<?php echo $mascota['numerowhatsapp']; ?>/?text=Encontré a su <?php echo $mascota['especie']; ?> <?php echo $mascota['nombre']; ?>" target="_blank">
                    AVISAR EN CASO DE EMERGENCIA
                </a>
            </div>
        </div>
    </div>
    <iframe class="frontmenu" src="barra.html" frameborder="0"></iframe>
    <div class="imgpopup" onclick="hideimg();">
        <div class="borde">
            <img class="photopopup" src="${mascota.foto}" >
            <h2 class="namepopup"> ${mascota.nombre} </h2>
            <svg class="viewCloser" viewBox="-21 -7 200 160" fill="none" >
                <path d="M160 62H94L108 1" stroke="white" stroke-width="8"/>
                <path d="M53 144L66 84H0" stroke="white" stroke-width="8"/>
            </svg>
    </div>
<script src="/assets/js/registro.js"></script>
</body>
</html>
