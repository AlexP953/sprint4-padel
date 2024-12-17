
window.getInfo = function (info) {
    console.log(info);
};



// Logout
window.logout = function () {
    fetch("/logout", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json",
        },
    })
        .then((response) => {
            if (response.ok) {
                window.location.href = "/login";
            }
        })
        .catch((error) => console.error("Error en el logout:", error));
};

// Modal
window.showModal = function (title, message, buttons, reservationId = null) {
    const modal = document.getElementById("modal");
    const modalBody = document.getElementById("modalBody");
    const modalTitle = document.getElementById("modalTitle");
    const buttonsContainer = document.getElementById("buttonsContainer");
    const closeModalButton = document.getElementById("closeModal");

    const closeModal = () => modal.classList.add("hidden");

    modalTitle.textContent = title;
    modalBody.textContent = message;
    buttonsContainer.innerHTML = "";

    buttons.forEach(button => {
        const btn = document.createElement("button");
        btn.textContent = button.text;
        btn.className = `px-4 py-2 ${button.class} rounded hover:bg-opacity-80 focus:outline-none`;
        btn.addEventListener("click", () => {
            if (button.action === "delete") {
                deleteReservation(reservationId);
            }
            closeModal();
        });
        buttonsContainer.appendChild(btn);
    });

    closeModalButton.addEventListener("click", closeModal);
    modal.classList.remove("hidden");
};

// Eliminar una reserva
window.deleteReservation = function (reservationId) {
    fetch(`/reservations/${reservationId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success === true) {
            showModal("Reserva eliminada", "Reserva eliminada correctamente", [], null);
            window.location.reload();
        } else {
            showModal("Error", "Hubo un error al eliminar la reserva.", [], null);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showModal("Error", "Hubo un error al eliminar la reserva.", [], null);
    });
};

// Modal de eliminación
window.openDeleteModal = function (reservationId) {
    showModal(
        "Confirmación de eliminación",
        "¿Estás seguro de que deseas eliminar esta reserva?",
        [
            { text: "Eliminar", class: "bg-red-400", action: "delete" },
            { text: "Cancelar", class: "bg-gray-400", action: "cancel" },
        ],
        reservationId
    );
};

window.formHandler = function() {
    return {
        isDirty: false,
        init() {
            const inputs = this.$el.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    this.isDirty = Array.from(inputs).some(input => input.value !== input.defaultValue);
                });
            });
        }
    }
}