**REST**  
- abbr Representation state transfer  
- aka Richardson maturity model evalute the design of rest api  

| Code | usage                     |
|------|---------------------------|
| 100  | information               |
| 200  | success                   |
| 300  | rediretion                |
| 400  | client error,not found    |
| 500  | server error              |


**Best practices in REST**  

Method  | Action                | Endpoint                                          |   
--------|-----------------------|---------------------------------------------------| 
POST    | create new customer   | http://www.example.com/v1/api/customers           |
GET     | retrieve all customer | http://www.example.com/v1/api/customers           |
GET     | read single customer  | http://www.example.com/v1/api/customers/{cusId}   |
PUT     | update customer       | http://www.example.com/v1/api/customers           | 
PATCH   | partial update customer| http://www.example.com/v1/api/customers           | 
DELETE  | delete customer       | http://www.example.com/v1/api/customers/{cusId}   |   

Versioning:  

Request param, query. 


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




## Http Call  
Note: we need to use timeout for all http call  

### 1. RestTemplate 
> synchronous, built on top of HttpClient, deprecated  

```
RestTemplate restTemplate = new RestTemplate();
Foo foo = restTemplate.getForObject(url, Foo.class);
Foo foo = restTemplate.postForObject(url, fooObj, Foo.class);
restTemplate.exchange(url, HttpMethod.PATCH, new HttpEntity<>(request, new HttpHeaders()), responseType);
restTemplate.exchange(url, HttpMethod.DELETE, new HttpEntity<>(request, new HttpHeaders());, Void.class);

ResponseEntity<Foo> r = restTemplate.getForEntity(url, Foo.class);
ResponseEntity<Foo> r = restTemplate.postForEntity(url, request, Foo.class);
restTemplate.put(url, request);
restTemplate.exchange(url, HttpMethod.DELETE, entity, Void.class);
Foo foo = r.getBody(); r.getStatusCode(); r.getHeaders();   
```

```

2. Foo foo = restTemplate.postForObject(fooResourceUrl, new HttpEntity<>(new Foo("bar")), Foo.class);  
3. restTemplate.delete(entityUrl);
4. ResponseEntity<Foo> response = restTemplate.exchange(fooResourceUrl, HttpMethod.POST, new HttpEntity<>(new Foo("bar")), Foo.class); 
response.getBody();
ResponseEntity<MyResponse> response = restTemplate.getForEntity(url, MyResponse.class);

```
2. **WebClient** : non-blocking client and it belongs to the spring-webflux library. uses spring web reactive   
```
Flux<Foo> fooFlux = WebClient.create().get().uri(fooResourceUrl).retrieve().bodyToFlux(Foo.class);
fooFlux.subscribe(x->sysout(x));
	
(or)

WebClient client = WebClient.builder()
  .baseUrl("http://localhost:8080")
  .defaultCookie("cookieKey", "cookieValue")
  .defaultHeader(HttpHeaders.CONTENT_TYPE, MediaType.APPLICATION_JSON_VALUE) 
  .defaultUriVariables(Collections.singletonMap("url", "http://localhost:8080"))
  .build();
```