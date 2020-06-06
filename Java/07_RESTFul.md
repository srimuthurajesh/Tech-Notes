**REST**  
-Representation state transfer  
-has set of constraints, such as being stateless,uniform interface  
-controlling request based on http method not url  


**Principls:**  
-RESOURCES-easy directory structure URL  
-REPRESENTATION-json xml to represent data object  
-MESSAGE - use http method  
-STATELESS -   

**Http methods:**   

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
```
@RestController - extension of controller, handles Req Res.
                  it consists @Controller,@ResponseBody
@Path("/sample")
@QueryParam 
@PathParam
@Produces - specify MIME media type  like text/xml,text/json
@Consumes - array of string of MIME type
@ExceptionHandler - a method to handle all exception with not found httml message
```
**File upload:**
```
@POST
@Consumes(MediaType.MULTIPART_FORM_DATA)
public Response uploadFile(@FormDataParam("file") InputStream uploadedInputStream,@FormDataParam("file") FormDataContentDisposition fileDetail){}
```
**REST VS SOAP**\
Rest - architectural style, Representation state transfer, No WSDL file\
Soap - protocol, simple object access protocol
