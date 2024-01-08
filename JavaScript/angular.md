 # ANGULAR

#### Angular CLI commands
| Command | Description |
| ----------- | ----------- |
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

#### Angular Components


## Angular structural directive
used to manipulate the structure of the DOM. need to use * before this. 
1. ngIf
2. ngFor
3. ngSwitch, ngSwitchCase, ngSwitchDefault

allow multiple properties, so we need to prefer this than [style], [class]
4. ngStyle
5. ngClass
6. ngTemplateOutlet


#DATA BINDING
1. One way binding	
	String/function interpolation:  {{comments}},{{functionName()}}
	Property binding: [property]="data"   just use box bracket before html attributes  
	Event binding: (event)="expression"
2. Two way binding: [(ngModel)]="data"
		eg: both are same: <input type="text" [value]="val"> <input type="text" [(ngModel)]="val">

#COMPONENT CREATION
	create component name as server.component.ts
		import { component } from '@angular/core';
		@Component({
			selector : 'app-server',
			templateUrl : './server.component.html' 
		});
		export class ServerComponent{
		}
	add componentname in module-declartions array

->we can give directly html code in templateUrl
->we can give css code directly under styles instead of stryelUrls
->selector can be put inside [app-root], so that we should use <div app-root></div>
->selector can be select by class '.app-root', so that we should use <div class="div-root"></div>

HOW ANGULAR START WORKING:
	-> in main.ts we mentioned (AppModule) app.module.ts should load first
	then -> in that bootstrap array we mention the component to load first

#MODULE
	Group the components, directives, pipes, and services
	it has 4 properties: 
		1.declarations-array of components created
		2.imports-array of modules
		3.providers-array of services, 
		4.bootstrap-main app component for starting the execution

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
	
