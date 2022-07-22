<html> 
<head> 
<title>Quote of the Day</title> 
<!-- modified from: http://javascript.internet.com/miscellaneous/simple-text-rotate.html --> 

<style type="text/css"> 
  #QOD { font-weight: bold; font-size: 1.5em; color: #ff0000; } 
</style> 

<script type="text/javascript"> 
var QofD = new Array( 
  'If it ain\'t broke. Get a bigger hammer.',  
  'Change is inevitable; progress is optional.', 
  'Do not attribute any action to malice that can be explained by stupidity.', 
  'The box said "Requires Windows 95, NT, or better", so I installed Linux.', 
  'You never get too old to learn a new way of being stupid!', 
  'If at first you don\'t succeed, you\'re running about average.', 
  'Mind over Matter: If you don\'t mind, it don\'t matter.', 
''); 

function setQofD() { 
  var r = Math.floor(Math.random()*(QofD.length-1)); 
  document.getElementById('QOD').innerHTML = QofD[r]; 
} 
</script> 

</head> 
<body onLoad="setQofD()"> 
<strong>Quote of the Day:</strong> <span id="QOD"></span> 
<br /> 
</body> 
</html>  