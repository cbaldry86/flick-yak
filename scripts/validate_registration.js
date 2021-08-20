function validateMemberRegistration() {
  let form = document.register;
  let errorMessages = [];
    
  if (form.username.value.trim().length == 0) {
    errorMessages.push("Invalid username, is required");
    form.username.style.borderColor = "Red";
  }

  if (form.pass.value.trim().length == 0) {
    errorMessages.push("Invalid password, is required");
    form.pass.style.borderColor = "Red";
  }else if (form.pass.value.trim().length < 5) {
    errorMessages.push("Invalid password, too small");
    form.pass.style.borderColor = "Red";
  }

  if (form.pass.value != form.confirm_pass.value) {
    errorMessages.push("Confirmation password does not match");
    form.confirm_pass.style.borderColor = "Red";
  }

  if (form.email.value.trim().length == 0) {
    errorMessages.push("Invalid email, is required");
    form.email.style.borderColor = "Red";
  } else if (!form.email.value.includes("@")) {
    errorMessages.push("Invalid email");
    form.email.style.borderColor = "Red";
  }

  if (!form.dob.value) {
    errorMessages.push("Invalid date");
    form.dob.style.borderColor = "Red";
  } else {
    let today = new Date();
    let dob = new Date();
    let dobArr = form.dob.value.split("-");
    dob.setFullYear(dobArr[0], dobArr[1], dobArr[2]);    
    let diff = today.getFullYear() - dob.getFullYear();

    if (diff < 14) {
      errorMessages.push("Invalid date, too young");
      form.dob.style.borderColor = "Red";
    }
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
