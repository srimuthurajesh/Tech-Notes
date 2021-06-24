**REST**  
-Representation state transfer  
-has set of constraints, such as being stateless,uniform interface  
-controlling request based on http method not url  


**Principls:**  
-RESOURCES-easy directory structure URL  
-REPRESENTATION-json xml to represent data object  
-MESSAGE - use http method  
-STATELESS -   
  
Http Method | usage
--- | --- 
POST|create,non-idempotent method
GET|retrieve
PUT|update
DELETE|remove
PATCH|partial update 

HTTP code|usage
--- | --- 
1xx|information
2xx|success
3xx|rediretion
4xx|client error,not found
5xx|server error

**Annotations:**
@RestController -  consists @Controller,@ResponseBody, handles Req/Res  
@RequestMapping("/getEmployees") -default GET method  
@RequestMapping(value="/getEmployees", method=RequestMethod.GET)  -support GET,PUT,DELETE,POST  

@GetMapping("/getEmployees")  - same as @RequestMapping  
@PostMapping("/addEmployee")
@RequestBody - arg ex:Employee addEmployee(@RequestBody Employee emp) 
@PutMapping("/updateEmployee")  
@DeleteMapping("/deleteEmployees/{empId}")
@PathVariable - arg ex:Employee delEmployee(@PathVariable int empId)  

@Path("/sample")
@QueryParam 
@PathParam

@Produces - specify MIME media type  
``@PostMapping(value="/rest/addEmployee",produces={"application/x-www-form-urlencoded","application/json"})``  
@Consumes - array of string of MIME type
@ExceptionHandler - a method to handle all exception with not found html message

**Two types of Response @RestController**:  
1.Add Jackdon-bind pom.xml, just return object list  
2.use ResponseEntity<> class - ex: return new ResponseEntity<>(ResBody,HttpCode);  

**Exception handling**:  
@ExceptionHandler a method to handle exception in controller  
@ControllerAdvise - a class consists of @ExceptionHandler functions  
ErrorResponse body consists of- 1.status,2.msg,3.timestamp   

**Best practices in REST**  

Http Method | endpoint | action  
--- | --- | --- 
POST| api/customers |create new customer
GET| api/customers |retrieve all customer
GET| api/customers/{cusId} |read single customer
PUT| api/customers |update customer 
DELETE| api/customers/{cusId} |delete customer    

**File upload:**

```
@POST
@Consumes(MediaType.MULTIPART_FORM_DATA)
public Response uploadFile(@FormDataParam("file") InputStream uploadedInputStream,@FormDataParam("file") FormDataContentDisposition fileDetail){}
```

**REST VS SOAP**  
Rest - architectural style, Representation state transfer, No WSDL file\
Soap - protocol, simple object access protocol
