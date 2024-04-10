<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>calcul numerique</title>
<link rel="stylesheet" href="reponse.css">
</head>

<header>

    <div class="header-container">
        <div class="header-links">
        	<a href="/Fonction">Acceuil</a>
        </div>
    </div>
</header>

<body>
<%String error = request.getParameter("error"); %>
<div class="head">
<p> <%=error%></p>
</div>
</body>
</html>