
RxJS - Reactive Extension for Javascript 

> to handle asynchrouns data stream easiliy

### Installation
> npm install rxjs
  
  
### Subscription
1. Creating an observable that emits values
> represent async object to be function , http stream , port , time data stream. 
```
import { Observable } from 'rxjs';
const observable = new Observable(subscriber => {
  subscriber.next('First value'); subscriber.next('Second value');
  setTimeout(() => {
    subscriber.next('Third value');
    subscriber.complete(); // Indicates the end of the stream
  }, 2000);
});
```

2. Creating an observer
> function subcrib the data stream or lisen or recive the data stream 
```
const observer = {
  next: (value) => console.log('Received:', value),
  error: (err) => console.error('Error:', err),
  complete: () => console.log('Stream completed')
};
```
3. Subscribing to the observable  
```const subscription = observable.subscribe(observer);````
4. Unscubscribing:
```
setTimeout(() => {
  subscription.unsubscribe();
  console.log('Unsubscribed');
}, 1000);
```

### Difference Between RxJS and Promises
1. RxJS (Observable):
    - Handles a stream of data.
    - Can subscribe and unsubscribe.
2. Promise:
    - Handles a single resolved value.
    - Cannot be canceled.
  

## Why is RxJS called "Push/Reactive" instead of "Pull/Imperative"?
1. Imperative Programming: The listener pulls the stream of data when needed.
2. Reactive Programming: The observable pushes data to the listener.
    - Think of it as a Publisher-Subscriber model where the publisher (observable) pushes data to the subscriber (observer).  
 
 


## Subject & BehaviourSubject
1. Subject:
    - Acts as both an observable and an observer, enabling multicasting.
2. BehaviorSubject:
    - Emits the current value (or last value) to new subscribers.

```
import { Subject, BehaviorSubject } from 'rxjs';

const subject = new Subject();
subject.subscribe(value => console.log('Subject:', value));
subject.next('Subject Value');

const behaviorSubject = new BehaviorSubject('Initial Value');
behaviorSubject.subscribe(value => console.log('BehaviorSubject:', value));
behaviorSubject.next('BehaviorSubject Value');

 ```  

## Operators
### 1. Creational Operators

| Operator   | Description                                          | Example                       |
|------------|------------------------------------------------------|-------------------------------|
| `from`     | Converts arrays, promises,iterables into observables | `from([1, 2, 3])`             |
| `of`       | Emits a set of values as an observable               | `of(1, 2, 3)`                 |
| `fromEvent`| Creates an observable from DOM events                | `fromEvent(document, 'click')`|

### 2. Join Creational Operators

| Operator        | Description                                       | Example                         |
|-----------------|---------------------------------------------------|---------------------------------|
| `Merge`         | Combines multiple observables                     |                                 |
| `Concat`        | Starts the next observable after one completes    |                                 |
| `forkJoin`      | Waits for multiple observables to complete        | `forkJoin([of(1), of(2)])`      |
| `combineLatest` | Emits the latest values from multiple observables | `combineLatest([of(1), of(2)])` |

### 3. Transformation Operators

| Operator       | Description                                          | Example                                           |
|----------------|------------------------------------------------------|---------------------------------------------------|
| `Map`          | Transforms the data                                  | `of(1, 2, 3).pipe(map(x => x * 10))`              |
| `concatMap`    | Subscribes to observables sequentially               | `of(1, 2, 3).pipe(concatMap(x => of(x * 10)))`    |
| `switchMap`    | Unsubscribes previous observable if new value emitted| `of(1, 2).pipe(switchMap(x => of(x * 10)))`       |
| `Pluck`        | Selects a property from emitted objects              |                                                   | 
| `MergeMap`     | Merges all the inner observables into one            | `of(1, 2).pipe(mergeMap(x => of(x * 10)))`        |

### 4. Filtering Operators

| Operator              | Description                                   | Example                                           |
|-----------------------|-----------------------------------------------|---------------------------------------------------|
| `Filter`              | Filters data based on a condition             | `of(1, 2, 3, 4).pipe(filter(x => x % 2 === 0))`   |
| `distinctUntilChanged`| Emits if current value differs from last      | `of(1, 1, 2).pipe(distinctUntilChanged())`        |
| `take`                | Emits first N values                          | `of(1, 2, 3).pipe(take(2))`                       |
| `debounceTime`        | Emits last value if specified time has passed | `fromEvent(document, 'click').pipe(debounceTime(500))`|

### 5. Utility Operators

| Operator      | Description                           | Example                                                |
|---------------|---------------------------------------|--------------------------------------------------------|
| `Delay`       | Delays the emission of values         | `of(1, 2, 3).pipe(delay(1000))`                        |
| `tap`         | Allows logging or executing logic     | `of(1, 2, 3).pipe(tap(x => console.log('test', x)))`   |
| `catchError`  | Catches errors and recover gracefully | `throwError('Error!').pipe(catchError(err => of('recovered')))`|


```
of(1, 2, 3, 4, 5)
  .pipe(
    filter(x => x % 2 === 0), // Filters even numbers
    map(x => x * 10)          // Multiplies each value by 10
  )
  .subscribe(value => console.log(value)); 
```

13.⁠ ⁠Diff between fork join and map?
14.  How rxjs is used in angular?
15.  Map, mergeMap, concatMap, switchMap, forkJoin, combine latest?
16.  What is use of switchMap ?
    ->switchMap giving last response and it will not consider previews request and response 
    --> very usefull for search operation (with api request)


NGRX:
What is ngRx ?
-->ngRx is frame work for building reactive state management angular application - inspired by redux concept
-->Used maintain global and local state management system