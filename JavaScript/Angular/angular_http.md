# HTTPClient

## Steps to use;
1. **Module**: ```import { HttpClientModule } from '@angular/common/http';```  
2. **Service**:```import { HttpClient } from '@angular/common/http';```
3. Inject httpclient, ```constructor(public http: HttpClient) { }```


## Get
```
 this.HttpClient.get<any[]>('https://dummyjson.com/products/1',
          options: {
                   headers?: HttpHeaders | { [header: string]: string | string[]; };
                   params?: HttpParams | { [param: string]: string | string[]; };
                   observe?: "body|events|response|";
                   responseType: "arraybuffer|json|blob|text";
                   reportProgress?: boolean; 
                   withCredentials?: boolean;})
           .subscribe(
           data => {                                 //Next callback
               console.log(data);
           },
           error => {                                //Error callback
                console.error('Request failed with error')    
           },
           () => {                                   //Complete callback
               console.log('Request completed')
           })
  );
```

## Http Params
https://dummyjson.com/products?limit=10  
```
const params = new HttpParams()
    .set('limit', 10);
this.httpClient.get<repos[]>('https://dummyjson.com/products',{params})
```
or directly edit the url string  
```this.httpClient.get<repos[]>('https://dummyjson.com/products?limit='+10)```  

