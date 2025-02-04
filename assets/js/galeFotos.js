fetch('assets/json/FotosMascotasU.json')
.then(response => {
    if (!response.ok) {
        throw new Error('Error en la respuesta de la red');
    }
    return response.json();
})
.then(data => {
    const mascotaUsDiv = document.getElementById('mascotaUs');
    data.forEach(item => {
        if (item.mascotaU) {
            const mascotaU = item.mascotaU;
            const mascotaUDiv = document.createElement('div');
            mascotaUDiv.className = 'mascotaU';
            mascotaUDiv.innerHTML = `
                <img src="${mascotaU.foto}" alt="${mascotaU.Titulo}" class="mascotaU-img" style="cursor: pointer;">
            `;

            const imgElement = mascotaUDiv.querySelector('.mascotaU-img');
            imgElement.addEventListener('click', () => {
                openModal(mascotaU.foto, mascotaU.Titulo);
            });

            mascotaUsDiv.appendChild(mascotaUDiv); // Agregar aquí
        } else {
            console.error('La propiedad "mascotaU" no está definida en uno de los elementos');
        }
    });
})
.catch(error => console.error('Error al cargar los datos:', error));

function openModal(imageSrc, titulo) {
const modal = document.createElement('div');
modal.className = 'modal';
modal.innerHTML = `
    <span class="close" onclick="this.parentElement.remove()">&times;</span>
    <img class="modal-content" src="${imageSrc}"alt="${titulo}">
    <h2 class="modal-content">${titulo}</h2>
`;
modal.addEventListener('click', () => modal.remove()); // Cerrar al hacer clic fuera
document.body.appendChild(modal);
}

const style = document.createElement('style');
style.innerHTML = `
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
img {
    border: 3px solid rgba(255, 255, 255, 0.7);
    background: linear-gradient(to right, rgb(1, 4, 50), rgb(40, 0, 77));
}
.modal img {
    box-shadow: 0 1px 15px rgb(140, 0, 255);
    border: 3px solid rgba(255, 255, 255, 0.7);
}
h2 {
    color:white;
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
