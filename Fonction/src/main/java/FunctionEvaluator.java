

//import org.mariuszgromada.math.mxparser.*;
import java.io.*;
import net.objecthunter.exp4j.Expression;
import net.objecthunter.exp4j.ExpressionBuilder;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.net.URLEncoder;

/**
 * Servlet implementation class FunctionEvaluator
 */
public class FunctionEvaluator extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public FunctionEvaluator() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	
	
	
	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//doGet(request, response);
		
		try {
			
			
			String f = request.getParameter("f");
			
			int action = Integer.parseInt(request.getParameter("action"));
				try {
					Expression e = new ExpressionBuilder(f)
			                .variables("x")
			                .build();
					
	
					switch (action) {
				    case 3:
				        double x = Double.parseDouble(request.getParameter("x"));
				        double result = e.setVariable("x", x).evaluate();
				        
				        f = URLEncoder.encode(f, "UTF-8");
				        response.sendRedirect("/Fonction/reponse3.jsp?f="+f+"&x="+x+"&result="+result);
				        break;
				    case 1:
				        int method = Integer.parseInt(request.getParameter("method"));
				        double b = 0;
				        double c = Double.parseDouble(request.getParameter("c"));
				        double d = Double.parseDouble(request.getParameter("d"));
				        if(c == d) {
				           method = -1;
				        }
				        else if(c > d) {
				            double tmp = c;
				            c = d;
				            d = tmp;
				        }
	
				        switch (method) {
				        
				            case 1:
				                Resolution secante = new Secante(e);
				                b = secante.getResult(c, d);
				               
				                break;
				            case 2:
				                Resolution dichotomie = new Dichotomie(e);
				                b = dichotomie.getResult(c, d);
				               
				                break;
				            case -1:
				            	String error = "Une erreur s'est produite : les bornes sont les memes";
						    	error = URLEncoder.encode(error, "UTF-8");
								response.sendRedirect("/Fonction/error.jsp?error="+error);
								break;
				            
				            default:
				                
				                break;
				        }
				        if(method != -1) {
					        f = URLEncoder.encode(f, "UTF-8");
					        response.sendRedirect("/Fonction/reponse1.jsp?f="+f+"&method="+method+"&result="+b+"&c="+c+"&d="+d);
				        }
				        
				        break;
				    case 2:
				        
				        int aire = Integer.parseInt(request.getParameter("aire"));
				        double z =0;
				        double g = Double.parseDouble(request.getParameter("g"));
				        double h = Double.parseDouble(request.getParameter("h"));
				        int n = Integer.parseInt(request.getParameter("n"));
				        if(g == h) {
				        	aire = -1;
				        }
				        else if(g>h) {
				        	double tmp = g;
				        	g = h;
				        	h = tmp;
				        }
				        
				        switch (aire) {
				            case 1:
				                Aire rectangle = new Rectangle(e);
				                z = rectangle.getResult(g, h, n);
				                
				                break;
				            case 2:
				              
				                Aire trapeze = new Trapeze(e);
				                z = trapeze.getResult(g, h, n);
				               
				                break;
				            case 3:
				                
				                Aire simpson = new Simpson(e);
				                z = simpson.getResult(g, h, n);
				               
				                break;
				            case -1:
				            	String error = "Une erreur s'est produite : les bornes sont les memes";
						    	error = URLEncoder.encode(error, "UTF-8");
								response.sendRedirect("/Fonction/error.jsp?error="+error);
				            	break;
				            default:
				               
				                break;
				        }
				        
				        if(aire!=-1) {
					        f = URLEncoder.encode(f, "UTF-8");
					        response.sendRedirect("/Fonction/response2.jsp?f="+f+"&aire="+aire+"&result="+z+"&g="+g+"&h="+h+"&n="+n);
				        }
				        break;
				    case 4:
				    	double min_d = Double.parseDouble(request.getParameter("min_d"));
				        double pas = Double.parseDouble(request.getParameter("pas"));
				        
				        Minimum min = new Minimum(e);
				        result = min.getMin(min_d, pas);
				      
				        f = URLEncoder.encode(f, "UTF-8");
				        response.sendRedirect("/Fonction/reponse4.jsp?f="+f+"&result="+result+"&min_d="+min_d+"&pas="+pas);
				        
				      break;
				    default:
				       
				        break;
				}
	
					
			   
			    } catch (IllegalArgumentException d) {
			    	String error = "Une erreur s'est produite : " + d.getMessage();
			    	error = URLEncoder.encode(error, "UTF-8");
					response.sendRedirect("/Fonction/error.jsp?error="+error);
			    }catch (Exception d) {
			    	String error = "Une erreur s'est produite : " + d.getMessage();
			    	error = URLEncoder.encode(error, "UTF-8");
					response.sendRedirect("/Fonction/error.jsp?error="+error);
			    }
	
		
		
			
		}catch (Exception d) {
			String error = "Une erreur s'est produite : " + d.getMessage();
			error = URLEncoder.encode(error, "UTF-8");
			response.sendRedirect("/Fonction/error.jsp?error="+error);
	        //p.println("Une erreur s'est produite : " + d.getMessage());
	    }

	}
}
