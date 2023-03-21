<!DOCTYPE html>
<html>
<head>
	<title>PiAccess Interface</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="flexbox">
    
        <h2>Welcome</h2><br><br>
        <a>
          This is the PiAccess Interface.
          You can set and setting for the WiFi 
          and control it completly from here.
          You are also able to see Statistics about the System and Network.
        </a>

        </div>

		<div class="flexbox">

        <h2>Connected devices</h2><br><br><br>
        <span id="connecteddevices"></span>
      
      
        </div>

		<div class="flexbox">
        
        <h2>Statistics</h2><h2 style="font-size:14px;">Data Usage</h2><span>Downloaded: </span> <span id="totalRX">Loading...</span><br>
    <span>Uploaded:</span> <span id="totalTX">Loading...</span><br><span>Now: </span> <span id="bandwidth">Loading...</span><br><br>

    </div>

		<div class="flexbox">
      
        <h2>Setting</h2><br>
        <form action="networkManager.php" method="GET">
      <label for="input-box">Network Name:</label>
      <input name="netname" type="text" id="input-box network-name" placeholder="Network Name">
      <label for="input-box">Network Password:</label>
      <input name="netpswd" type="password" id="input-box network-password"" placeholder="Network Password">
      <button type="submit" class="button-green">Save Changes & Restart Network</button>
    </form>
    
    </div>

    <div class="flexbox">
      
    <h2>System Statistics</h2><br><br>
    <span>Processor: </span> <span id="processor">Loading...</span><br>
    <span>Memory:</span> <span id="memory">Loading...</span><br>
    <span>Temprature:</span> <span id="temp">Loading...</span>
    </div>

    <div class="flexbox">
      
    <h2>System</h2><br><br><br>

    <button class="button-green">Restart</button><br>
    <button onclick='window.location.href = "shutdown.php";' class="button-red">Shutdown</button>
    </div>

	</div>

    <script>
    function updateNetworkUsage() {
      // Get the span element by its ID
      const totalRX = document.getElementById("totalRX");
      const totalTX = document.getElementById("totalTX");
      const bandwidth = document.getElementById("bandwidth");
      const connectedDevices = document.getElementById("connecteddevices");

      // Make an HTTP request to the API
      fetch("getNetworkUsage.php?type=download")
        .then(response => response.text())
        .then(data => {
          // Update the text of the span element with the response data
          totalRX.textContent = data;
        })
        .catch(error => {
          console.error("Error fetching network usage data:", error);
       });
       fetch("getNetworkUsage.php?type=upload")
        .then(response => response.text())
        .then(data => {
          // Update the text of the span element with the response data
          totalTX.textContent = data;
        })
        .catch(error => {
          console.error("Error fetching network usage data:", error);
       });
       fetch("getTroughput.php")
        .then(response => response.text())
        .then(data => {
          // Update the text of the span element with the response data
          bandwidth.textContent = data;
        })
        .catch(error => {
          console.error("Error fetching network usage data:", error);
       });
       fetch("states/connectedDevices.state")
        .then(response => response.text())
        .then(data => {
          // Update the text of the span element with the response data
          connectedDevices.textContent = data;
        })
        .catch(error => {
          console.error("Error fetching network usage data:", error);
       });
    }

    function updateSystem() {
      // Get the span element by its ID
      const processor = document.getElementById("processor");
      const memory = document.getElementById("memory");
      const temp = document.getElementById("temp");

      // Make an HTTP request to the API
      fetch("getCpuUsage.php")
        .then(response => response.text())
        .then(data => {
          // Update the text of the span element with the response data
          processor.textContent = data + "%";
        })
        .catch(error => {
          console.error("Error fetching cpu data:", error);
       });
       fetch("getMemoryUsage.php")
        .then(response => response.text())
        .then(data => {
          // Update the text of the span element with the response data
          memory.textContent = data + " / 4000M";
        })
        .catch(error => {
          console.error("Error fetching memory data:", error);
       });
       fetch("getCpuTemp.php")
        .then(response => response.text())
        .then(data => {
          // Update the text of the span element with the response data
          temp.textContent = data;
        })
        .catch(error => {
          console.error("Error fetching memory data:", error);
       });
    }
    // Update state every 5 seconds
    setInterval(updateNetworkUsage, 2000);
    setInterval(updateSystem, 2000);
  </script>
</body>
</html>
