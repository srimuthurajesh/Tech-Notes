
# Typescript
> TypeScript is a superset of JavaScript with an additional layer TypeScript’s **type system** 

**Advantages**:
1. to enhance the development experience 
2. allowing for early error detection
3. improved tooling support.

Note: JS only provides string and number datatype

## 1. Basic Types
1. String: Represents textual data.
`let name: string = "Alice";`

2. Boolean: Represents true or false values.
`let isActive: boolean = true;` 

3. Any: A flexible type that can hold any value
`let randomValue: any = 42; // Can also be a string, object, etc.`


### Defining types
```
const user = {
  name: "Hayes",
  id: 0,
};

//You can explicitly describe this object’s shape using an interface declaration:
interface User {
  name: string;
  id: number;
}

const user: User = {
  name: "Hayes",
  id: 0,
};
```
Create class using tha above interface
```
class UserAccount {
  name: string;
  id: number;
 
  constructor(name: string, id: number) {
    this.name = name;
    this.id = id;
  }
}
 
const user: User = new UserAccount("Murphy", 1);
```
