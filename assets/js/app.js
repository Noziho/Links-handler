import '../styles/style.scss';

const success = document.querySelector('.success');
const error = document.querySelector('.error');
const addLinksButton = document.querySelector('#addLinks');

if (success) {
    setTimeout(() => {
        success.remove();
    }, 3000);

    success.addEventListener("click",() => {
        success.remove();
    })
}

if (error) {
    setTimeout(() => {
        error.remove();
    }, 3000)

    error.addEventListener("click",() => {
        error.remove();
    })
}

addLinksButton.addEventListener('click', () => {
    let formAddLinks = document.querySelector('.formAddLinks');
    formAddLinks.classList.toggle('show');
})


