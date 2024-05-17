# Muti threading
> concurrent execution, subset process  

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

**Inter-thread communication**: object method  
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
i)Avoid nested locks, 2)Lock Only What is Required, 3)Avoid waiting indefinitely  

**Race condition**: When multiple threads try to access same resources 

## Thread Pool:   
> group of worker threads that are waiting for the job and reuse many times.    

## Java Concurrency Utilities
### Executer service : 

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
    Integer result = future.get();
    System.out.println("Result: " + result); // Output: Result: 42
    executorService.shutdown();
```

**Volatile**: variable that shared across all objects  

## Atomic variables
> synchronized works in variable level, and it has some methods   

AtomicBoolean  
AtomicInteger, AtomicIntegerArray, AtomicIntegerFieldUpdater  
AtomicLong, AtomicLongArray, AtomicLongFieldUpdater  
AtomicMarkableReference  
AtomicReference, AtomicReferenceArray, AtomicReferenceFieldUpdater  
AtomicStampedReference	  
DoubleAccumulator  
DoubleAdder  
LongAccumulator	  
LongAdder  

**Atomic methods**  
incrementAndGet()    
decrementAndGet()  
addAndGet()  
compareAndSet()  
