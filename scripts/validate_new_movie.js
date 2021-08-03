function validateNewMovie() {
  let form = document.add_new_movie;
  let errorMessages = [];
    
  if (form.movie_name.value.trim().length == 0) {
    errorMessages.push("Invalid movie name, is required");
    form.movie_name.style.borderColor = "Red";
  }

  if (form.year.value.trim().length == 0) {
    errorMessages.push("Invalid year, is required");
    form.year.style.borderColor = "Red";
  }

  if (form.director.value.trim().length == 0) {
    errorMessages.push("Invalid director, is required");
    form.director.style.borderColor = "Red";
  }

  if (form.writers.value.trim().length == 0) {
    errorMessages.push("Invalid writers, is required");
    form.writers.style.borderColor = "Red";
  }

  if (form.duration.value.trim().length == 0) {
    errorMessages.push("Invalid duration, is required");
    form.duration.style.borderColor = "Red";
  }

  if (errorMessages.length > 0) {
    let message = "Failed to validate data, please review the following:\n";
    errorMessages.forEach((item, i, a) => {
      message += "\u2022 " + item + "\n";
    });
    alert(message);
    return false;
  }

  return true;
}
