const form = document.getElementById("form");
const registerBtn = document.getElementById("register-btn");

const modal = document.getElementById("modal");
const modalHeading = document.getElementById("modal-heading");
const modalBody = document.getElementById("modal-body");
const modalBtn = document.getElementById("modal-btn");


async function register() {
    const formData = new FormData(form);

    try {
        const response = await fetch("/api/register", {
            method: "POST",
            body: formData
        });

        if (!response.ok && response.status === 404) {
            throw new Error("Response not successfull. Server Problem.")
        }

        const data = await response.json();

        if (!response.ok && response.status === 409 && data.error === "email") {
            
            setModal([
                data.message,
                "Redirect to the login page to login with your e-mail adress.",
                "Redirect",
                openAndRedirect,
            ]);
        }

        if (response.ok && response.status === 201) {
            console.log("yes");
            redirect("/");
        }

        if (!response.ok && response.status === 409 && data.error === "username") {
            redirect("/register");
        }
    }

    catch (error) {

        setModal([
            "System error",
            `${error} Please try again later.`,
            "Okay",
            openAndHide,
        ]);
    };
}


registerBtn.addEventListener("click", (e) => {
    e.preventDefault();

    register();
})





//functions
function setModal([heading, body, btn, fctn]) {
    modalHeading.innerText = heading;
    modalBody.innerText = body
    modalBtn.innerHTML = btn

    modalBtn.addEventListener("click", fctn);
    modal.style.display = "block";

    return;
}

function openAndHide(e) {
    e.preventDefault();
    modal.style.display = "none";
    modalBtn.removeEventListener("click", openAndHide)
}

function openAndRedirect(e) {
    e.preventDefault();
    redirect("/login");
}

function redirect(path) {
    window.location.href = path;
    return;
}







