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
String result = request.getParameter("result");
double pas = Double.parseDouble(request.getParameter("pas"));
double min_d = Double.parseDouble(request.getParameter("min_d"));
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
        <h1>Impossible trouver son minimum (soit le pas est trop grand ou faux point de depart ou la fonction n'admet pas de minimum)</h1>
    <% } else { %>
        <h1>Valeur de result : <%= result %></h1>
    <% } %>
    
<h1>Nombre de pas : <%= pas%></h1>
<h1>Point de depart : <%= min_d%></h1>



</div>
<br>
<form action="/Fonction/FunctionEvaluator" method="post">
 	 <label>Changer la fonction</label>
    <br>
    <input type="text" name="f" value="<%= f %>" />
    <br>
     <div class="minimum" >
		<label>Changer le point de depart</label> 
        <br>
        <input type="number"  name="min_d" step="any" required>
        <br>
        <label>Changer le nombre de pas</label> 
        <br>
        <input type="number"  name="pas" step="any" required>
        <br>
        
	</div>
	
    <input type="hidden" name="action" value="4" />
    <input type="submit" value="envoyer">
	
</form>

</body>
</html>