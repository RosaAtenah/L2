import net.objecthunter.exp4j.Expression;

public class Trapeze extends Aire {
	 public Trapeze(Expression e) {
	        super(e); // Appel au constructeur de la classe parent avec l'expression fournie
	 }

	 public double getResult(double a , double b , int n) {
		 double h = 0, s = 0 , tmp =0 ,x = 0,x1 = 0;

			h = (b-a)/n;
			
			for(int i=0;i<n;i++){
				x = a+i*h;
				x1 = x + h;
				s+=f(x) + f(x1);
				
			}
			
			tmp = (h/2)*s;
			
			return tmp;
	}
}
