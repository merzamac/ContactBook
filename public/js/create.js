const CONFIG = {
    campos: [
        { id: "cedula", label: "Cédula", tipo: "text", class: "input-group" },
        { id: "nombre", label: "Nombre", tipo: "text", class: "input-group" },
        {
            id: "apellido",
            label: "Apellido",
            tipo: "text",
            class: "input-group",
        },
        {
            id: "edad",
            label: "Edad",
            tipo: "number",
            min: 15,
            max: 90,
            class: "input-group",
        },
        {
            id: "genero",
            label: "Género",
            tipo: "select",
            opciones: ["femenino", "masculino", "otros"],
            class: "input-group",
        },
        {
            id: "telefono",
            label: "Teléfono (Formato: 0000-0000000)",
            tipo: "text",
            class: "input-group",
        },
        {
            id: "correo",
            label: "Correo Electrónico",
            tipo: "email",
            class: "input-group",
        },
        {
            id: "estado_civil",
            label: "Estado Civil",
            tipo: "select",
            opciones: [
                "soltero",
                "casado",
                "divorciado",
                "concubinato",
                "viudo",
            ],
            class: "input-group",
        },
        {
            id: "direccion",
            label: "Dirección",
            tipo: "text",
            full: true,
            class: "input-group",
        },
        {
            id: "departamento",
            label: "Departamento",
            tipo: "text",
            class: "input-group",
        },
        { id: "cargo", label: "Cargo", tipo: "text", class: "input-group" },
    ],
};

function renderForm() {
    const contenedor = document.getElementById("contenedor-flex");
    if (!contenedor) return;

    CONFIG.campos.forEach((c) => {
        const div = document.createElement("div");
        div.className = c.full ? "form-group col-12" : "form-group col-md-6";

        let inputHTML = "";
        if (c.tipo === "select") {
            inputHTML = `<select name="${c.id}" id="${c.id}" class="form-control" required>
                <option value="">Seleccione...</option>
                ${c.opciones.map((o) => `<option value="${o}">${o}</option>`).join("")}
            </select>`;
        } else {
            inputHTML = `<input type="${c.tipo}" name="${c.id}" id="${c.id}" class="form-control" 
                ${c.min ? `min="${c.min}"` : ""} ${c.max ? `max="${c.max}"` : ""} required>`;
        }

        div.innerHTML = `<label class="form-label">${c.label}</label>${inputHTML}`;
        contenedor.appendChild(div);
    });
}

// VERIFICACIÓN ANTES DE ENVIAR A LARAVEL
document.getElementById("form-dinamico").onsubmit = function (e) {
    const edad = document.getElementById("edad").value;
    const telefono = document.getElementById("telefono").value;
    const regexTel = /^[0-9]{4}-[0-9]{7}$/;

    // 1. Validar Edad (15 a 90 según taller 3)
    if (edad < 15 || edad > 90) {
        e.preventDefault();
        return alert("La edad debe estar entre 15 y 90 años.");
    }

    // 2. Validar Formato Teléfono
    if (!regexTel.test(telefono)) {
        e.preventDefault();
        return alert("Formato de teléfono inválido. Use: 0000-0000000");
    }

    // Si pasa, Laravel recibirá el POST normalmente
};

document.addEventListener("DOMContentLoaded", renderForm);
