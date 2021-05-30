<?php
http_response_code(403);

$servername='localhost';

$username='root';

$password='';

$dbname='covid';

$conn = mysqli_connect($servername,$username,$password,$dbname);

return 1;

?>