1. Create Multiple Angular Projects:
```
ng new user-dashboard
ng new admin-panel
ng new product-page
```
2. Configure Webpack Module Federation: `npm install @angular-architects/module-federation`
3. Expose Components in Each Microfrontend:webpack.config.js  
For example, in the user-dashboard project:
```
const ModuleFederationPlugin = require("webpack/lib/container/ModuleFederationPlugin");
module.exports = {
  plugins: [
    new ModuleFederationPlugin({
      name: "userDashboard",
      filename: "remoteEntry.js",
      exposes: {
        './UserComponent': './src/app/user/user.component.ts',
      },
    }),
  ],
};
```
4. Load Remote Components in the Shell Application: webpack.config.js  
```
const ModuleFederationPlugin = require("webpack/lib/container/ModuleFederationPlugin");
module.exports = {
  plugins: [
    new ModuleFederationPlugin({
      remotes: {
        userDashboard: "userDashboard@http://localhost:4201/remoteEntry.js",
        adminPanel: "adminPanel@http://localhost:4202/remoteEntry.js",
        productPage: "productPage@http://localhost:4203/remoteEntry.js",
      },
    }),
  ],
};
```
5. Use Remote Components in the Shell App:
```
import { loadRemoteModule } from '@angular-architects/module-federation';

loadRemoteModule({
  remoteEntry: 'http://localhost:4201/remoteEntry.js',
  remoteName: 'userDashboard',
  exposedModule: './UserComponent',
}).then((m) => {
  // Use the loaded module or component
});
```

we can use this above code in routing app-routing.module.ts  
```
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { loadRemoteModule } from '@angular-architects/module-federation';

const routes: Routes = [
  {
    path: 'user-dashboard',
    loadChildren: () =>
      loadRemoteModule({
        remoteEntry: 'http://localhost:4201/remoteEntry.js',
        remoteName: 'userDashboard',
        exposedModule: './UserComponent',
      }).then(m => m.UserComponent),
  },
  // Other routes...
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

```

or in component  
```
import { Component, OnInit } from '@angular/core';
import { loadRemoteModule } from '@angular-architects/module-federation';

@Component({
  selector: 'app-root',
  template: '<h1>Microfrontend Shell</h1><ng-container *ngComponentOutlet="userComponent"></ng-container>',
})
export class AppComponent implements OnInit {
  userComponent: any;

  ngOnInit() {
    loadRemoteModule({
      remoteEntry: 'http://localhost:4201/remoteEntry.js',
      remoteName: 'userDashboard',
      exposedModule: './UserComponent',
    }).then(m => {
      this.userComponent = m.UserComponent;
    });
  }
}

```