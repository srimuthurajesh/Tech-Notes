
# Typescript
TypeScript offers all of JavaScript’s features, and an additional layer TypeScript’s **type system**.  

JS only provides string and number datatype

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
