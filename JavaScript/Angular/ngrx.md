## NgRx
> is built on RxJS and brings reactive programming principles

**Advantages**: It is commonly used to manage the state of an Angular application in a predictable manner.

## State
> single source of truth managed by a store.

- state is immutable, and any updates return a new state object instead of modifying the current one.

# Steps to use NgRX
## 1. Create Actions
> Actions are dispatched to express state changes.

```
// employee.actions.ts

// Action to load employees
export const loadEmployees = createAction('[Employee] Load Employees');

// Action triggered on successful API response
export const loadEmployeesSuccess = createAction(
  '[Employee] Load Employees Success',
  props<{ employees: Employee[] }>()
);

// Action triggered on failure
export const loadEmployeesFailure = createAction(
  '[Employee] Load Employees Failure',
  props<{ error: string }>()
);
```

## 2. Create Reducers and use state
> A reducer is a pure function that handles the logic to update the state based on the action.

```
// employee.reducer.ts

export interface EmployeeState {
  employees: Employee[];
  error: string | null;
}

const initialState: EmployeeState = {
  employees: [],
  error: null,
};

export const employeeReducer = createReducer(
  initialState,
  on(loadEmployeesSuccess, (state, { employees }) => ({
    ...state,
    employees: employees,
    error: null,
  })),
  on(loadEmployeesFailure, (state, { error }) => ({
    ...state,
    error: error,
  }))
);

```

## 3. Create Effects
> Effects handle side effects like API calls that are triggered by actions and update the state asynchronously.

```
// employee.effects.ts

@Injectable()
export class EmployeeEffects {
  constructor(
    private actions$: Actions,
    private employeeService: EmployeeService
  ) {}

  loadEmployees$ = createEffect(() =>
    this.actions$.pipe(
      ofType(loadEmployees),
      withLatestFrom(this.store.select(selectEmployees)),
      filter(([action, employees]) => employees.length === 0),  // only load if no employees
      switchMap(() =>
        this.employeeService.getEmployees().pipe(
          map((employees) => loadEmployeesSuccess({ employees })),
          catchError((error) => of(loadEmployeesFailure({ error: error.message })))
        )
      )
    )
  );
}
```
## 4. Create Selectors
> Selectors are used to query specific slices of state from the store.

```
// employee.selectors.ts

export const selectEmployeeState = createFeatureSelector<EmployeeState>('employees');

export const selectAllEmployees = createSelector(
  selectEmployeeState,
  (state: EmployeeState) => state.employees
);

export const selectEmployeeError = createSelector(
  selectEmployeeState,
  (state: EmployeeState) => state.error
);

```

## 5. Update the app module
```
@NgModule({
  imports: [
    StoreModule.forRoot({ employees: employeeReducer }),
    EffectsModule.forRoot([EmployeeEffects])
  ]
})
export class AppModule {}

```
## 6. Use Store and call Action
> The store holds the entire state of the application, which can be accessed and modified using actions, reducers, and effects.
```
// employee.component.ts

@Component({
  selector: 'app-employee',
  templateUrl: './employee.component.html'
})
export class EmployeeComponent implements OnInit {
  employees$ = this.store.select(selectAllEmployees);

  constructor(private store: Store) {}

  ngOnInit() {
    //When dispatch called, action will be send
    this.store.dispatch(loadEmployees());
  }
}
```

## NgRx Libraries
1. @ngrx/store - Core state management.
2. @ngrx/effects - Handling side effects.
3. @ngrx/entity - Handling collections of entities.
4. @ngrx/router-store - Binding Angular Router to NgRx.
5. @ngrx/store-devtools - Debugging tools for development.

`npm install @ngrx/store @ngrx/effects @ngrx/entity @ngrx/store-devtools`