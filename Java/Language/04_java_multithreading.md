---

**Muti threading**: concurrent execution, subset process
```
1. class MyClass implements Runnable{ public void run(){}}
	MyClass obj = new MyClass(); 
	Thread t = new Thread(obj); or Thread t = new Thread(new MyClass); 
	t.run();
2 .class MyClass extend Thread{	public void run(){} }
	MyClass obj = new MyClass(); 
	obj.start(); //run func will execute
```
*Difference states of Thread :*

	1. New - obj of thread created but start not yet called
	2. Runnable - start called but no cpu available, so not running
	3. Running - start called running
	4. Blocked/waiting - wait for i/o or another thread
	5. Terminated/Dead - completed
	
*Priority of a Thread*: (Range 1-10) (default-5)
```
threadObj.setPriority(8);
threadObj.setPriority(Thread.MIN_PRIORITY) //1
threadObj.setPriority(Thread.MAX_PRIORITY) //10
threadObj.setPriority(Thread.NORM_PRIORITY) //5
```
*Synchronized method* - prevent multiple thread execute on same object\
*Synchronized block* - synchronized(){ }\
*Static synchronization* - synchronized static void func(){  }\
*Join* : wait for particular thread to complete
```thread3.join(); thread4.join(200); //wait for 200ms```\
*Yield* : change thread Running to Runnable, give chance to other wait thread\
*Sleep* : ```Thread.sleep(1000);``` //goes to runnable for given time\
*Executer service* : provide thread pool
```
ExecutorService execService = Executor.newCacheThreadPool();
ExecutorService execService = Executor.newFixedThreadPool();
ExecutorService execService = Executor.newSingleThreadPool();
MyClass m = new MyClass(); execService.execute(m); execService.shutdown();
```
Methods in multithreading:
```
threadObj.start()- start thread by calling run method
tObj.getName()- Get thread’s name
threadObj.getPriority()-Get thread priority
threadObj.isAlive()- check if thread is running
threadObj.join()-wait for thread to terminate
threadObj.wait()- notify and wake up thread
```
*Inter thread co operation*:  sync threads communicate with each other by:
1. wait-causes current thread to release lock wait until  notify(), notifyall()
2. notify()-wakes up a single thread that waiting for object monter 
3. notifyAll()- wakes up all threads that waiting for object monter
