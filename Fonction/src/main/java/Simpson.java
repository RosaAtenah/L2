import net.objecthunter.exp4j.Expression;

public class Simpson extends Aire {
	 public Simpson(Expression e) {
	        super(e); // Appel au constructeur de la classe parent avec l'expression fournie
	 }

	 public double getResult(double a , double b , int n) {
		 double h = 0, sp = 0 , si = 0, tmp =0 , x=0 ;
		
			h = (b-a)/n;
			
			for(int i=1;i<=n;i++){
				x = a+i*h;
				if(i%2 == 0){
					sp += f(x); 
				}
				else{
					si +=f(x);
				}	
				
			}
			tmp = f(a) + f(b) + 2*sp + 4*si;
			tmp = (h)/3 * tmp;
			
			return tmp;
	}
}
