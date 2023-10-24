## Algorithm: 
- step by step to solve problem

#### Time Complexity  
1. constant = 1   
2. logarithmic = log n   
3. linear = n   
4. linearLogarithmic = nlog n   
5. quadratic = n<sup>2</sup>   
6. cubic = n<sup>3</sup>     
7. exponential = 2<sup>n</sup>   

**Worst case**-Big Oh, **Average case**-Big theta, **Best case**-Big omega  

**Finding the complextity:**  
1.``` for(i=0;i<n;i++) or for(i=n;i>0;i--) or for(i=0;i<n;i+2)```these all O(n)  
2.``` for(..){for(..)}``` these is O(n^2)  
3.``` for(i=1;p<n;i++){p+=i;}//dynamic increment value``` O(sqrt(n))  
4.``` for(i=o;i<n;i=i/3)``` this is O(logn base 3) ie.base value change on divider  
5.``` for(i-0;i<n;i=i/2)``` this is O(logn base 2)  
6.``` for(i=0;i*i<n;i++)``` this is O(sqrt(n)))

### Searching
1. **Linear search O(n)** - sequential search 
2. **Jump search O(√n)** - should be sorted list      
   - equal steps of jumping, then do linear search  
   - jump steps find by sqrt of listLenght
3. **Binary search O(log n)**- should be sorted list, half intervel search 
4. **Tenary search O(log n)**- three time spliting instead of two
5. **Exponential search O(log n)** - should be sorted list O()  
   - same like jump search, but jump steps is in exponential(2,4,8,16,32)
   - then implement binary search
   - use for unbounded list
6. **Interpolation search O(1)** - should sorted & uniformly distributed list O(1)   
   - pos = lo + [ (x-arr[lo])*(hi-lo) / (arr[hi]-arr[Lo]) ]
7. **Sublist/pattern search** -    
   
### Sorting
1. **Bubble sort O(n^2)** - go through list, compare nearyby values & swap..repeat 
2. **Selection sort O(n^2)** -  find minimum & swap..repeat 
3. **Insertion sort O(n^2)** - compare with all values then insert O(n^2)
---
4. **Merge sort O(n log n)** - divide and conquer, merging. 
5. **Heap sort O(n log n)** -  
---
6. **Quick sort O(n log n)** - divide & conquer. ie.Binary sort. selecting pivot is important p=n/2 
---
7. **Radix sort O(n)** - non comparative sorting algo, bucket values according to radix 1s,10s,20s    
8. **Counting sort O(n)** - same like radi sort but for only have to single range like 0 to 100. not like 1s,10s,100s
9. **Bucket sort O(n^2)** - for uniformly distributed list. Create buckets, categorize values, sort it, concat buckets  
10. **Pigeonhole sort O(n+2^k)** -   
11. **Cycle sort O(n^2)** -  
https://www.hackerearth.com/practice/algorithms/sorting/bubble-sort/tutorial/
