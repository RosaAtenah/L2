import net.objecthunter.exp4j.Expression;
//import net.objecthunter.exp4j.ExpressionBuilder;

public abstract class Resolution {
	private Expression e;
	public Resolution(Expression e) {
		this.e = e;
	}
	
	public double f(double x) {
		return e.setVariable("x", x).evaluate();
	}
	
	public abstract double getResult(double x_n , double x_n_1) ;
}
