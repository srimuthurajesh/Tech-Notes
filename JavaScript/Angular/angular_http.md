# HTTPClient

## Steps to use;
1. **Module**: ```import { HttpClientModule } from '@angular/common/http';```  
2. **Service**:```import { HttpClient } from '@angular/common/http';```
3. Inject httpclient, ```constructor(public http: HttpClient) { }```


## Get
```
 this.HttpClient.get<any[]>('https://dummyjson.com/products/1')
           .subscribe(data => {
               console.log(data);
           },
           error => {
           }
  );
```
