// 1. Definición de la estructura del formulario
const CONFIG = {
    campos: [
        { id: "cedula", label: "Cédula", tipo: "text" },
        { id: "nombre", label: "Nombre", tipo: "text" },
        { id: "apellido", label: "Apellido", tipo: "text" },
        { id: "edad", label: "Edad", tipo: "number", min: 16, max: 89 },
        {
            id: "genero",
            label: "Género",
            tipo: "select",
            opciones: ["femenino", "masculino", "otros"],
        },
        {
            id: "telefono",
            label: "Teléfonos (máx 2, sep. por coma)",
            tipo: "text",
            hint: "Formato: 0000-0000000",
        },
        { id: "correo", label: "Correos (máx 2, sep. por coma)", tipo: "text" },
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
        },
        { id: "direccion", label: "Dirección", tipo: "text", full: true },
        { id: "departamento", label: "Departamento", tipo: "text" },
        { id: "cargo", label: "Cargo", tipo: "text" },
    ],
};

// Variable global para almacenar los contactos temporalmente
let db_contactos = [];

// 2. FUNCIÓN PARA RENDERIZAR EL FORMULARIO VACÍO
function renderForm() {
    const contenedor = document.getElementById("contenedor-flex");
    if (!contenedor) return;

    contenedor.innerHTML = ""; // Limpiar contenedor

    CONFIG.campos.forEach((c) => {
        const div = document.createElement("div");
        div.className = c.full ? "form-group full" : "form-group";

        let inputHTML = "";
        if (c.tipo === "select") {
            inputHTML = `
                <select id="${c.id}" name="${c.id}" required>
                    <option value="" disabled selected>Seleccione...</option>
                    ${c.opciones.map((o) => `<option value="${o}">${o}</option>`).join("")}
                </select>`;
        } else {
            inputHTML = `
                <input type="${c.tipo}" id="${c.id}" name="${c.id}" 
                ${c.min ? `min="${c.min}"` : ""} 
                ${c.max ? `max="${c.max}"` : ""} 
                placeholder="Ingrese ${c.label.toLowerCase()}" required>`;
        }

        div.innerHTML = `
            <label for="${c.id}">${c.label}</label>
            ${inputHTML}
            ${c.hint ? `<span class="hint">${c.hint}</span>` : ""}
        `;
        contenedor.appendChild(div);
    });
}

// 3. LÓGICA DE REGISTRO Y VALIDACIÓN
document.getElementById("form-dinamico").onsubmit = async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const rawData = Object.fromEntries(formData.entries());

    // Validar Teléfonos (Convertir a array y limpiar espacios)
    const tels = rawData.telefono
        .split(",")
        .map((s) => s.trim())
        .filter((s) => s);
    // Validar Correos (Convertir a array y limpiar espacios)
    const mails = rawData.correo
        .split(",")
        .map((s) => s.trim())
        .filter((s) => s);

    // REGLA: Máximo 2 teléfonos y 2 correos
    if (tels.length > 2 || mails.length > 2) {
        return alert("Error: Solo se permiten máximo 2 teléfonos y 2 correos.");
    }

    // REGLA: Formato de teléfono 0000-0000000
    const regexTel = /^[0-9]{4}-[0-9]{7}$/;
    if (!tels.every((t) => regexTel.test(t))) {
        return alert("Error: El formato de teléfono debe ser 0000-0000000");
    }

    // REGLA: Cédula única
    const existe = db_contactos.some((p) => p.cedula === rawData.cedula);
    if (existe) {
        return alert("Error: Ya existe un usuario con esta cédula.");
    }

    // Crear objeto final
    const nuevoUsuario = {
        ...rawData,
        telefono: tels,
        correo: mails,
        edad: parseInt(rawData.edad),
    };

    // Agregar a la "base de datos" local
    db_contactos.push(nuevoUsuario);

    // 4. GUARDAR EN ARCHIVO FÍSICO (Opcional, según Taller 2)
    try {
        const handle = await window.showSaveFilePicker({
            suggestedName: "personas.json",
            types: [
                {
                    description: "JSON",
                    accept: { "application/json": [".json"] },
                },
            ],
        });
        const writable = await handle.createWritable();
        await writable.write(
            JSON.stringify({ contactos: db_contactos }, null, 2),
        );
        await writable.close();
        alert("Usuario registrado y archivo guardado con éxito.");
        this.reset(); // Limpiar formulario tras éxito
    } catch (err) {
        console.log("Guardado cancelado o error de permisos.");
    }
};

// Iniciar el formulario al cargar la página
document.addEventListener("DOMContentLoaded", renderForm);
