<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
	<style>
	.header {
		background: #008CBA;
	}
	button[name=register_btn] {
		background: #008CBA;
	}
	body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #008CBA;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

	</style>
</head>
<body>
	
	</div>
	<div class="sidebar">
  <strong><a class="active" href="admin.php">Home</a></strong>
  <strong><a href="user_details.php">Manage User </a></strong>
  
</div>
	
</body>
</html>