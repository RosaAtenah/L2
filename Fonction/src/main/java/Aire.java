import net.objecthunter.exp4j.Expression;

public abstract class Aire {
	private Expression e;
	public Aire(Expression e) {
		this.e = e;
	}
	
	public double f(double x) {
		return e.setVariable("x", x).evaluate();
	}
	
	public abstract double getResult(double a , double b , int n) ;
}
