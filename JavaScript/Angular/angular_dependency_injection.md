
## Angular Services
> reusable common functionality/data in many components  
```
//sample.service.ts
@injectable
export class SampleService{
    public  getSomething() { return "Hello world"; }
}
```
**How to Invoke a service without dependency injection**:
```
//app.component.ts
@Component({ selector: 'app-root', templateUrl: './app.component.html'})
export class AppComponent
{ 
   sampleService:SampleService;
   constructor(){
     this.sampleService=new SampleService();}
}
```
## Angular Dependency Injection
>  way of providing dependencies to classes that need them, without creating them internally.

-  follows singleton pattern and receives same instance of a service.  
**Injector**: responsible for creation of object and inject into constructor  
#### 3 ways of Dependency injection
1. Need to use give providers in @Component
```
//app.component.ts
@Component({ selector: 'app-root', templateUrl: './app.component.html', providers: [SampleService]})
export class AppComponent
{ 
   constructor(public sampleService:SampleService){ }
}
```
2. Need to give providers in module
3. Need to mention injectable in service class
```
@Injectable({
  providedIn: 'root',
})export class SampleService{}
```
#### Types of Provider  
1. **Class Provider**  
 keyword: useClass ex:```providers :[{ provide: ProductService, useClass: fakeProductService }]```     
2. **Value Provider**   
 keyword: useValue ex:```providers :[{ provide: 'API_URL', useValue: 'https://example.com/api' }]```  
3. **Factory Provider**  
 keyword: useFactory 
ex:  
```
{ provide: MyService, useFactory: myServiceFactory, deps: [DepService] }
function myServiceFactory(depService: DepService) {
  return new MyService(depService);
}
```
4. **Aliased Class Provider**
 keyword: useExisting
ex:
```
{ provide: NewService, useClass: ExistingService },
{ provide: ExistingService, useExisting: NewService }
```  

