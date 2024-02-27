### Angular Routing

## Steps for routing:
1. Set the ```<base href="/">```
2. Define routes for the view ```export const appRoutes: Routes = [{ path: 'home', component: HomeComponent }];```
3. Register the Router Service with Routes at application startup / module
 "?
RouterModule.forRoot(appRoutes)                           /*path location strategy */
    /*RouterModule.forRoot(appRoutes, { useHash: true }) */   /*Hashlocationstrategy */
5. Map HTML Element actions to Route ```<a class="nav-link" [routerLink]="['contact']">Contact us</a>```
6. Choose where you want to display the view ```<router-outlet></router-outlet>```


Default route: ```{ path: '', redirectTo: 'home', pathMatch: 'full' }```  
Matches route: ```{ path: '**', component: ErrorComponent }```

