 # ANGULAR
component-based framework 

- [Components](#angular-components)
- [Directives](#angular-directives)
- [Data Binding](#angular-data-binding)
- [Modules](#angular-modules)
- [Pipes](#angular-pipes)
- [Forms](#angular-forms)
- [Services](#angular-services)
- [Dependency Injection](#angular-dependency-injection)

#### Angular CLI commands
| Command | Description |
| ----------- | ----------- |
| Install Nodejs and npm | [Nodejs](https://nodejs.org/) |
| ```npm install –g @angular/cli``` | install Angular cli  |
| ```ng –version``` | check version |
| ```ng new projectname``` | create new angular project |
| ```ng serve``` | run project |
| ```ng g c componentname``` | generate new component |
| ```ng g m modulename``` | generate new module |
| ```ng g p pipename``` | generate new pipe |
| ```ng g directive directivename``` | generate new directive |
| ```ng g s servicename``` | generate new service |

#### Adding boostrap to the project 
1. Install bootstrap ```npm install --save bootstrap```
2. __angular-cli.json__, add ```"styles": [ "../node_modules/bootstrap/dist/css/bootstrap.min.css","styles.css"]```


#### How Angular start working:
- in main.ts we mentioned (AppModule) app.module.ts should load first
- then -> in that bootstrap array we mention the component to load first

#### ng build output files
 1. main.ts.map
 2. polyfills.js.map
 3. runtime.js.map
 4. style.js.map
 5. vendor.js.map - has frameworks

### Angular folder structure
```
e2e  -> has test files
node_modules  -> has all libraries code mentioned in package json
src ->
angular.json   ->has assets, root, script, env details  
package.json   ->has dependencies, dev dependencies, scrip command details  
package.lock.json   ->has dependencies needed for dependencies mentioned in package json   

```
    
## Angular Components
- building blocks for Angular. It consists of
```
// app.component.ts
@Component({
  selector: 'app-root',   		             /*  defines how the component is identified and utilized in html templates */
  template: '<div>{{ content }}</div>',              /* nline HTML template for the component */
  templateUrl: './app.component.html',               /* Path to an external HTML template file */ 
  styleUrls: ['./app.component.css'],                /* Array of paths to external CSS files */ 
  styles: ['h1 { color: blue; }'],                   /* Inline styles */
  providers: [ExampleService],		             /* Array of service providers for dependency injection. */
  
  viewProviders: [ExampleViewService],	             /* Array of view service providers*/
  changeDetection: ChangeDetectionStrategy.OnPush,   /* Specifies change detection strategy for component. */
  encapsulation: ViewEncapsulation.Emulated,	     /*  Defines encapsulation strategy for component's styles. */
  moduleId: module.id			             /* A string representing the moduleId to use for template and style files. */	
  animations: [trigger('myAnimation', [/* animation metadata */])]
})
export class AppComponent {
  title = 'My Angular App';
}
```
#### Component Lifecycle hooks:
1. OnChange()  - triggers while any data change happens
2. OnInint() - while initialize the component
3. Docheck()
4. AfterContentInit()
5. AferContentChecked() - Angular detects the data that is rendered into the directives or component
6. AfterViewInit() - used once Angular initializes the component’s views and child views, or the view that contains the directive
7. AfterViewChecked() - once Angular checks the component’s views and child views
8. OnDestroy() - just before Angular destroys the directive or component

## Angular directives
used to manipulate the structure of the DOM. need to use * before this. 
1. **Structural Directive**
	1. *ngIf:  
	   ```
		<span *ngIf="booleanValue; else anotherTag"></span>	//if condition fails, element will remove from dom	
		<ng-template #anotherTag> <span>else case</span><ng-template>
	   ```
	3. *ngFor : ```<span *ngFor="let i of names; let n =index"></span>```
	4. [ngSwitch], *ngSwitchCase, *ngSwitchDefault
2. **Attribute Directive**
	1. [ngStyle]    - ```[ngStyle]="{backgrounColor: getColor()}```  
	2. [ngClass]    - ```<span [ngClass]="{className: status=='1'}">RAJESH</span>```    
	Note: allow multiple properties, so we need to prefer this than [style], [class]  
	3. [ngTemplateOutlet]  

#### Angular custom Directive
```
@Directive({ selector: '[appHighlight]'})
export class HighlightDirective {
    constructor(private eleRef: ElementRef) { eleRef.nativeElement.style.background = 'red'; }
}
```


## Angular Data Binding
- binding data into html template
1. One way binding	
	1. **Interpolation** :  insert expression result into template ```{{expression}}```
	2. **Property binding** : ```[property]="expression"``` HTML element properties such as ```src, disabled, value, innerHtml, title```
 	3. **Attribute bindings** : ```[attr.property]="expression"``` attr.placeholder,attr.colspan,attr.aria-label
	4. **Class bindings** : ```[class.className]="expression"```
 	5. **Style bindings** :	```[style.styleProperty]="expression"```
	6. **Event bindings** : ```(event)="function()"``` events are ```click, input, keyup, mouseover, mouseout, change, focus, blur``` 
2. Two way binding: [(ngModel)]="data"
		eg: both are same: <input type="text" [value]="val"> <input type="text" [(ngModel)]="val">


## Angular Modules  

group of components, directives, pipes, services
```
// app.module.ts
@NgModule({
  declarations: [AppComponent], /* array of components created */
  imports: [BrowserModule],     /* array of modules */
  providers: [],                /* array of services */
  bootstrap: [AppComponent]     /* main app component for starting the execution */
})
export class AppModule { }
```

## Angular Pipes    
i.e filters  
1. {{comments | uppercase}}   
2. {{comments | lowercase}}   
3. {{6589.23 | currency:"USD"}}   
4. {{todaydate | date:'d/M/y'}}, {{todaydate | date:'shortTime'}}  
5. {{ jsonval | json }}  
6. {{00.54565 | percent}}  		

#### Custom pipe
```
@Pipe ({  
  name : 'sqrt'  
})  
export class SqrtPipe implements PipeTransform {  
  transform(val : number) : number {  
    return Math.sqrt(val);  
  }  
}  
```
## Angular Forms
handle users input as a form

1. Template Driven form
2. Reactive form

- need to import FormsModule or ReactiveFormsModule
### Building blocks of Angular forms
1. **formControl** - represents a single input field
```
let firstname= new FormControl(); //Creating a FormControl in a Reactive forms
firstname.value   //Returns the value of the first name field
firstname.errors      // returns the list of errors
firstname.dirty       // true if the value has changed (dirty)
firstname.touched     // true if input field is touched
firstname.valid       // true if the input value has passed all the validation
firstname.statusChanges.subscribe(x => {console.log('firstname status changes')});
firstname.valueChanges.subscribe(x => {console.log('firstname status changes')});
```
2. **formGroup** - is a collection of FormControls
```
let address= new FormGroup({
    name : new FormControl({value: ‘Rahul’, disabled: true}),
    city : new FormControl(""),
    pinCode : new FormControl('', [Validators.required, Validators.minLength(6)], Validators.email])
})
reactiveForm.getValue('city');   //return formControl
reactiveForm.setValue({all inputs});
reactiveForm.patchValue({partial inputs});
reactiveForm.statusChanges.subscribe(x => {console.log('reactiveForm status changes')});
reactiveForm.valueChanges.subscribe(x => {console.log('reactiveForm status changes')});

address.value;       	// return json object
address.get("street")   // get formcontrol by name, inside formgroup
address.errors     	// returns the list of errors
address.dirty      	// true if the value of one of the child control has changed (dirty)
address.touched    	// true if one of the child control is touched
address.valid      	// true if all the child controls passed the validation
```
3. **formArray** : array of formControls


##### Template Driven form
```
<form #contactForm="ngForm" (ngSubmit)="onSubmit(contactForm)">
 	<input type="text" name="firstname" ngModel #fname="ngModel">
    	<button type="submit">Submit</button>
</form>
<!-- contactForm is formGroup, have methods like value, valid, touched,submitted -->
<!-- fname is formControl, have methods like value, valid, invalid,touched -->
```

##### Reactive Driven form
```
<form [formGroup]="contactForm" (ngSubmit)="onSubmit()">
	<input type="text" id="firstname" name="firstname" formControlName="firstname">
	<input type="text" id="lastname" name="lastname" [formControl]="lastname">
	<button type="submit">Submit</button>
</form>
```
##### FormBuilder
```
constructor(private formBuilder: FormBuilder) { }
this.contactForm = this.formBuilder.group({
  firstname: [''],
  lastname: [''],
  email: ['']
});
```

## Angular Services
- Providing a Service to a Component, for reuse data and common functionality  
```
//sample.service.ts
@injectable
export class SampleService{
    public  getSomething() { return "Hello world"; }
}
```
**How to Invoke a service without dependency injection**:
```
@Component({ selector: 'app-root', templateUrl: './app.component.html'})
export class AppComponent
{ 
   sampleService;
   constructor(){
     this.sampleService=new SampleService();
   }

}
```
## Angular Dependency Injection
-  way of providing dependencies to classes that need them, without creating them internally.
-  follows singleton pattern and receives same instance of a service.
```
providers: [{ provide: SampleService, useClass: SampleService }]
constructor(private productService : ProductService ) {}
```
```
providers: [{ provide: 'PRODUCT_SERVICE', useClass: ProductService }]
constructor(@Inject('PRODUCT_SERVICE') private productService: ProductService) {}
```
```
providers: [ { provide: 'APIURL', useValue: 'http://SomeEndPoint.com/api' , provide: 'USE_FAKE', useValue: true},
constructor(@Inject(APIURL) public ApiUrl: string, @Inject(USE_FAKE) public userFake: boolean) { }
```

#ROUTING:	
	
