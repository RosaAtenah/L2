<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="reponse.css">
</head>
<body>
<header>

    <div class="header-container">
        <div class="header-links">
        	<a href="/Fonction">Acceuil</a>
        </div>
    </div>
</header>

	<%

String f = request.getParameter("f");
String x = request.getParameter("x");
String result = request.getParameter("result");

%>
<div class="head">

<br>
<h1>Valeur de f : <%= f %></h1>
<h1>Valeur de x : <%= x %></h1>
<h1>Valeur de result : <%= result%></h1>	


</div>
<br>
<form action="/Fonction/FunctionEvaluator" method="post">
 	 <label>Changer la fonction</label>
    <br>
    <input type="text" name="f" value="<%= f %>" required />
    <br>
    <label>ou changer x</label> 
    <br>
    <input type="text" name="x" value="<%= x %>" required/>
    <br>
    <input type="hidden" name="action" value="3" required/>
    <input type="submit" value="envoyer">
	
</form>
</body>
</html>