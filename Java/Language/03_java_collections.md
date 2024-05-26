
# Collections
framework to access prepackaged data structure.

1. [List](#list)
2. [Queue](#queue)
3. [Stack](#stack) 




## List
> Ordered, index based, allow duplicates, Dynamic size. 

1. **ArrayList**: dynamic array, default size-10, new size = (current_size x 0.5)+1, null allowed, load factor 0.75.   
2. **LinkedList**: Doubly-linked list, elements connected using pointers.  
3. **Vector**: thread safe, same like arraylist, Deprecated   
4. **CopyOnWriteArrayList**: Modifications implemented in fresh copy  


## Queue
> follows FIFO principle. 

Note: in java there is no impl for direct Queue, instead we need to use prioity queue. 
1. **Priority queue**: ordered in FIFO or by comparator.    
2. **ArrayDeque** : doubled ended queue using array, used as both FIFO & LIFO.    
3. **ArrayBlocking queue** : Bounded blocking queue, thread-safe, suitable for concurrent producer-consumer scenarios.   

1. peek(): return object at top of current queue  
2. poll(): return object and remove queue value, or return null if queue empty     
3. remove(): same as poll(), but throw NoSuchElementException if queue empty  


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

**Looping through Map**  
1. Using Iterator  
```
Iterator itr = map.keyset().iterator();
while(itr.hasNext()){ map.get(it.next());}
```
2. Using keyset() and value(): for (String State : map.keySet()) (or) for (String State : map.value())   
3. Using Map.entry<K,V>method  
```
for (Map.Entry<String,Float> entry : map.entrySet()) 
{  System.out.println("Item: " + entry.getKey() + ", Price: " + entry.getValue()); }    
```
4. Using map foreach  ``` map.forEach((k,v)->{ sysout(k+v)})```   


**Concurrent collection classes**:  alternative to java collections classes with providing concurrency    

**Iterator**  Iterator itr = list.iterator(); while (itr.hasNext()) {System.out.print(itr.next() + " "); }   
**List Iterator**: traverse front and back,  ListIterator i = list.listIterator();while (i.hasPrevious()) {System.out.print(i.previous() + " "); }
**Synchronized Collection**: 
  1. Collections.synchronizedCollection(Collection c)
` 2. Collections.synchronizedList(List list)
  3. Collections.synchronizedMap(Map<K,V> m)
  4. Collections.synchronizedSet(Set s)
  5. Collections.synchronizedSortedMap(SortedMap<K,V> m)
  6. Collections.synchronizedSortedSet(SortedSet s)
  7. Collections.singletonMap("name","rajesh"); //cannot change it  

## Methods in Collection:

| Collection            | Add | Remove | Get | Search | Iterate | 
|-----------------------|---|---|---|---|---|
| ArrayList             | `add(element)`, `addAll(collection)` | `remove(index)`, `remove(element)`, `removeAll(collection)` | `get(index)` | `indexOf(element)`, `lastIndexOf(element)` | `for` loop, `iterator()`, `forEach()` |
| LinkedList            | `add(element)`, `addFirst(element)`, `addLast(element)` | `remove(index)`, `remove(element)`, `removeFirst()`, `removeLast()` | `get(index)` | `indexOf(element)`, `lastIndexOf(element)` | `for` loop, `iterator()`, `forEach()` |
| Vector                | Same as ArrayList | Same as ArrayList | Same as ArrayList | Same as ArrayList | Same as ArrayList |
| CopyOnWriteArrayList  | `add(element)`, `addAll(collection)` | Not recommended | `get(index)` |  `indexOf(element)`, `lastIndexOf(element)` | `for` loop, `iterator()`, `forEach()` |
| HashMap               | `put(key, value)` | `remove(key)`, `remove(key, value)` | `get(key)` | `containsKey(key)`, `getOrDefault(key, defaultValue)` | `for` loop over `entrySet()`, `keySet()`, or `values()` |
| HashSet               | `add(element)` | `remove(element)` | NA | `contains(element)` | `for` loop over `iterator()` |
| TreeSet               | `add(element)` | `remove(element)` | NA | `contains(element)`, `ceiling(element)`, `floor(element)` | `for` loop over `iterator()` |
| PriorityQueue         | `add(element)` | `remove(element)`, `poll()`  | `peek()` | NA | `for` loop over `iterator()` |
| ConcurrentHashMap     | Same as HashMap | Same as HashMap | Same as HashMap | Same as HashMap | Same as HashMap |
| ConcurrentLinkedQueue | `add(element)`, `offer(element)` | `remove(element)`, `poll()`  | `peek()` | NA | `for` loop over `iterator()` |


**Default size**:  

| Collections | Default Size | Load factor|
|-------------|--------------|------------|
| ArrayList   | 10           | 0.75       |
| Vector      | 10           |            |
| HashSet     | 16           |            |
| HashMap     | 16           | 0.75       |
| HashTable   | 11           |            |
| HashSet     | 16           | 0.75       |

**Collections vs Collection** 
Collections are utility class in java.util package. It consists of only static methods which are used to operate on objects of type Collection.  

|Collections Methods                  | Description  |
|:-------------------------------------|:-------------------------------------------------------------|
|Collections.max()	                  |This method returns maximum element in the specified collection.|
|Collections.min()	                  |This method returns minimum element in the given collection.|
|Collections.sort()	                  |This method sorts the specified collection.|
|Collections.shuffle()	              |This method randomly shuffles the elements in the specified collection.|
|Collections.synchronizedCollection() |This method returns synchronized collection backed by the specified collection.|
|Collections.binarySearch()	          |This method searches the specified collection for the specified object using binary search algorithm.|
|Collections.disjoint()	              |This method returns true if two specified collections have no elements in c|ommon.|
|Collections.copy()	                  |This method copies all elements from one collection to another collectio|n.|
|Collections.reverse()	              |This method reverses the order of elements in the specified collection.|
|Collections.unmodifiableList()	              |This method make List as Final|


|Comparable                  | Comparator  |
|:-------------------------------------|:-------------------------------------------------------------|
|Single property sorting	                  |can write multiple property sorting|
|Need to modify class	                  |does not need to modify class|
|provides compareTo() method to sort elements	                  |provides compare() method to sort elements.|
|Collections.sort(List) 	                  |Collections.sort(List,comparator) |

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

**FailFast Iterator** : ArrayList, HashMap    
it works by checking internal flag called modCount, updated each time a collection is modified    
it will throw ConcurrentModificationException if modcount changes  
**FailSafe** : CopyOnWriteArrayList, ConcurrentHashMap    
