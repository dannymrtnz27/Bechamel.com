
const img = document.querySelector('img');
const hElement = document.querySelector('article svg');
const heartElement = document.querySelector('.heartli path');
const rebot = document.querySelector('.viewOpen');
const likeCountElement = document.querySelector('.like-count'); // Elemento donde mostrarás el contador

let isActive = false; // Variable para controlar el estado
let likeCount = 0; // Contador de likes

img.addEventListener('dblclick', () => {
    isActive = !isActive; // Cambiar el estado al hacer click
    if (isActive) {
        rebot.style.animation = 'viewRebot 1s running';
        hElement.style.animation = 'like 0.5s forwards';
        heartElement.style.animation = 'heart 0.5s forwards';
        
        likeCount++; // Incrementar el contador de likes
        likeCountElement.textContent = likeCount; // Actualizar el contador en la página
    } else {
        rebot.style.animation = '';
        hElement.style.animation = 'likeRebot 0.5s forwards'; // Detener la animación
        heartElement.style.animation = 'heartRebot 0.5s forwards'; 
    }
});

heartElement.addEventListener('click', () => {
    isActive = !isActive;
    if (isActive) {
        heartElement.style.animation = 'heart 0.5s forwards';
        hElement.style.animation = 'like 1.5s running';

        likeCount++; // Incrementar el contador de likes
        likeCountElement.textContent = likeCount; // Actualizar el contador en la página
    } else {
        heartElement.style.animation = '';
        hElement.style.animation = '';
    }
});

function showimg(){
    document.querySelector('.imgpopup').style.display = 'block';
}
function hideimg(){
    document.querySelector('.imgpopup').style.display = 'none';
}
function showtarjeta(){
    document.querySelector('.cuadrobehindu').style.display = 'block';
}
function hidetarjeta(){
    document.querySelector('.cuadrobehindu').style.display = 'none';
}
function showMessenger(){
    document.querySelector('.messenger').style.display = 'block';
    document.querySelector('.fab').style.display = 'block';
}
function hideMessenger(){
    document.querySelector('.messenger').style.display = 'none';
    document.querySelector('.fab').style.display = 'none';
}
function showGaleFo(){
    document.querySelector('.Galefotos').style.display = 'block';
    document.querySelector('.Galefotos').style.height = '115%';
}
function hideGaleFo(){
    document.querySelector('.Galefotos').style.display = 'none';
}
function showGaleVi(){
    document.querySelector('.Galevideos').style.display = 'block';
    document.querySelector('.Galevideos').style.height = '115%';
}
function hideGaleVi(){
    document.querySelector('.Galevideos').style.display = 'none';
}