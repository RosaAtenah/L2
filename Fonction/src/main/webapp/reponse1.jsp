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
int method = Integer.parseInt(request.getParameter("method"));
String result = request.getParameter("result");
double c = Double.parseDouble(request.getParameter("c"));
double d = Double.parseDouble(request.getParameter("d"));

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
        <h1>Impossible de résoudre f(x) = 0</h1>
    <% } else { %>
        <h1>Valeur de result : <%= result %></h1>
    <% } %>
    

<h1> borne entre : <%= c%> et <%= d%></h1>	
</div>


<br>
<form action="/Fonction/FunctionEvaluator" method="post">
 	 <label>Changer la fonction</label>
    <br>
    <input type="text" name="f" value="<%= f %>" required/>
    <br>
    <label>Changer votre methode</label>
	<br>
	<select name="method" >
    <option value="1" <%= (method == 1) ? "selected" : "" %>>secante</option>
    <option value="2" <%= (method == 2) ? "selected" : "" %>>dichotomie</option>
</select>

	<br>
	<label>entrer les 2 bornes </label> 
    <br>
    <input type="number"  name="c" step="any" required>
	<br>
	<input type="number"  name="d" step="any" required>
	<br>
	
	<br>
    <input type="hidden" name="action" value="1" />
    <input type="submit" value="envoyer">
	
</form>

</body>
</html>