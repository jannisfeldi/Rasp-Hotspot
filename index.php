<!DOCTYPE html>
<html>
<head>
	<title>Webinterface</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="flexbox">
    
        Hotspot<br>
        <span class="label-text">Lädt...</span><span class="label-text"></span>
        <label class="toggle">
        <input type="checkbox">
        <span class="slider"></span>
        </label>
        </div>

		<div class="flexbox">Verbundene Geräte<br>&nbsp;<br>&nbsp;<br>
    soon</div>

		<div class="flexbox">Statistiken<br>&nbsp;<br>&nbsp;<br>
    <span class="totalRX">Total Download: </span><br>&nbsp;
    <span class="totalTX">Total Upload:</span>
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
