# Muti threading
> concurrent execution 

- [Ways to Implement Thread](#ways-to-implement-thread)
- [Difference states of Thread](#difference-states-of-thread)
- [Priority of a thread](#priority-of-a-thread)
- [Synchronized](#synchronized)
- [Thread class methods](#thread-class-methods)
- [Deadlock](#deadlock)
- [Java concurrency utilities](#java-concurrency-utilities)
    - [Executer service](#executer-service-)
    - [Threadpool executor](#threadpoolexecutor)
    - [Volatile](#volatile)
    - [Atomic variables](#atomic-variables)
    - [Callable & Future](#callable--future)
    - [Thread-safe Collections](#thread-safe-collections)
    - [Locks](#locks)
    - [Synchronization Primitives](#synchronization-primitives)

**Thread**: unit of execution within the process  
## Ways to Implement Thread
1. Extends Thread class  
```
public class MyThread extends Thread {
     
    public void run() {
      System.out.println("Thread started running..");
    }
    public static void main( String args[] ) {
       MyThread mt = new  MyThread();
       mt.start();
    }
}
```
2. Implementing the Runnable Interface
```
class MyThread implements Runnable {

    public void run() {
        System.out.println("Thread started running..");
    }
    public static void main(String args[]) {
        MyThread mt = new MyThread();
        Thread t = new Thread(mt);
        t.start();
    }
}
```

## Difference states of Thread:
1. New - obj of thread created but start not yet called  
2. Runnable - start called but no cpu available, so not running  
3. Running - start called running  
4. Waiting/Blocked - wait for i/o or another thread  
5. Terminated/Dead - completed  
	
## Priority of a Thread  
> Thread scheduler prioritize based on (Range 1-10) (default-5)

```
threadObj.setPriority(8);
threadObj.setPriority(Thread.MIN_PRIORITY) //1
threadObj.setPriority(Thread.MAX_PRIORITY) //10
threadObj.setPriority(Thread.NORM_PRIORITY) //5
```

## Synchronized. 
>  allow only one thread to access the shared resource.  

**Synchronized method** - prevent multiple thread execute on same object  
**Synchronized block** - lock on current object, synchronized(){ }  
**Static synchronization** - lock on class, synchronized static void func(){  }   
**Daemon threads** - low priority threads which always run in background. Ex:GC     
t1.setDaemon(true);t1.isDaemon(true);   

## Thread class Methods:
1. **join()**: wait for another thread to comlete execution  
   ```thread3.join(); thread4.join(200); //wait for 200ms```       
2. **Yield** : (pause)change thread Running to Runnable, give chance to other wait thread 
3. **sleep** : ```Thread.sleep(1000);``` //goes to runnable for given time  
4. start()- start thread by calling run method  
5. getName()- Get thread’s name  
6. getPriority()-Get thread priority  
7. isAlive()- check if thread is running  

**Inter-thread communication**:   
Note: we need to maintin a seperate object method to perform this. 
1. **wait()**- causes current thread to wait until notify(), notifyall()  
2. **notify()**-wakes up a single thread that waiting for object moniter    
3. **notifyAll()**- wakes up all threads that waiting for object moniter  

**Interrupting Thread**:  
1. t1.interrupt() - call this method to stop thread and throw InterruptedException. for only sleeping threads    
2. Thread.interrupted() - return true/false   

---

## DeadLock  
> situation where a set of processes are blocked   

because each process is holding a resource and waiting for another resource acquired by some other process.   
1. Avoid nested locks
2. Lock Only What is Required
3. Avoid waiting indefinitely  
**How to resolve**: try to interrupt thread1 and later call it
`if (thread1.getState() == Thread.State.BLOCKED && thread2.getState() == Thread.State.BLOCKED) {thread1.interrupt();}`           
**Race condition**: When multiple threads try to access same resources 

## Thread Pool:   
> group of worker threads that are waiting for the job and reuse many times.    

## Java Concurrency Utilities
### Executer Framework : 
>  interface from java.util.concurrent, manages and executes asynchronous tasks concurrently 

#### Types of Executer Service:
1. **CachedThreadPool**: dynamically adjust pool size, suits for short-lived tasks with varying loads.  
``` ExecutorService executer = Executors.newCacheThreadPool(); ```. 
2. **SingleThreadExecutor**: Uses single worker thread, sequential execution    
``` ExecutorService executer = Executors.newSingleThreadExecutor(); ```.  
3. **FixedThreadPool**: fixed-size pool of worker threads, suits for task with limited resource usage.  
``` ExecutorService executer = Executors.newFixedThreadPool(10) ```. 
4. **ScheduledThreadPool**: same like FixedThreadPool along with delayed/periodic execution.  
``` ExecutorService executer = Executors.newScheduledThreadPool(10);```

Syntax:
```
ExecutorService executor = Executors.newFixedThreadPool(5);
executor.submit(() -> { // Task to be executed asynchronously});
executor.submit(new MyRunnableImpl());
executor.shutdown();
```


**Methods of ExecuterService:**
1. execute(Runnable)  - is void
2. submit(Runnable)  - accept both runnable, callable. return result as Future object(which implements get() method)  
3. invokeAny(...)  - try invoke collection of callable, executes anyone of callable other dies.
4. invokeAll(...)  - invoke all the callable
5. shutdown() - no longer accept new tasks   
6. shutdownNow() - stops all executing task immediately  
7. awaitTermination() - block thread until either ExecutorService has shutdown or timeout    
8. schedule(callableTask, 1, TimeUnit.SECONDS) - task execute after a time delay  
9. scheduleAtFixedRate(runnableTask, 100, 450, TimeUnit.MILLISECONDS); - task schedules at fixed rate  


### ThreadPoolExecutor
> class that implements ExecutorService, offers more control and customization options. 

Syntax:
```
ThreadPoolExecutor mypool = (ThreadPoolExecutor) executorServiceObj;  
mypool.submit(() -> { // Task to be executed asynchronously});
mypool.submit(new MyRunnableImpl());
System.out.println("size of mypool: " + mypool.getPoolSize());    
System.out.println("Total number threads scheduled): "+ mypool.getTaskCount());   
mypool.shutdown();
```

**Java thread dump**: snapshot of all threads state running within JVM at a particular moment.    

**ReentrantLock**: same as Synchronized, but more flexible  

### Callable & Future: 
**Callable**: interface that represents task, have call method that returns result.  
**Future**: interface that represent result of callable->call method     
```
    Callable<Integer> callableTask = new Callable<Integer>() {
        @Override
        public Integer call() throws Exception {
            Thread.sleep(2000); 
            return 42;
        }
    };
    ExecutorService executorService = Executors.newSingleThreadExecutor();
    Future<Integer> future = executorService.submit(callableTask);
    Future<Integer> future2 = executorService.submit(callableTask);
    
    Integer result = future.get();  //will block/wait until Future is complete. 
    Integer result2 = future2.get();  //will block/wait until Future2 is complete. 
    System.out.println("Result: " + result); // Output: Result: 42
    executorService.shutdown();
```

### Thread safe collections
1. **ConcurrentHashMap** - modern thread-safe map implementation.  
2. **CopyOnWriteArrayList** - uses a copy-on-write strategy.   
3. **Collections.synchronizedList** - will force to use synchronized block otherwise throw exception.  
```
    List<Integer> list = new ArrayList<>();
    List<Integer> synchronizedList = Collections.synchronizedList(list);
    Collections.addAll(synchronizedList, 1, 2, 3);    
    // Accessing elements in a synchronized block to avoid ConcurrentModificationException
    synchronized (synchronizedList) {
        for (Integer i : synchronizedList) {
            System.out.println(i);
        }
    }
```  
4. Vector/Hashtable - uses synchronized method, it is legacy and not preferable in now. instead use  CopyOnWriteArrayList, ConcurrentHashMap. 


### Volatile: 
- we intimate compiler to always read from memory not from cache. (or stop memory optimization)
Note: This scenario is cache incoherence. 

### Atomic variables
> synchronized works in variable level, and it has some methods   
> provides atomicity. 

1. AtomicInteger    
2. AtomicLong   
3. AtomicBoolean  
4. AtomicReference  

**Atomic Methods**  :
1. get() 
2. set(value)
3. compareAndSet(expectedValue, newValue):  sets value to newValue if current value equals expectedValue.
4. getAndSet(newValue):  sets the new value and returns the old value.
5. incrementAndGet(): increments by one and returns new value.
6. decrementAndGet(): decrements by one and returns new value.
7. addAndGet(delta):  adds given value to current value and returns new value.
8. lazySet(value): Eventually sets to the new value.


### Synchronization primitives
1. CountDownLatch
2. **Semaphore**: controls access to a resource with a set number of permits.  
3. CyclicBarrier
4. Exchanger
5. Phaser

### Locks
1. **ReentrantLock**: ensures that only one thread can access a resource at a time  
2. **ReadWriteLock**: allow multiple threads to read a resource simultaneously but only one thread to write at a time


