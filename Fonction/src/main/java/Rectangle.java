import net.objecthunter.exp4j.Expression;

public class Rectangle extends Aire {
	 public Rectangle(Expression e) {
	        super(e); // Appel au constructeur de la classe parent avec l'expression fournie
	 }

	 public double getResult(double a , double b , int n) {
		 double h = 0, s = 0 , tmp =0;

			h = (b-a)/n;
			
			for(int i=0;i<n;i++){
				s+=f(a+i*h);
			}
			
			tmp = h*s;
			
			return tmp;

		}
}
