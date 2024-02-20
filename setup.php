<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    // Redirect to the login page if not logged in
    header("Location: login2.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      *{
        color: green;
        background-color: black;
        border-width:2px;
        border-color: darkgreen;
      }
      ::placeholder {
      color: green;
      opacity: 1; /* Firefox */
      }

      :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: green;
      }

      ::-ms-input-placeholder { /* Microsoft Edge */
      color: green;
      }
      fieldset{
      font-family: monospace;
      }
    </style>
  </head>
  <body>
    <input placeholder="Insert main URL"><br>
    <input id="user" placeholder="Insert username"><br>
    <input id="pass" type="password" placeholder="Insert password"><br>
    <button onclick="setup();">Set up hook and login!</button>
    <script>
      function setup(){
        var mainURL = document.querySelector("input").value;
        var username = document.querySelector("#user").value;
        var password = document.querySelector("#pass").value;
        console.log("setupHook.php?mainUrl=" + btoa(mainURL) + "&username=" + btoa(username) + "&password=" + btoa(password));
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            alert("Hook set up! Use the hook js to get the hook code!");
          }
        };
        xhttp.open("GET", "setupHook.php?mainUrl=" + btoa(mainURL) + "&username=" + btoa(username) + "&password=" + btoa(password), true);
        xhttp.send();
      }
        let text = "Base URL detected! Click OK to autofill, or cancel to not.";
        if (confirm(text) == true) {
          document.querySelector("input").value = location.origin + "/";
        }
    </script>
  </body>
</html>