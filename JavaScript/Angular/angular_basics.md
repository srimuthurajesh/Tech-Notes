# ANGULAR
> javascript component based framework, for building SPA 

- [Components](#components)
  - [Lifecycle hook](#lifecycle-hooks)
- [Directives](#directives)
  - [Structural](#1-structural-directive)
  - [Attribute Directives](#2-attribute-directive)
  - [Custom Directives](#3-component-directive)
- [Data Binding](#angular-data-binding)
  - [One-way Binding ](#1-one-way-binding)
  - [Two-way Binding](#2-two-way-binding)
- [Angular Services]()
- [Modules](#angular-modules)
- [Event Emitters](#event-emitters)
- [Pipes](#angular-pipes)
  - [Built-in Pipes](#1-built-in-pipes)
  - [Custom Pipes](#2-custom-pipe)
- [Miscellaneous](#Miscellaneous)
  - [HostBinding and HostListener](#hostbinding-and-hostlistener-in-angular)
  - [NgTemplate](#ngtemplate)
- [Other Features]()
  - [Angular CLI](#angular-cli-commands)
  - [Bootstrapping Angular](#bootstrapping-in-angular)
  - [Folder Structure](#angular-folder-structure)
- [Utilities]()
  - [Testing]()
  - [Configuration Files]()
  - [Build Files]()
  - [Third-party Libraries Integration]()
  
    
## Components
> building blocks for Angular. It consists of

```
// app.component.ts
@Component({
  selector: 'app-root',   		             /* defines how the component is identified and utilized in html templates */
  template: '<div></div>',              /* innline HTML template for the component */
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

### Lifecycle hooks:
1. ngOnChange()  - triggers while any data change happens
2. ngOnInit() - while initialize the component
3. ngDocheck() - check while @input changes, attribute changes
4. ngAfterContentInit()
5. ngAferContentChecked() - Angular detects the data that is rendered into the directives or component
6. ngAfterViewInit() - while Angular initializes the component’s views and child views, or the view that contains the directive
7. ngAfterViewChecked() - once Angular checks the component’s views and child views
8. ngOnDestroy() - just before Angular destroys the directive or component. used to clear setinterval, clear observable object

## Directives
> used to manipulate the structure of the DOM. need to use * before this.

### 1. Structural Directive
	1. *ngIf:  
	   ```
		<span *ngIf="booleanValue; else anotherTag"></span>	//if condition fails, element will remove from dom	
		<ng-template #anotherTag> <span>else case</span><ng-template>
	   ```
	3. *ngFor : ```<span *ngFor="let i of names; let n =index"></span>```
	4. [ngSwitch], *ngSwitchCase, *ngSwitchDefault
	    ```
	    <div [ngSwitch]="Switch_Expression"> 
		    <div *ngSwitchCase="MatchExpression1”> First Template</div>
		    <div *ngSwitchCase="MatchExpression2">Second template</div>
		    <div *ngSwitchDefault?>Default Template</div>
	    </div>
	    ```
	Note: ngIf & ngFor on same div, will result in an an Template parse errors  
### 2. Attribute Directive   
	1. [ngStyle]    - ```[ngStyle]="{backgrounColor: getColor()}```    
	2. [ngClass]    - ```<span [ngClass]="{className: status=='1'}">RAJESH</span>```    
	Note: allow multiple properties, so we need to prefer this than [style], [class]  
	3. [ngTemplateOutlet]  
### 3. Component Directive
> selector in component  

```
@Directive({ selector: '[appHighlight]'})
export class HighlightDirective {
    constructor(private eleRef: ElementRef) { eleRef.nativeElement.style.background = 'red'; }
}
```


## Angular Data Binding
> binding data into html template

### 1. One way binding	
	1. **Interpolation** :  insert variables, method, string literals into template - Ex:{{age}},{{methodWithbracket}},{{'22'}}  
	2. **Property binding** : ```[property]="expression"``` HTML element properties such as ```src, disabled, value, innerHtml, title```
 	3. **Attribute bindings** : ```[attr.property]="expression"``` attr.placeholder,attr.colspan,attr.aria-label
	4. **Class bindings** : ```[class.className]="expression"```
 	5. **Style bindings** :	```[style.styleProperty]="expression"```
	6. **Event bindings** : ```(event)="function($event)"``` events are ```click, input, keyup, mouseover, mouseout, change, focus, blur``` 
### 2. Two way binding:   
[(ngModel)] ```<input type="text" [(ngModel)]="val" (ngModelChange)="change($event)">  ```

## Angular Modules  
> group of components, directives, pipes, services based on functionality

- Angular itself built on the concept of modules. The Features like Forms, HTTP, Routing are implemented as modules
```
// app.module.ts
@NgModule({
  declarations: [AppComponent], /* array of components,directives,pipes created */
  imports: [BrowserModule],     /* array of modules */
  exports: [BrowserModule],     /* array of modules to export */
  providers: [],                /* array of services */
  bootstrap: [AppComponent],     /* only given for root component */
  entryComponent: []		/* will put dynamic components */	
})
export class AppModule { }
```
## Event Emitters
### Input Output decorators

```
//child.component.ts
@Input('customname') name:string
@Output sendData:EventEmitter<any> = new EventEmitter<any>();
onSubmit(){ this.sendData.emit("from child to parent");}

//parent.component.html
<app-child custom name='rajesh' (sendData)="someFunctionInParent($event)"></app-child>
//parent.component.ts
export ParentComponent{someFunctionInParent(event){console.log(event);}}
```

## Angular Pipes    
> used to Transform the Data.  

syntax: {{comments | uppercase}}
### 1. Built-in Pipes
  i. {{ comments | uppercase }}
  ii. ```{{ comments | lowercase }}```



#### 2. Custom pipe
**1. Pure Pipes**: Execute change in value. 
**2. Impure Pipes**: Execute every time change detection cycle runs, regardless of value has changed.  

```
@Pipe({ name: 'sqrt', pure: true }) // pure is true by default 
export class SqrtPipe implements PipeTransform {  
  transform(val : number) : number {  
    return Math.sqrt(val);  
  }  
}
```

## Miscellenous
### @HostBinding and @HostListener in Angular
**Host**: element is the element on which we attach our directive or component
**HostBinding**:binds element property to host 
```
@Directive({selector: '[appHighLight]',})
export class HighLightDirective implements OnInit {
   @HostBinding('attr.title') title = 'This is a custom directive';
   @HostBinding('id') id = 'customDirectiveId';   //HTML attributes such as title, id, class, style	
   @HostBinding('style.border') border: string="5px solid blue"; 
   @HostBinding('disabled') disabled = true;   //Element Properties: such as disabled, hidden, readonly, etc.
   @HostBinding('class.active') isActive = true;  //control classes of the host elemen
}
```
**HostListener**: listens to the DOM event of host.
```
@HostListener('click', ['$event'])
onClick(event: MouseEvent) { console.log('Element clicked', event);}
@HostListener('mouseenter') 
onMouseEnter() { console.log('Mouse entered'); }
@HostListener('keydown', ['$event'])
onKeyDown(event: KeyboardEvent) { console.log('Key pressed', event.key); }
@HostListener('window:resize', ['$event'])
onResize(event: Event) { console.log('Window resized', event); }
@HostListener('customEvent', ['$event'])
onCustomEvent(event: CustomEvent) {    console.log('Custom event triggered', event.detail); }
```

### NgTemplate
> it contains html template. reuse by ngTemplateOutlet and template reference variable

```
<ng-template #sampleTemplate>From inside template will print, wherever #sampletemplate called</ng-template>
//using below ng-container we can reuse ng-template html
<ng-container *ngTemplateOutlet="sampleTemplate">
  This text is not displayed
</ng-container> 
```
### Template Reference variable
```
<!--one way binding-->
<input type="text" #inputTemplate /> <button (click)="submitted(inputTemplate.value)">submit</button> 
<!--two way binding-->
<input type="text" #inputTemplate ngModel /> <button (click)="submitted(inputTemplate.value)">submit</button> 
```
### IF THEN ELSE useing ngTemplate
```
<div *ngIf="selected; then thenBlock1 else elseBlock1"><p>This content is not shown</p></div>
<ng-template #thenBlock1> <p>content to render when the selected is true.</p> </ng-template>
<ng-template #elseBlock1> <p>content to render when selected is false.</p></ng-template>
```



## Other Features
### Angular CLI commands

| Command                       | Description                   |
| ------------------------------| ------------------------------|
| Install Nodejs and npm        | [Nodejs](https://nodejs.org/) |
| `npm install –g @angular/cli` | install Angular cli           |
| `ng –version`                 | check version                 |
| `ng new projectname`          | create new angular project    |
| `ng serve`                    | run project                   |
| `ng g c componentname`        | generate new component        |
| `ng g m modulename`           | generate new module           |
| `ng g p pipename`             | generate new pipe             |
| `ng g directive directivename`| generate new directive        |
| `ng g s servicename`          | generate new service          |
| `ng build`                    | build and generate dist       |

### Bootstrapping in angular:
1. Loads index.html, which contains ```<app-root></app-root>```
2. Loads Angular & Third-party libraries & Application
3. Executes application entry point (main.ts)
4. Load & execute Root Module (app.module.ts) and Root Component (app.component.ts)
5. Displayes the template (app.component.html)

### Angular folder structure
```
e2e  			-> has e2e test files
node_modules  		-> contains all the libraries and dependencies mentioned in the package.json file.
src
    app			-> contains the components, modules, services, etc.,
    assets		-> contains static assets like images, fonts, etc.
    environments	-> contains environment-specific configuration files
    favicon.ico		-> icon file that appears in the browser tab.
    index.html		-> main HTML file that serves as the entry point 
    main.ts		-> main ts file that bootstraps Angular app.
    style.css		-> Global style sheet apply entire app
    tslint.json         -> extension of root folder file(tslint.json)
    tsconfig.app.json   -> extension of root folder file(tsconfig.json)
    test.ts             -> will have all test cases register here
    polyfills.ts	-> it required to support various browsers
angular.json   		-> has assets, root, script, env details , main.ts path 
package.json   		-> has dependencies, dev dependencies, scrip command details  
package.lock.json   	-> has dependencies needed for dependencies mentioned in package json
tsconfig.json		-> specifies compiler options and file inclusion/exclusion rules.
tslint.json		-> config file for linting ts. used to enforce coding standards and catch errors. 
```

## Utilities
### Testing:
1. e2e Tests
2. Unit Testing Components and Services

### Configuration Files:
`angular.json, tsconfig.json, package.json, polyfills.ts`

### Build Files:
- Output Files in dist Folder after ng build  
Commamd: `ng build`
  a
#### ng build output files in dist folder  
 1. main.ts.map  	- code of our application
 2. polyfills.js.map  	- scripts for supporting variety of modern browsers
 3. runtime.js.map  	- Webpack runtime file
 4. style.js.map    	- contains global style rules bundled as a js file
 5. vendor.js.map 	- contains scripts from Angular core and any other 3rd party library

### Third-party Libraries Integration:
1. Adding Bootstrap to the Angular Project
  i) Install bootstrap ```npm install --save bootstrap```
  ii) __angular-cli.json__, add ```"styles": [ "../node_modules/bootstrap/dist/css/bootstrap.min.css","styles.css"]```
2. Managing Dependencies with npm