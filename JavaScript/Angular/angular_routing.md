### Angular Routing

## Steps for routing:
1. Set the in index.html `<base href="/">`
2. Define routes for the view 
```
export const appRoutes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'contact', component: ContactComponent }
];
```
3. Register the Router Service with Routes at application startup / module
 ```
 @NgModule({
  imports: [RouterModule.forRoot(appRoutes)],  // PathLocationStrategy
  // imports: [RouterModule.forRoot(appRoutes, { useHash: true })],// or use HashLocationStrategy
  exports: [RouterModule]
})
 ```
5. Map HTML Element actions to Route 
```
<a class="nav-link" [routerLink]="['contact']">Contact us</a>
```
6. Choose where you want to display the view ```<router-outlet></router-outlet>```

7. Default and Wildcard Routes:  
Default route: `{ path: '', redirectTo: 'home', pathMatch: 'full' }`  
Matches route: `{ path: '**', component: ErrorComponent }`

## Lazy loading modules
> loads modules only when required  

```
const routes: Routes = [
  { path: 'dashboard', loadChildren: () => import('./dashboard/dashboard.module').then(m => m.DashboardModule) }
];
```

## Route Guards
> Guards are used to control access to routes

1. CanActivate: Prevents navigation to a route.
2. CanDeactivate: Prevents leaving a route.
3. Resolve: Pre-fetches route data before activating the route.
4. CanLoad: Prevents loading a module.  
`{ path: 'admin', component: AdminComponent, canActivate: [AuthGuard] }`

## Passing parameter
1. Route Parameters
`{ path: 'product/:id', component: ProductDetailComponent }`  
`this.route.snapshot.paramMap.get('id'); `  
2. Query Param  
`<a [routerLink]="['/products']" [queryParams]="{category: 'books'}">Books</a>`  
`this.route.snapshot.queryParamMap.get('category');`  

## Child Routes
```
const routes: Routes = [
  { path: 'products', component: ProductListComponent, children: [
    { path: ':id', component: ProductDetailComponent }
  ]}
];
```
##  Preloading Modules
`imports: [RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })]`

## Router Events
```
this.router.events.subscribe(event => {
  if (event instanceof NavigationStart) {
    // Code to execute on navigation start
  }
});
```
