
# Typescript
> TypeScript is a superset of JavaScript with an additional layer TypeScript’s **type system** 

**Advantages**:
1. to enhance the development experience 
2. allowing for early error detection
3. improved tooling support.

Note: JS only provides string and number datatype

## Basic Types
1. String: `let name: string = "Alice";`
2. Boolean: `let isActive: boolean = true;` 
3. Any: `let randomValue: any = 42; // Can also be a string, object, etc.`


## Arrays and Tuples
1. Arrays: `let numbers: number[] = [1, 2, 3];`  
2. Tuples:  Fixed-length arrays with different types   
`let person: [string, number] = ["Bob", 25];`

## Enums

```
enum Direction {
    Up,
    Down,
    Left,
    Right
}
let move: Direction = Direction.Up;
```
## Functions
1. Function type

```
function add(x: number, y: number): number {
    return x + y;
}
```

2. Optional Parameters

```
function greet(name: string, age?: number): string {
    return `Hello, ${name}!`;
}
```

## Interface

```
interface User {
    name: string;
    age: number;
}

const user: User = {
    name: "Alice",
    age: 30
};
```
## Classes

```
class Animal {
    constructor(public name: string) {}
    
    speak(): void {
        console.log(`${this.name} makes a noise.`);
    }
}

class Dog extends Animal {
    speak(): void {
        console.log(`${this.name} barks.`);
    }
}
```
## Generics

```
function identity<T>(arg: T): T {
    return arg;
}

let output = identity<string>("Hello");
```

## Type Assertions

```
let someValue: any = "This is a string";
let strLength: number = (someValue as string).length;
```

## Modules

```
export class Car {
    // class implementation
}
import { Car } from './Car';
```

## Union and Intersection Types
1. Union Types: Allow a variable to hold multiple types
```
function log(value: string | number): void {
    console.log(value);
}
```  
2. Intersection Types: Combine multiple types into one  
```
interface Person {
    name: string;
}

interface Employee {
    employeeId: number;
}

type EmployeePerson = Person & Employee;
```

## Decorators

```
function Log(target: any, propertyName: string, descriptor: PropertyDescriptor) {
    console.log(`Logging ${propertyName}`);
}

class Example {
    @Log
    method() {
        // method implementation
    }
}
```