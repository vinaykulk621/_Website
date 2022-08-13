function validateForm() {
  let x = document.forms["login"]["email"].value;
  if (x == "") {
    alert("Email-id must be filled out");
    return false;
  } else if (!x.endsWith("@bmsce.ac.in")) {
    alert("Please enter valid Email-id ending with '@bmsce.ac.in'");
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

function getCorrectGrade() {
  var mark = document.getElementById("total_mark");
  var grade = document.getElementById("_grade_");

  if (mark > 90) {
    grade.textContent='S';
  } else if (80 < mark <= 90) {
    grade.textContent='GK';
  } else if (70 < mark <= 80) {
    grade.textContent='B';
  } else if (60 < mark <= 70) {
    grade.textContent='C';
  } else if (50 < mark <= 60) {
    grade.textContent='D';
  } else if (40 < mark <= 50) {
    grade.textContent='E';
  } else {
    grade.textContent='F';
  }
}
