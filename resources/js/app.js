window.logout = function() {
  fetch('/logout', {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Content-Type': 'application/json',
    },
})
.then(response => {
    if (response.ok) {
        window.location.href = '/login';
    }
})
.catch(error => console.error('Error en el logout:', error));
};

window.getInfo = function(info) {
  console.log(info)
}