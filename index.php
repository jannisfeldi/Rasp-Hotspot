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
    toggleSwitch.addEventListener('change', function() {
      const action = this.checked ? 'on' : 'off';
      fetch('togglehotspot.php?action='+action'+', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'action=' + action
      }).then(function(response) {
        console.log('Toggle switch ' + action);
      }).catch(function(error) {
        console.error('Error toggling switch:', error);
      });
    });
  </script>
</body>
</html>
