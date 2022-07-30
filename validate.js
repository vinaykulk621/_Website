function validateForm() {
  let x = document.forms["login"]["email"].value;
  if (x == "") {
    alert("Email-id must be filled out");
    return false;
  } else if (!x.endsWith("@bmsce.ac.in")) {
    alert("Please enter valid Email-id ending with '@bmsce.ac.in'");
    return false;
  }

  let te = document.forms["login"]["username"].value;
  if (te == "") {
    alert("Username must be filled out");
    return false;
  }

  let y = document.forms["login"]["password"].value;
  let l = y.length;
  if (l < 6) {
    alert("Password must contain atleast 6 characters!");
    return false;
  }
  if (!y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Upper case character!\nPassword must contain atleast one Lower case character!\nPassword must contain atleast one Numeric character!"
    );
    return false;
  }
  if (y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Lower case character!\nPassword must contain atleast one Numeric character!"
    );
    return false;
  }
  if (!y.match(/[A-Z]/g) && y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Upper case character!\nPassword must contain atleast one Numeric character!"
    );
    return false;
  }
  if (!y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Upper case character!\nPassword must contain atleast one Lower case character!"
    );
    return false;
  }
  if (!y.match(/[A-Z]/g) && y.match(/[a-z]/g) && y.match(/[0-9]/g)) {
    alert("Password must contain atleast one Upper case character!");
    return false;
  }
  if (y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && y.match(/[0-9]/g)) {
    alert("Password must contain atleast one Lower case character!");
    return false;
  }
  if (y.match(/[A-Z]/g) && y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert("Password must contain atleast one Numeric character!");
    return false;
  } else if (!y.match(/[!-/]/g)) {
    alert("Password must contain atleast one Special character!");
    return false;
  }
}
