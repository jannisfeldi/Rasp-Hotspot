<!DOCTYPE html>
<html>
<head>
	<title>Webinterface</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="flexbox">
    
        <h2>Hotspot</h2><br><br><br>
        <span class="label-text">Lädt...</span><span class="label-text"></span><br>
        <label class="toggle">
        <input type="checkbox">
        <span class="slider"></span>
        </label>
        </div>

		<div class="flexbox">

        <h2>Verbundene geräte</h2><br><br><br>
        soon</div>

		<div class="flexbox">
        
        <h2>Statistiken</h2><h2 style="font-size:14px;">Daten Nutzung</h2>
    <span>Heruntergeladen: </span> <span id="totalRX">Lädt...</span><br>
    <span>Hochgeladen:</span> <span id="totalTX">Lädt...</span><br><br><h2 style="font-size:14px;">System Auslastung</h2>
    <span>Prozessor: </span> <span id="processor">Lädt...</span><br>
    <span>Arbeitsspeicher:</span> <span id="memory">Lädt...</span>
    </div>

		<div class="flexbox">Einstellungen</div>

    <div class="flexbox">Flexbox 5</div>

    <div class="flexbox">System</div>

	</div>

    <script>
    const toggleSwitch = document.querySelector('.toggle input');
    const label = document.querySelector('.label-text');

    function updateState() {
      fetch('getState.php?state=hotspot')
        .then(function(response) {
          return response.text();
        })
        .then(function(state) {
          if (state === 'on') {
            toggleSwitch.checked = true;
            label.textContent = 'An';
          } else {
            toggleSwitch.checked = false;
            label.textContent = 'Aus';
          }
        })
        .catch(function(error) {
          console.error('Error getting state:', error);
        });
    }
    function updateNetworkUsage() {
      // Get the span element by its ID
      const totalRX = document.getElementById("totalRX");
      const totalTX = document.getElementById("totalTX");

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
    }

    function updateSystem() {
      // Get the span element by its ID
      const processor = document.getElementById("processor");
      const memory = document.getElementById("memory");

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
    }
    // Update state every 5 seconds
    setInterval(updateState, 500);
    setInterval(updateNetworkUsage, 1000);
    setInterval(updateSystem, 1000);

    toggleSwitch.addEventListener('change', function(event) {
      event.preventDefault();
      
      const action = this.checked ? 'on' : 'off';
      fetch('togglehotspot.php?action=' + action)
        .then(function(response) {
          console.log('Toggle switch ' + action);
        })
        .catch(function(error) {
          console.error('Error toggling switch:', error);
        });
        updateState()
    });
  </script>
</body>
</html>
