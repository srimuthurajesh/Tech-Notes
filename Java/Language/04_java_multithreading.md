# Muti threading
-concurrent execution, subset process  

## Different ways to Implement Thread
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
### Difference states of Thread:
1. New - obj of thread created but start not yet called  
2. Runnable - start called but no cpu available, so not running  
3. Running - start called running  
4. Waiting/Blocked - wait for i/o or another thread  
5. Terminated/Dead - completed  
	
### Priority of a Thread  
(Range 1-10) (default-5)
```
threadObj.setPriority(8);
threadObj.setPriority(Thread.MIN_PRIORITY) //1
threadObj.setPriority(Thread.MAX_PRIORITY) //10
threadObj.setPriority(Thread.NORM_PRIORITY) //5
```

**Synchronized method** - prevent multiple thread execute on same object  
**Synchronized block** - synchronized(){ }  
**Static synchronization** - synchronized static void func(){  }  

## Thread class Methods:
1. **wait()**- causes current thread to wait until notify(), notifyall()  
2. **notify()**-wakes up a single thread that waiting for object monter    
3. **notifyAll()**- wakes up all threads that waiting for object monter  
4. **join()**-wait for thread to terminate  ```thread3.join(); thread4.join(200); //wait for 200ms```       
5. **Yield** : change thread Running to Runnable, give chance to other wait thread 
6. **Sleep** : ```Thread.sleep(1000);``` //goes to runnable for given time  
7. start()- start thread by calling run method  
8. getName()- Get thread’s name  
9. getPriority()-Get thread priority  
10. isAlive()- check if thread is running  

Thread Pool:  
**Executer service* : provide thread pool  
```
ExecutorService execService = Executor.newCacheThreadPool();
ExecutorService execService = Executor.newFixedThreadPool();
ExecutorService execService = Executor.newSingleThreadPool();
MyClass m = new MyClass(); execService.execute(m); execService.shutdown();
```

