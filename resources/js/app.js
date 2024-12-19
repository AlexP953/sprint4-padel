window.getInfo = function (info) {
    console.log(info);
};

// Logout
window.logout = function () {
    fetch("/logout", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
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
window.showModal = function (title, message, buttons = [], id = null) {

    if (!Array.isArray(buttons)) {
        console.error("El parámetro buttons no es un array válido.");
        buttons = [];
    }

    const modal = document.getElementById("modal");
    const modalBody = document.getElementById("modalBody");
    const modalTitle = document.getElementById("modalTitle");
    const buttonsContainer = document.getElementById("buttonsContainer");
    const closeModalButton = document.getElementById("closeModal");

    const closeModal = () => modal.classList.add("hidden");

    modalTitle.textContent = title;
    modalBody.textContent = message;
    buttonsContainer.innerHTML = "";

    buttons.forEach((button) => {
        const btn = document.createElement("button");
        btn.textContent = button.text;
        btn.className = `px-4 py-2 ${button.class} rounded hover:bg-opacity-80 focus:outline-none`;
        btn.addEventListener("click", () => {
            if (button.action === "deleteReservation") {
                deleteElement("reservation", id);
            } else {
                deleteElement("court", id);
            }
            closeModal();
        });
        buttonsContainer.appendChild(btn);
    });

    closeModalButton.addEventListener("click", closeModal);
    modal.classList.remove("hidden");
};

// Eliminar una reserva
window.deleteElement = function (table, id) {
    let fetchTo; let element;
    if(table === 'reservation') {
        fetchTo = `/reservations/${id}`;
        element = "Reserva";
    } else {
        fetchTo = `/courts/${id}`
        element = 'Pista';
    }

    fetch(`${fetchTo}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success === true) {
                showModal(`${element} eliminada`,`${element} eliminada correctamente`,[]);
                window.location.reload();
            } else {
                showModal("Error",data.message,[]);
            }
        })
        .catch((error) => {
            console.log('aquioi');
            console.error("Error:", error);
            showModal("Error", "Hubo un error", [], null);
        });
};

// Modal de eliminación
window.openDeleteModal = function (type, id) {
    let newAction = type === "reservation" ? "deleteReservation" : "deleteCourt";
    showModal(
        "Confirmación de eliminación",
        "¿Estás seguro de que deseas eliminarlo?",
        [
            { text: "Eliminar", class: "bg-red-400", action: newAction },
            { text: "Cancelar", class: "bg-gray-400", action: "cancel" },
        ],
        id
    );
};

window.formHandler = function () {
    return {
        isDirty: false,
        init() {
            const inputs = this.$el.querySelectorAll("input");
            inputs.forEach((input) => {
                input.addEventListener("input", () => {
                    this.isDirty = Array.from(inputs).some(
                        (input) => input.value !== input.defaultValue
                    );
                });
            });
        },
    };
};

// admin panel change tabs
document.addEventListener("DOMContentLoaded", function () {
    window.setActiveTab = function (tab) {
        document
            .querySelectorAll(".tab-content")
            .forEach((content) => content.classList.add("hidden"));
        document
            .querySelectorAll("button")
            .forEach((button) => button.classList.remove("active-tab"));
        document.getElementById("content-" + tab).classList.remove("hidden");

        document.getElementById("tab-" + tab).classList.add("active-tab");
    };

    setActiveTab("reservas");
});

window.openCreateCourtModal = function () {
    document.getElementById("createModal").classList.remove("hidden");
};

window.closeModal = function () {
    document.getElementById("createModal").classList.add("hidden");
};
