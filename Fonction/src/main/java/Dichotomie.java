import net.objecthunter.exp4j.Expression;

public class Dichotomie extends Resolution{
	
	public Dichotomie(Expression e) {
        super(e); // Appel au constructeur de la classe parent avec l'expression fournie
 }


	public double getResult(double x_n, double x_n_1){
		double milieu = 0;
		double eps = 0.0001;
		int maxIter = 1000 , count = 0;
		
		while((Math.abs(x_n-x_n_1))>eps && count < maxIter){
			milieu = (double)((x_n+x_n_1)/2);
			
			if((f(x_n)*f(milieu))<0){
				
				x_n_1=milieu;
			}
			else if((f(milieu)*f(x_n_1))<0){
				
				x_n=milieu;
			}else if(f(milieu) == 0) {
				break;
			}
			count++;
		}
		
		if(count == maxIter)
			return Double.NaN;
		return milieu;
	}
}
