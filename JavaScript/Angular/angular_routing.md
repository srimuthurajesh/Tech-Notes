### Angular Routing

## Steps for routing:
1. Set the ```<base href="/">```
2. Define routes for the view ```export const appRoutes: Routes = [{ path: 'home', component: HomeComponent }];```
3. Register the Router Service with Routes at application startup
4. Map HTML Element actions to Route ```<a class="nav-link" [routerLink]="['contact']">Contact us</a>```
5. Choose where you want to display the view ```<router-outlet></router-outlet>```
