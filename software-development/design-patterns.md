**Design patterns:** general repeatable solution to common occuring problems


## Creational design patterns
### 1. Factory Method  
> Define an interface to create an object

```
public interface Shape { void draw(); }
public class Circle implements Shape {
    public void draw() {System.out.println("Drawing a Circle"); }
}
public class Square implements Shape {
    public void draw() {System.out.println("Drawing a Square"); }
}
public class ShapeFactory {
    public Shape getShape(String shapeType) {
        if (shapeType.equalsIgnoreCase("CIRCLE"))
            return new Circle();
        else if (shapeType.equalsIgnoreCase("SQUARE")) 
            return new Square();
        return null;
    }
}
public class FactoryPatternDemo {
    public static void main(String[] args) {
        ShapeFactory shapeFactory = new ShapeFactory();
        Shape circleObj = shapeFactory.getShape("CIRCLE");
        Shape squareObj = shapeFactory.getShape("SQUARE");
    }
}

```
### 2. Abstract Factory 
> Factory of factories

### 3. Builder 
> construct complex object step by step

```
public class Pizza {
    private String dough, sauce, cheese;
    public Pizza(PizzaBuilder builder) {
        this.dough = builder.dough; this.sauce = builder.sauce;
    }
}
public class PizzaBuilder {
    private String dough, sauce, cheese;
    public PizzaBuilder(String dough, String sauce) {
        this.dough = dough; this.sauce = sauce;
    }
    public PizzaBuilder addCheese(boolean cheese) {
        this.cheese = cheese;
        return this;
    }
    public Pizza build() { return new Pizza(this); }
}
public class BuilderPatternDemo {
    public static void main(String[] args) {
        Pizza pizza1 = new PizzaBuilder("Thin Crust", "Tomato")
                .addCheese(true)
                .build();
    }
}

```

4. Object Pool - 
5. Prototype - Just clone or provide copy of object
6. Singleton - Ensure the class has only one instance(using static variable,method,if decision)

## Structural design patterns**
### 1. Adapter  
> converts one interface into another as client expects(just change functionnames).

2. Bridge - Separates an object’s interface from its implementation
3. Composite - use recursion represent whole tree strcture hierrachi
4. Decorator - Add responsibilities using inheritance(but inherit only data not behaviour)
5. Facade - Each class wires together, thus a facade class comes and provide interface to use complex interfaces in subsystem.just common class or single entry point
6. Flyweight - 
7. Private Class Data - Restricts accessor/mutator access
8. Proxy - An object representing another object

**Behavioral design patterns**-  Class's objects communication
1. Chain of responsibility - A way of passing a request between a chain of objects
2. Command - Encapsulate the request(task or command) 
3. Interpreter - 
4. Iterator - encapsulating iteration, thats all (hasNext(),next())
5. Mediator - 
6. Memento - 
7. Null Object - 
8. Observer - One to many (list of objects in local variable, call update method in for loop list)
9. State - decide which class object to create, using if statemet. 
10. Strategy - Switch algorithm (convert inheritance into interface)
11. Template method - it lets subclass to define the function, while parent class have only declaration. (abstract method)
12. Visitor - 
