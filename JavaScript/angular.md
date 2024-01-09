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
  selector: 'app-root',   		/*  defines how the component is identified and utilized in html templates */
  template: '<div>{{ content }}</div>',  /* nline HTML template for the component */
  templateUrl: './app.component.html',   /* Path to an external HTML template file */ 
  styleUrls: ['./app.component.css'],    /* Array of paths to external CSS files */ 
  styles: ['h1 { color: blue; }']        /* Inline styles */
})
export class AppComponent {
  title = 'My Angular App';
}
```
## Angular directives
used to manipulate the structure of the DOM. need to use * before this. 
1. *ngIf
2. *ngFor
3. [ngSwitch], *ngSwitchCase, *ngSwitchDefault

allow multiple properties, so we need to prefer this than [style], [class]
4. ngStyle
5. ngClass
6. ngTemplateOutlet


## Angular Data Binding
- binding data into html template
1. One way binding	
	1. Interpolation:  ```{{componentVariable}}```,```{{functionName()}}```
	2. Property binding: ```[HTMLattribute]="componentVariable"```   Note: just use box bracket before html attributes  
	3. Event binding: (event)="expression"
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


#DIRECTIVES:
	Three types of Directives- Component,Structural,Attribute
	IF ELSE CASE:
		<span *ngIf="booleanValue; else anotherTag"></span>	//if condition fails, element will remove from dom	
		<ng-template #anotherTag> <span>else case</span><ng-template>
	NG-STYLE:
		<span [ngStyle]="{backgrounColor: getColor()}">RAJESH</span>
	NG-CLASS:
		<span [ngClass]	="{className: status=='1'}">RAJESH</span>
	NG-FOR:
		<span *ngFor="let i of names; let n =index"></span>	

#PIPES  i.e filters
	{{comments|uppercase}}
	{{comments|lowercase}}
	{{6589.23 | currency:"USD"}}
	{{todaydate | date:'d/M/y'}}
	{{todaydate | date:'shortTime'}}	
	{{ jsonval | json }}
	{{00.54565 | percent}}
	{{string | slice:2:6}}		
	

#ROUTING:	
	
