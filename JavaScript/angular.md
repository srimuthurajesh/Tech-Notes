 # ANGULAR

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
| ```ng g s servicename``` | generate new service |

#### Adding boostrap to the project 
1. Install bootstrap ```npm install --save bootstrap```
2. __angular-cli.json__, add ```"styles": [ "../node_modules/bootstrap/dist/css/bootstrap.min.css","styles.css"]```


#### How Angular start working:
- in main.ts we mentioned (AppModule) app.module.ts should load first
- then -> in that bootstrap array we mention the component to load first

 
## Angular Components
- building blocks for Angular. It consists of
```
// app.component.ts
import { Component } from '@angular/core';
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
## Angular directives
used to manipulate the structure of the DOM. need to use * before this. 
1. *ngIf:  
   ```
	<span *ngIf="booleanValue; else anotherTag"></span>	//if condition fails, element will remove from dom	
	<ng-template #anotherTag> <span>else case</span><ng-template>
   ```
3. *ngFor : ```<span *ngFor="let i of names; let n =index"></span>```
4. [ngSwitch], *ngSwitchCase, *ngSwitchDefault

allow multiple properties, so we need to prefer this than [style], [class]
4. **[ngStyle]**    - ```[ngStyle]="{backgrounColor: getColor()}```
5. **[ngClass]**    - ```<span [ngClass]="{className: status=='1'}">RAJESH</span>```
6. [ngTemplateOutlet]


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
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
@NgModule({
  declarations: [AppComponent], /* array of components created */
  imports: [BrowserModule],     /* array of modules */
  providers: [],                /* array of services */
  bootstrap: [AppComponent]     /* main app component for starting the execution */
})
export class AppModule { }
```

## PIPES  
i.e filters
1. uppercase -  {{comments|uppercase}}
2. lowercase -	{{comments|lowercase}}
3. currency  -	{{6589.23 | currency:"USD"}}
4. todaydate -	{{todaydate | date:'d/M/y'}}, {{todaydate | date:'shortTime'}}	
5. jsonval   -	{{ jsonval | json }}
6. percent   -	{{00.54565 | percent}}
7. slice     -	{{string | slice:2:6}}		
	

#ROUTING:	
	
