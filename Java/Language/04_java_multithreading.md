# Muti threading
-concurrent execution, subset process  

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
Thread scheduler prioritize based on (Range 1-10) (default-5)
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
2. **notify()**-wakes up a single thread that waiting for object monter    
3. **notifyAll()**- wakes up all threads that waiting for object monter  

**Interrupting Thread**:  
1. t1.interrupt() - call this method to stop thread and throw InterruptedException. for only sleeping threads    
2. Thread.interrupted() - return true/false   
---
## DeadLock  
-situation where two or more threads are blocked forever  
i)Avoid nested locks, 2)Lock Only What is Required, 3)Avoid waiting indefinitely  

**Race condition**: When multiple threads try to access same resources 

## Thread Pool:   
group of worker threads that are waiting for the job and reuse many times.    

**Executer service* : provide thread pool  
```
ExecutorService execService = Executor.newCacheThreadPool();
ExecutorService executorService1 = Executors.newSingleThreadExecutor();
ExecutorService executorService2 = Executors.newFixedThreadPool(10);
ExecutorService executorService3 = Executors.newScheduledThreadPool(10);
MyClass m = new MyClass(); execService.execute(m); 
execService.shutdown();
```

**Methods of ExecuterService:**
execute(Runnable)  - is voide
submit(Runnable)  - return result as Future object  
submit(Callable)  - return Object  
invokeAny(...)  - try invoke collection of callable, executes anyone of callable other dies.
invokeAll(...)  - invoke all the callable
shutdown() - no longer accept new tasks   
shutdownNow() - stops all executing task immediately  
awaitTermination() - block thread until either ExecutorService has shutdown or timeout    
schedule(callableTask, 1, TimeUnit.SECONDS) - task execute after a time delay  
scheduleAtFixedRate(runnableTask, 100, 450, TimeUnit.MILLISECONDS); - task schedules at fixed rate  

**Java thread dump**: list every thread in the JVM is doing at a particular point in time.   
## Java Concurreny api  
**ReentrantLock**: same as Synchronized, but more flexible  
**Callable interface**: same as Runnable, but more improved version, from java1.5  
**Volatile**: variable that shared across all objects  
