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


**Best practices in REST**  

Http Method | endpoint | action  
--- | --- | --- 
POST| api/customers |create new customer
GET| api/customers |retrieve all customer
GET| api/customers/{cusId} |read single customer
PUT| api/customers |update customer 
DELETE| api/customers/{cusId} |delete customer    


**REST VS SOAP**  
Rest - architectural style, Representation state transfer, No WSDL file\
Soap - protocol, simple object access protocol
