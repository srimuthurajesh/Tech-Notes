- [Angular Services](#angular-services)
- [Angular Dependency Injection](#angular-dependency-injection)
- [Types of Providers](#3-ways-of-dependency-injection)
- [Injector Tree](#injector-tree)

## Angular Services
> reusable common functionality/data across multiple components  

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
     this.sampleService = new SampleService();}
}
```
## Angular Dependency Injection
>  way of providing dependencies to classes , without creating them internally.

Note: it follows singleton pattern

1. **@Injectable**: Marks a class as eligible for Angular dependency injection.
2. **@Inject**: Decorator used to specify dependencies in a class constructor(no need to use it, angular default).
3. **Injector**: Angular's dependency injection container for managing service instances.
  
  
### 3 ways of Dependency injection
1. By giving providers in @Component
```
//app.component.ts
@Component({ selector: 'app-root', templateUrl: './app.component.html', providers: [SampleService]})
export class AppComponent
{ 
   constructor(public sampleService:SampleService){ }
}
```
2. By giving providers in module
3. By mentioning providedIn at @injectable in service class
```
@Injectable({
  providedIn: 'root',
})export class SampleService{}
```
### Types of Provider  
1. **Class Provider**  
```
providers :[{ provide: ProductService, useClass: fakeProductService }]
constructor(private productService: ProductService) { }
```     
3. **Value Provider**   
```
providers :[{ provide: 'API_URL', useValue: 'https://example.com/api' }]
constructor(@Inject('API_URL') private apiUrl: string) { }
```  
4. **Factory Provider**  
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

## Injector Tree
1. Module Injector tree
2. Element Injector 

## ProvidedIn
1. providedIn: 'root': available throughout the entire application.
2. providedIn: SomeModule: available within the specified module and its children.
3. providedIn: 'platform': available across multiple Angular applications running on the same platform.
4. providedIn: 'any' : no dependency injection, we need to use new keyword inside component.  

## @Self, @SkipSelf & @Optional
