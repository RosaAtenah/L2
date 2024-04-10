import net.objecthunter.exp4j.Expression;

public class Secante extends Resolution {
	 public Secante(Expression e) {
	        super(e); // Appel au constructeur de la classe parent avec l'expression fournie
	 }

	 public double getResult(double x_n , double x_n_1) {
		 int maxIter = 1000 , count = 0;
			double eps = 1e-6;
			double x_n_2 = 0;
			
			while(Math.abs(f(x_n_1)) > eps && count < maxIter){
				
				x_n_2 = x_n_1 - ((x_n_1 - x_n)/(f(x_n_1) - f(x_n))) * f(x_n_1);
				
				x_n = x_n_1;
				x_n_1 = x_n_2;
				count++;
				
			}
			
			if(count == maxIter)
				return Double.NaN;
			
			return x_n_1;

		}
}
