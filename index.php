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
        
        <h2>Statistiken</h2><h2 style="font-size:14px;">Seit letztem Start</h2>
    <span>Heruntergeladen: </span> <span id="totalRX">Lädt...</span><br>
    <span> Hochgeladen:</span> <span id="totalTX">Lädt...</span>
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

    // Update state every 5 seconds
    setInterval(updateState, 500);

    toggleSwitch.addEventListener('change', function() {
      
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
