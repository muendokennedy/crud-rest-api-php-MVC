const deleteMoodle = document.getElementById("moodle-delete");

const deleteBtn = document.getElementById("default");

const cancelBtn = document.getElementById("cancel");

const defaultMoodle = document.querySelector(".button-default");

deleteBtn.onclick = () => {
  console.log("Hello");
  deleteMoodle.classList.add("show");
  defaultMoodle.style.display = "none";
}

cancelBtn.onclick = () => {
  deleteMoodle.classList.remove("show");
  defaultMoodle.style.display = "flex";
}

