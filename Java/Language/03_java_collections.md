
# Collections
framework to access prepackaged data structure.

1. [List](#list)
2. [Queue](#queue)
3. [Stack](#stack) 
4. [Set](#set)  
5. [Map](#map) 
6. [Synchronized Collections](#synchronized-collection)
7. [Concurrent Collections]()
8. [Common Methods in Collections](#common-methods-in-collection)
9. [Default Sizes & Load Factors](#default-sizes--load-factors)
10. [Utility Class - Collections](#utility-class---collections)
11. [Comparable vs Comparator](#comparable-vs-comparator)
12. [Iterators](#iterators)



## List
> Ordered, index based, allow duplicates, Dynamic size. 

1. **ArrayList**: dynamic array, default size-10, new size = (current_size x 0.5)+1, null allowed, load factor 0.75.   
2. **LinkedList**: Doubly-linked list, elements connected using pointers.  
3. **Vector**: thread safe, same like arraylist, Deprecated   
4. **CopyOnWriteArrayList**: Modifications implemented in fresh copy  


## Queue
> follows the First-In-First-Out (FIFO) principle. 
 
Note: in java there is no impl for direct Queue  
1. **LinkedList queue**: `Queue<String> queue = new LinkedList<>();`   
2. **PriorityQueue**: ordered in FIFO or by comparator. ie min heap    
3. **ArrayDeque** : doubled ended queue using array, used as both FIFO & LIFO.    
4. **SynchronousQueue**

**Queue methods**: peek(), poll(), remove()
1. peek(): return object at top of current queue  
2. poll(): return object and remove queue value, or return null if queue empty     
3. remove(): same as poll(), but throw NoSuchElementException if queue empty  

## Stack. 
> follows LIFO principle. elements added and removed in same end. 

`Stack<String> stack = new Stack<>();`  
1. **Stack**: legacy class of stack but not recommended. 
2. **ArrayDeque**: double ended queue, recommended instead of stack class.   

#### Stack methods:  
1. peek(): return object at top of current stack  
2. pop(): return object and remove stack value, or return null if stack empty     
3. remove(): same as pop(), but throw NoSuchElementException if stack empty  


## Set: 
> does not allow duplicate elements.  

1. **Hashset**: does not allow duplicates, unordered     
2. **LinkedHasedSet**: does not allow duplicates, maintain order.   
3. **TreeSet** : ordered ascending.    
4. **EnumSet**: set impl for enum values.
4. **NavigableSet**: provide navigation methods      	

## Map: 
> maps keys value pair   

1. **HashTable**: legacy impl of map, not allow Null key/value, slow, thread safe  
2. **HashMap**: Null key allowed, not thread safe. 
    - hashcode of null always zero 0
    - Need to override hashcode(to generate key) and equals(if collision happened) method  
    - to avoid collision(multiple keys mapping to the same bucket), hashmap do 1.Seperate chaning, 2.linear probing   
    Note: In java 8, Hashmap use balanced tree instead of linkedList after threshold_value=8.      
3. **SynchronizedMap**: synchornized wrapper around Map, has Failfast iterator, performance issue not preferred.    
4. **ConcurrentHashMap**: lock each record segment level, has FailSafe Iterator. Fast, preferred     
5. **TreeMap**: implements red black tree, wherein all elements ordered as per compareTo() method    
6. **NavigableMap**: provide navigation methods. 
7. **LinkedHashMap**: ordered HashMap  

#### Common method in map
1. keySet() - `Set<String> keys = map.keySet();`
2. values() - `Collection<Integer> values = map.values();`
3. entrySet() - `Set<Map.Entry<String, Integer>> entries = map.entrySet();`
4. size()


**Looping through Map**  
1. Using Iterator with while - **map.keyset.iterator**  
```
Iterator itr = map.keyset().iterator(); //for map
Iterator itr = list.iterator();         //for list
while(itr.hasNext()){ map.get(it.next());}
```
1a. **List Iterator**: traverse front and back,  
`ListIterator i = list.listIterator();while (i.hasPrevious()) {System.out.print(i.previous() + " "); }`

2. Using keyset() in for: `for (String State : map.keySet()){ }`   
3. Using Map.entry<K,V>method   in for. 

``` 
for (Map.Entry<String,Float> entry : map.entrySet()) {  
  System.out.println("Item: " + entry.getKey() + ", Price: " + entry.getValue()); 
}    
for (Float item : list) { 
  System.out.println("Item: " + item);
}
```

4. Using map foreach  ```map.forEach((k,v)->{ sysout(k+v)})```   



## Synchronized Collection.  
> Not suitable for high-concurrency because:  

1. Single Lock: One lock for all operations causes delays when many threads try to access the collection.
2. Performance Overhead: Locking each method adds extra time and slows down performance.
3. Fail-Fast Iterators: Iterators throw ConcurrentModificationException if the collection changes while iterating.

**Synchronized collection Methods**
1. Collections.synchronizedCollection(Collection c)
2. Collections.synchronizedList(List list)
3. Collections.synchronizedMap(Map<K,V> m)
4. Collections.synchronizedSet(Set s)
5. Collections.synchronizedSortedMap(SortedMap<K,V> m)
6. Collections.synchronizedSortedSet(SortedSet s)
7. Collections.singletonMap("name","rajesh"); //cannot change it  


## Concurrent Collections:
> Alternative to traditional collections providing concurrency.  

1. ConcurrentHashMap.  
2. CopyOnWriteArrayList   
3. CopyOnWriteArraySet. 
4. ConcurrentLinkedQueue: Non-blocking FIFO queue.  
5. ConcurrentLinkedDeque: Non-blocking double-ended queue.  
6. LinkedBlockingQueue: Bounded blocking FIFO queue.  
7. LinkedBlockingDeque: Bounded blocking double-ended queue.  
8. ArrayBlockingQueue: Bounded blocking queue backed by an array.  
9. PriorityBlockingQueue: Blocking priority queue.  
10. DelayQueue: Delayed task scheduling queue.  
11. SynchronousQueue: Zero-capacity queue for handoff designs.  
12. ConcurrentSkipListMap: Concurrent sorted map.  
13. ConcurrentSkipListSet: Concurrent sorted set.  

## Common Methods in Collection:
### Add element 
1. `add(element)`, `addAll(collection)` - ArrayList, Vector, CopyOnWriteArrayList
2. `add(element), addFirst(element), addLast(element)`- LinkedList
3. `put(key, value)` - HashMap, ConcurrentHashMap
4. `add(element)` - HashSet, TreeSet, PriorityQueue

### Remove element
1. `remove(index), remove(element), removeAll(collection)` - ArrayList, Vector, CopyOnWriteArrayList
2. `remove(index), remove(element), removeFirst(), removeLast()` - LinkedList 
3. `remove(key), remove(key, value)` - Hashmap, ConcurrentHashMap
4. `remove(element)` - HashSet, TreeSet
5. `remove(element), poll()` - PriorityQueue, ConcurrentLinkedQueue

### Retrive element
1. `get(index)`  - ArrayList, LinkedList, Vector, CopyOnWriteArrayList
2. `get(key)` - HashMap, ConcurrentHashMap
3. `peek` - PriorityQueue, ConcurrentLinkedQueue

### Find element  
1. `indexOf(element), lastIndexOf(element)`- ArrayList, LinkedList, Vector, CopyOnWriteArrayList
2. `containsKey(key), getOrDefault(key, defaultValue` - HashMap, ConcurrentHashMap 
3. `contains(element)`: HashSet   


## Default Sizes & Load Factors:  

| Collections | Default Size | Load factor| growa by            |
|-------------|--------------|------------|---------------------|
| ArrayList   | 10           | 0.75       | 50% of current size |
| HashMap     | 16           | 0.75       | Double its size     |

## Utility class - Collections  
1. Collections.max()
2. Collections.min()
3. Collections.sort()
4. Collections.shuffle()
5. Collections.synchronizedCollection() - convert to synchronized  
6. Collections.binarySearch()
7. Collections.disjoint() - returns true if two specified collections have no elements in common  
8. Collections.copy()
9. Collections.reverse()
10. Collections.unmodifiableList() - make list as final 

## Comparable vs Comparator

| Comparable              | Comparator                          |
|-------------------------|-------------------------------------|
| Single property sorting | can write multiple property sorting |
| Need to modify class	  | does not need to modify class       |
| provides compareTo() 	  | provides compare() method           |
| Collections.sort(List) 	| Collections.sort(List,comparator)   |

### Comparable
```
class Student implements Comparable{
  String name; int age;
  @override
  public int compareTo(Student st){
      if(age==st.age)  return 0;  
      else if(age>st.age)  return 1;  
      else  return -1;  
  }
}
List<Student> stList = new ArrayList<Student>();//...fil the list
Collection.sort(stList);
```

### Comparator  
```
Class Student{ String name; int age;}
List<Student> stList = new ArrayList<Student>();//...fil the list
Comparator<Student> comp = new Comparator<Student>(){
  public int compare(Student s1, Student s2){
      if(st1.age==st2.age)  return 0;  
      else if(st1.age>st2.age)  return 1;  
      else  return -1;  
  }
}
Collection.sort(stList, comp);
```

## Iterators
> traverse elements of a collection

1. **FailFast Iterator** : 
directly on the collection and detect concurrent modifications during iteration    
- it works by checking internal flag called modCount, updated each time a collection is modified    
- it will throw ConcurrentModificationException if modcount changes  
Ex: ArrayList, HashMap , HashSet, LinkedList

2. **FailSafe** :   
- operate on a clone or copy of the collection,   
- allowing safe traversal, even if the collection is modified during iteration.  
- suits when collection modification are expected   
Ex: CopyOnWriteArrayList, ConcurrentHashMap     
