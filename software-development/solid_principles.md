SOLID-  intended to make software designs more understandable, flexible and maintainable

1. SRP - Single Responsibility Principle
2. OCP - Open Closed Principle
3. LSP - Liskov Substitution Principle
4. ISP - Interface Segregation Principle
5. DIP - Dependency Inversion Principle

**Single Responsibility Principle**:
  - A class should have only one resonsibility. Chunk it, if it has more responsibilities.

**Open Closed Principle**:
  - Software entities is open for extension, but close for modification.

**Liskov Substitution Principle**:
  - child class object can be replaced by parent class object. ie. child should read to handle all functionalities of parent, not just giving empty block or throwing exception like that.

**Interface Segregation Principle**:
  - Instead of using big interface, chunk it and use as small as possible. ie client should not force to implment the dont use.

**Dependency Inversion Principle**:
  - Depend on interfce(abstraction) not on concrete class
