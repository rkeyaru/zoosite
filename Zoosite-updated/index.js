function showAnimals() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data").innerHTML = this.responseText;
      getCount();
    }
  };
  xhttp.open("GET", "getAnimals.php?=", true);
  xhttp.send();
}

function showUsers() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data").innerHTML = this.responseText;
      getCount();
    }
  };
  xhttp.open("GET", "getUsers.php?=", true);
  xhttp.send();
}

function showZoos() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data").innerHTML = this.responseText;
      getCount();
    }
  };
  xhttp.open("GET", "getZoos.php?=", true);
  xhttp.send();
}
function deleteData(clicked) {
  let id = clicked.slice(5);
  let val = "id=" + id;
  let result = confirm(val);

  if (result == true) {
    let xhttp;
    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data").innerHTML = this.responseText;
        zooCount();
      }
    };
    xhttp.open("POST", "getZoos.php?=", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(val);
  }
}

function deleteDataUsers(clicked) {
  let id = clicked.slice(5);
  let val = "id=" + id;
  let result = confirm("Do you really want to delete");

  if (result == true) {
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data").innerHTML = this.responseText;
        userCount();
      }
    };
    xhttp.open("POST", "getUsers.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(val);
  }
}

function deleteDataAnimals(clicked) {
  let id = clicked.slice(5);
  let val = "id=" + id;
  let result = confirm(val);

  if (result == true) {
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data").innerHTML = this.responseText;
        animalCount();
      }
    };
    xhttp.open("POST", "getAnimals.php?=", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(val);
  }
}

function updateZoo(clicked) {
  let ope = document.getElementById(clicked);

  let id = clicked.slice(6);

  let row = document.getElementById("row" + id);
  let cells = row.getElementsByTagName("td");
  let name = cells[1];
  let state = cells[2];
  let city = cells[3];
  let area = cells[4];

  if (ope.innerHTML == "Edit") {
    ope.innerHTML = "Confirm";
    name.contentEditable = true;
    state.contentEditable = true;
    city.contentEditable = true;
    area.contentEditable = true;
  } else {
    let val = "id=" + id;

    if (
      name.innerHTML.trim() == "" ||
      state.innerHTML.trim() == "" ||
      city.innerHTML.trim() == "" ||
      area.innerHTML.trim() == ""
    ) {
      alert("Fill all the entries");
      return;
    }

    area_val = Number(area.innerHTML);
    if (isNaN(area_val)) {
      alert("Invalid area");
      return;
    }
    let result = confirm("Confirm the Changes");

    if (result == true) {
      ope.innerHTML = "Edit";
      let xhttp;
      name.contentEditable = false;
      state.contentEditable = false;
      city.contentEditable = false;
      area.contentEditable = false;

      let val =
        "id=" +
        id +
        "&name=" +
        name.innerHTML.trim() +
        "&state=" +
        state.innerHTML.trim() +
        "&city=" +
        city.innerHTML.trim() +
        "&area=" +
        area.innerHTML.trim();
      console.log(val);
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("userUpdate").innerHTML = this.responseText;
        }
      };

      xhttp.open("POST", "updateZoo.php?=", true);
      xhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xhttp.send(val);
    }

    return;
  }
}

function updateUser(clicked) {
  let ope = document.getElementById(clicked);
  let id = clicked.slice(6);
  let row = document.getElementById("row" + id);
  let cells = row.getElementsByTagName("td");
  let fname = cells[1];
  let lname = cells[2];
  let email = cells[3];
  let password = cells[4];

  if (ope.innerHTML == "Edit") {
    ope.innerHTML = "Confirm";
    fname.contentEditable = true;
    lname.contentEditable = true;
    email.contentEditable = true;
    password.contentEditable = true;
  } else {
    let val = "id=" + id;
    if (
      fname.innerHTML.trim() == "" ||
      lname.innerHTML.trim() == "" ||
      email.innerHTML.trim() == "" ||
      password.innerHTML.trim() == ""
    ) {
      alert("Fill all the entries");
      return;
    }
    var validRegex =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!email.innerHTML.match(validRegex)) {
      alert("Enter a valid email");
      return;
    }

    let result = confirm("Confirm the Changes");

    if (result == true) {
      ope.innerHTML = "Edit";
      let xhttp;
      fname.contentEditable = false;
      lname.contentEditable = false;
      password.contentEditable = false;
      email.contentEditable = false;
      let val =
        "id=" +
        id +
        "&firstName=" +
        fname.innerHTML +
        "&lastName=" +
        lname.innerHTML +
        "&email=" +
        email.innerHTML +
        "&password=" +
        password.innerHTML;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("result").innerHTML = this.responseText;
        }
      };

      xhttp.open("POST", "updateUser.php?=", true);
      xhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xhttp.send(val);
    }

    return;
  }
}

function userCount() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("userCount").innerHTML =
        "User count:" + this.responseText;
    }
  };
  xhttp.open("GET", "usercount.php?=", true);
  xhttp.send();
}
function animalCount() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("animalCount").innerHTML =
        "Animal count:" + this.responseText;
    }
  };
  xhttp.open("GET", "animalcount.php?=", true);
  xhttp.send();
}
function zooCount() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("zooCount").innerHTML =
        "Zoo count:" + this.responseText;
    }
  };
  xhttp.open("GET", "zoocount.php?=", true);
  xhttp.send();
}
function getCount() {
  animalCount();
  userCount();
  zooCount();
}
function insertData() {
  let val =
    "firstName=" +
    document.getElementById("fname").value +
    "&lastName=" +
    document.getElementById("lname").value +
    "&password=" +
    document.getElementById("password").value +
    "&email=" +
    document.getElementById("email").value;
  console.log(val);
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
      showUsers();
      getCount();
    }
  };
  xhttp.open("POST", "insertUser.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(val);
}

function insertZoo() {
  if (
    document.getElementById("name").value.trim() == "" ||
    document.getElementById("state").value.trim() == "" ||
    document.getElementById("city").value.trim() == "" ||
    document.getElementById("area").value.trim() == ""
  ) {
    alert("Enter all fields");
  } else {
    let val =
      "name=" +
      document.getElementById("name").value +
      "&state=" +
      document.getElementById("state").value +
      "&city=" +
      document.getElementById("city").value +
      "&area=" +
      document.getElementById("area").value;
    

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("result").innerHTML = this.responseText;
        showZoos();
        getCount();
      }
    };
    xhttp.open("POST", "insertZoo.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(val);
  }
}

function insertAnimalData() {
  let male = document.getElementById("male").checked;
  let gender = "f";
  if (male == true) {
    gender = "m";
  }
  let val =
    "name=" +
    document.getElementById("name").value +
    "&gender=" +
    gender +
    "&zoo_id=" +
    document.getElementById("zooOptions").value +
    "&s_name=" +
    document.getElementById("s_name").value;
  console.log(val);

  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
      showAnimals();
      getCount();
    }
  };
  xhttp.open("POST", "insertAnimal.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(val);
}

function updateDataAnimals(clicked) {
  let ope = document.getElementById(clicked);

  let id = clicked.slice(6);

  let row = document.getElementById("row" + id);
  let cells = row.getElementsByTagName("td");
  let name = cells[1];
  let gender = cells[2];
  let sname = cells[3];
  let zoo = document.getElementById("zooOption" + id);

  if (ope.innerHTML == "Edit") {
    ope.innerHTML = "Confirm";
    name.contentEditable = true;
    gender.contentEditable = true;
    sname.contentEditable = true;
    zoo.disabled = false;
  } 
  
  
  
  else {
    
    if (name.innerHTML.trim() == "" || sname.innerHTML.trim() == "") {
      alert("Please enter all entries");
      return;
    }

    let result = confirm("Confirm the Changes");

    if (result == true) {
      ope.innerHTML = "Edit";
      let xhttp;
      name.contentEditable =  false;
      gender.contentEditable =  false;
      sname.contentEditable =  false;
      zoo.disabled = true;

      let val =
        "aid=" +
        id +
        "&zid=" +
        zoo.value +
        "&aname=" +
        name.innerHTML +
        "&sname=" +
        sname.innerHTML +
        "&gender=" +
        gender.innerHTML;

      console.log(val);
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("animalUpdate").innerHTML = this.responseText;
        }
      };

      xhttp.open("POST", "updateAnimalData.php?=", true);
      xhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xhttp.send(val);
    }

    return;
  }
}
