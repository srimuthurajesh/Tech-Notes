**REST**  
- Representation state transfer  
- has set of constraints, such as being stateless,uniform interface  
- controlling request based on http method not url  
- Richardson maturity model evalute the design of rest api


**Principls:**  
-RESOURCES-easy directory structure URL  
-REPRESENTATION-json xml to represent data object  
-MESSAGE - use http method  
-STATELESS -   
  
Method  | Usage             |
--------|-------------------| 
POST    | create            |
GET     | retrieve          |
PUT     | update            |
DELETE  | remove            |
PATCH   | partial update    |            

Code| usage                     |
----|---------------------------|
100 | information               |
200 | success                   |
300 | rediretion                |
400 | client error,not found    |
500 | server error              |


**Best practices in REST**  

Method  | Action                | Endpoint                                          |   
--------|-----------------------|---------------------------------------------------| 
POST    | create new customer   | http://www.example.com/v1/api/customers           |
GET     | retrieve all customer | http://www.example.com/v1/api/customers           |
GET     | read single customer  | http://www.example.com/v1/api/customers/{cusId}   |
PUT     | update customer       | http://www.example.com/v1/api/customers           | 
DELETE  | delete customer       | http://www.example.com/v1/api/customers/{cusId}   |   

Versioning:  

Request param, query. 

Pagination:
> pagination along with  filtering and sorting

Stateless: 
> we need to make token authentication instead of cookies based authentication, since we are using microservices 
**REST VS SOAP**  
Rest - architectural style, Representation state transfer, No WSDL file\
Soap - protocol, simple object access protocol

## Annotations

### Controller
> define a controller in the web MVC framework. specialized version of @Component
> usually return string(logical view name), handled by view resolver.

```
@Controller
public class MyController {
    @RequestMapping("/home")
    public String home() {
        return "home"; // returns view name "home"
    }
}
```

### RestController
Definition: A @RestController annotation in Spring is a specialized version of the @Controller annotation that combines @Controller and @ResponseBody. It is used to create RESTful web services and directly return JSON or XML responses instead of views.
Usage: It is used to create REST APIs where the response body is directly written to the HTTP response as JSON or XML.
Example:
java
Copy code
@RestController
public class MyRestController {
    @RequestMapping("/greeting")
    public String greeting() {
        return "Hello, World!"; // returns "Hello, World!" as JSON response
    }
}
