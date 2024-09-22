## NgRx
> is built on RxJS and brings reactive programming principles

**Advantages**: It is commonly used to manage the state of an Angular application in a predictable manner.

## State
> single source of truth managed by a store.

- state is immutable, and any updates return a new state object instead of modifying the current one.

## Actions
> Actions are dispatched to express state changes.

- They are plain objects that describe the event and any associated data (type and payload).
`export const loadItems = createAction('[Items List] Load Items');`

## Reducers
> A reducer is a pure function that handles the logic to update the state based on the action.

```
export const itemReducer = createReducer(
  initialState,
  on(loadItems, state => ({ ...state, loading: true }))
);
```

## Selectors
> Selectors are used to query specific slices of state from the store.

- They allow separation of concerns between how the state is structured and how it is used.
```
export const selectItems = createSelector(
  (state: AppState) => state.items,
  (items) => items
);
```

## Effects

> Effects handle side effects like API calls that are triggered by actions and update the state asynchronously.

- They are RxJS observables that listen for action dispatches.

```
@Injectable()
export class ItemEffects {
  loadItems$ = createEffect(() =>
    this.actions$.pipe(
      ofType(loadItems),
      mergeMap(() => this.itemsService.getAll().pipe(
        map(items => loadItemsSuccess({ items })),
        catchError(() => of(loadItemsFailure()))
      ))
    )
  );
}
```

## Store
> The store holds the entire state of the application, which can be accessed and modified using actions, reducers, and effects.


## NgRx Libraries
1. @ngrx/store - Core state management.
2. @ngrx/effects - Handling side effects.
3. @ngrx/entity - Handling collections of entities.
4. @ngrx/router-store - Binding Angular Router to NgRx.
5. @ngrx/store-devtools - Debugging tools for development.