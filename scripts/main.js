function failedLoginWarning() {
  loginForm = document.form.login;
  warning = document.createElement("span");
  warning.textContent = "*Username or password was wrong please try again.*";
  warning.setAttribute("class", "warningText");
  loginForm.appendChild(warning);
}

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

function resetRedStyledInputs(formElements) {
  for (let i = 0; i < formElements.length; i++) {
    if (formElements[i].style.borderColor == "red") {
      formElements[i].style.borderColor = null;
    }
  }
}

function validateDiscussion() {
  let form = document.forms.discussion;
  let errorMessages = [];
  let inputs = form.elements;
  resetRedStyledInputs(inputs);

  if (form.post_message.value.trim().length == 0) {
    errorMessages.push("Invalid comment, cant be empty");
    form.post_message.style.borderColor = "Red";
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

function validateLogin() {
  let form = document.forms.login;
  let errorMessages = [];
  let inputs = form.elements;
  resetRedStyledInputs(inputs);

  if (form.username_login.value.trim().length == 0) {
    errorMessages.push("Invalid username, is required");
    form.username_login.style.borderColor = "Red";
  }

  if (form.pass_login.value.trim().length == 0) {
    errorMessages.push("Invalid password, is required");
    form.pass_login.style.borderColor = "Red";
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

function validateNewMovie() {
  let form = document.add_new_movie;
  let errorMessages = [];
  let inputs = form.elements;
  resetRedStyledInputs(inputs);

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

function validateMemberProfileUpdate() {
  let form = document.update;
  let errorMessages = [];
  let inputs = form.elements;
  resetRedStyledInputs(inputs);

  if (form.pass.value.trim().length == 0) {
    errorMessages.push("Invalid password, is required");
    form.pass.style.borderColor = "Red";
  } else if (form.pass.value.trim().length < 5) {
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

function validateMemberRegistration() {
  let form = document.register;
  let errorMessages = [];
  let inputs = form.elements;
  resetRedStyledInputs(inputs);

  if (form.username.value.trim().length == 0) {
    errorMessages.push("Invalid username, is required");
    form.username.style.borderColor = "Red";
  }

  if (form.pass.value.trim().length == 0) {
    errorMessages.push("Invalid password, is required");
    form.pass.style.borderColor = "Red";
  } else if (form.pass.value.trim().length < 5) {
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

function confirmDelete() {
  return confirm(
    "Are you sure you wish to delete this movie?\nDoing so will delete discussions and ratings associated"
  );
}

function loadImage(event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
}

const favouriteApis = {
  async updateFavourite(movie_id, user_id) {
    var url = "../member/add_favourite.php";
    var formData = new FormData();
    formData.append("u_id", user_id);
    formData.append("m_id", movie_id);

    let data = await fetch(url, { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        return data;
      })
      .catch((err) => {
        console.error("Error: ", err);
      });

    console.log(data);
    window.location.reload();
  },
  async removeFavourite(user_id) {
    var url = "../member/remove_favourite.php";
    var formData = new FormData();
    formData.append("u_id", user_id);

    let data = await fetch(url, { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        return data;
      })
      .catch((err) => {
        console.error("Error: ", err);
      });

    console.log(data);
    window.location.reload();
  },
};

const profileApis = {
  async promoteToAdmin(user_id) {
    var url = "../admin/promote_member.php";
    var formData = new FormData();
    formData.append("u_id", user_id);

    let data = await fetch(url, { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        return data;
      })
      .catch((err) => {
        console.error("Error: ", err);
      });

    console.log(data);
    window.location.reload();
  },
  async demoteToMember(user_id, admin_count) {
    var url = "../admin/demote_admin.php";
    var formData = new FormData();
    formData.append("u_id", user_id);

    if (admin_count <= 1) {
      alert(
        "Unable to demote this user to member. Need at least a minium of 1 admin at all times."
      );
      return false;
    }

    let data = await fetch(url, { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        return data;
      })
      .catch((err) => {
        console.error("Error: ", err);
      });

    console.log(data);
    window.location.reload();
  },
};

const votingApis = {
  async upvote(discussion_id, user_id) {
    var url = "../member/up_vote.php";
    var formData = new FormData();
    formData.append("d_id", discussion_id);
    formData.append("u_id", user_id);

    let data = await fetch(url, { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        return data;
      })
      .catch((err) => {
        console.error("Error: ", err);
      });

    console.log(data);
    window.location.reload();
  },
  async withdrawVote(discussion_id, user_id) {
    var url = "../member/withdraw_vote.php";
    var formData = new FormData();
    formData.append("d_id", discussion_id);
    formData.append("u_id", user_id);

    let data = await fetch(url, { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        return data;
      })
      .catch((err) => {
        console.error("Error: ", err);
      });

    console.log(data);
    window.location.reload();
  },
};