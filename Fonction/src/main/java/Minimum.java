import net.objecthunter.exp4j.Expression;

public class Minimum {
	private Expression e;
	public Minimum(Expression e) {
		this.e = e;
	}
	
	public double f(double x) {
		return e.setVariable("x", x).evaluate();
	}
	
	public double derive(double x) {
	    double h = 0.0001;
	    return (f(x + h) - f(x)) / h;
	}
	

	public double getMin(double a ,double alpha){
		double eps = 1e-7;
		double a1=0;
	
	a1 = a - alpha * derive(a);
	
	int maxIter = 1000 , count = 0;
	
	while(Math.abs(a - a1)> eps && count < maxIter){
		count++;
		a = a1;
		
		if (Double.isNaN(a) || Double.isInfinite(a)) {		  
		    return Double.NaN;
		}
		
		a1 = a - alpha * derive(a);
	
	}
	
	if(count == maxIter)
		return Double.NaN;
	
	return a;
}
}
