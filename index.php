<!DOCTYPE html>
<html>
<head>
	<title>Webinterface</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="flexbox">
        <label class="toggle">
        <input type="checkbox">
        <span class="slider"></span>
        </label>
  <span class="label-text">Toggle Hotspot</span></div>
		<div class="flexbox">Flexbox 2</div>
		<div class="flexbox">Flexbox 3</div>
		<div class="flexbox">Flexbox 4</div>
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
            label.textContent = 'Hotspot is on';
          } else {
            toggleSwitch.checked = false;
            label.textContent = 'Hotspot is off';
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
