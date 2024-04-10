<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>calcul numerique</title>
<link rel="stylesheet" href="reponse.css">
</head>
<body>

	<%
String f = request.getParameter("f");
int method = Integer.parseInt(request.getParameter("aire"));
String result = request.getParameter("result");
int n = Integer.parseInt(request.getParameter("n"));
double g = Double.parseDouble(request.getParameter("g"));
double h = Double.parseDouble(request.getParameter("h"));
%>
<header>

    <div class="header-container">
        <div class="header-links">
        	<a href="/Fonction">Acceuil</a>
        </div>
    </div>
</header>

<div class="head">

<br>
<h1>Valeur de f : <%= f %></h1>

<% if ("NaN".equals(result)) { %>
        <h1>Impossible de touver son aire</h1>
    <% } else { %>
        <h1>Valeur de result : <%= result %></h1>
    <% } %>
    	
<h1> borne entre : <%= g%> et <%= h%></h1>	
<h1>Nombre de sous-intervalles : <%= n%></h1>


</div>
<br>
<form action="/Fonction/FunctionEvaluator" method="post">
 	 <label>Changer la fonction</label>
    <br>
    <input type="text" name="f" value="<%= f %>" />
    <br>
    <label>Changer votre methode</label>
	<br>
	<select name="aire">
	    <option value="1" <%= (method == 1) ? "selected" : "" %>>rectangle</option>
	    <option value="2" <%= (method == 2) ? "selected" : "" %>>trapeze</option>
	    <option value="2" <%= (method == 3) ? "selected" : "" %>>simpson</option>
	</select>
	<br>
	<br>
	<label>entrer les 2 bornes </label> 
    <br>
    <input type="number"  name="g" step="any" required>
	<br>
	<input type="number"  name="h" step="any" required>
	<br>
	<label>entrer n le nombre de sous-intervalles</label> 
    <br>
    <input type="number"  name="n" step="any" required>
	<br>
	
    <input type="hidden" name="action" value="2" />
    <input type="submit" value="envoyer">
	
</form>

</body>
</html>