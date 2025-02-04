fetch('assets/json/FotosMascotasV.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la respuesta de la red');
        }
        return response.json();
    })
    .then(data => {
        const mascotaVsDiv = document.getElementById('mascotaVs');
        data.forEach(item => {
            if (item.mascotaV) {
                const mascotaV = item.mascotaV;
                const mascotaVDiv = document.createElement('div');
                mascotaVDiv.className = 'mascotaV';

                // Crear el elemento de video sin `poster`
                const videoElement = document.createElement('video');
                videoElement.className = 'mascotaV-video';
                videoElement.src = mascotaV.video;
                videoElement.muted = true;
                videoElement.loop = true;
                videoElement.style.cursor = "pointer";

                // Capturar fotograma cuando el video esté listo
                videoElement.addEventListener('loadeddata', () => {
                    captureFrame(videoElement, (posterUrl) => {
                        videoElement.setAttribute('poster', posterUrl); // Asignar el fotograma como poster
                    });
                });

                // Abrir modal al hacer clic en el video
                videoElement.addEventListener('click', () => {
                    openModal(mascotaV.video, mascotaV.Titulo);
                });

                // Agregar video al contenedor
                mascotaVDiv.appendChild(videoElement);
                mascotaVsDiv.appendChild(mascotaVDiv);
            } else {
                console.error('La propiedad "mascotaV" no está definida en uno de los elementos');
            }
        });
    })
    .catch(error => console.error('Error al cargar los datos:', error));

// Función para abrir el modal con el video
function openModal(videoSrc, titulo) {
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <span class="close" onclick="this.parentElement.remove()">&times;</span>
        <video class="modal-content" src="${videoSrc}" controls autoplay></video>
        <h2 class="modal-content">${titulo}</h2>
    `;
    modal.addEventListener('click', () => modal.remove()); // Cerrar al hacer clic fuera
    document.body.appendChild(modal);
}

// Función para capturar un fotograma del video
function captureFrame(video, callback) {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');

    // Esperar a que el video tenga datos cargados
    video.addEventListener('loadeddata', () => {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        // Dibujar el fotograma en el canvas
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convertir el canvas a una URL de imagen
        const posterUrl = canvas.toDataURL("image/jpeg"); // Formato JPEG
        callback(posterUrl);
    });
}

// Agregar estilos CSS dinámicamente
const style = document.createElement('style');
style.innerHTML = `
.mascotaV-video {
    width: 67px;
    height: 120px;
    border: 3px solid rgba(255, 255, 255, 0.7);
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
}
.mascotaV-video:hover {
    transform: scale(1.1);
}
.modal {
    display: flex;
    position: fixed;
    z-index: 5;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
}
.modal-content {
    max-width: 90%;
    max-height: 90%;
    border-radius: 10px;
}
.modal video {
    box-shadow: 0 1px 15px rgb(140, 0, 255);
    border: 3px solid rgba(255, 255, 255, 0.7);
    background: linear-gradient(to right, rgb(1, 4, 50), rgb(40, 0, 77));
}
h2 {
    color: white;
    font-size: 15px;
    text-shadow: 1px 1px 5px black;
    text-align: center;
    position: absolute;
    bottom: 5%;
}
.close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}
`;
document.head.appendChild(style);
