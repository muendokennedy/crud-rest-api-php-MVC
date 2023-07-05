const deleteMoodle = document.getElementById("moodle-delete");

const deleteBtn = document.getElementById("default");

const cancelBtn = document.getElementById("cancel");

const defaultMoodle = document.querySelector(".button-default");

const formPublish = document.getElementById("publish-form");
const createMessage = document.getElementById("error");
const formUpdate = document.getElementById("update-form");


deleteBtn.onclick = () => {
  deleteMoodle.classList.add("show");
  defaultMoodle.style.display = "none";
}

cancelBtn.onclick = () => {
  deleteMoodle.classList.remove("show");
  defaultMoodle.style.display = "flex";
}

