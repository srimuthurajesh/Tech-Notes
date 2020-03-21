**Algorithm**: step by step to solve problem

1. constant = 1   
2. logarithmic = log n   
3. linear = n   
4. linearLogarithmic = nlog n   
5. quadratic = n^2   
6. cubic = n^3   
7. exponential = 2^n 

**Worst case**-Big Oh, **Average case**-Big theta, **Best case**-Big omega  
**Finding the complextity:**  
1.``` for(i=0;i<n;i++) or for(i=n;i>0;i--) or for(i=0;i<n;i+2)```these all O(n)  
2.``` for(..){for(..)}``` these is O(n^2)  
3.``` for(i=1;p<n;i++){p+=i;}//dynamic increment value``` O(sqrt(n))  
4.``` for(i=o;i<n;i=i/3)``` this is O(logn base 3) ie.base value change on divider  
5.``` for(i-0;i<n;i=i/2)``` this is O(logn base 2)  
6.``` for(i=0;i*i<n;i++)``` this is O(sqrt(n)))

### Searching
1. **Linear search** - sequential search O(n)
2. **Jump search** - should be sorted list O(sqrt n)     
   - equal steps of jumping, then do linear search  
   - jump steps find by sqrt of listLenght
3. **Binary search**- should be sorted list, half intervel search O(log n)
4. **Tenary search**- three time spliting instead of two
5. **Exponential search** - should be sorted list O()  
   - same like jump search, but jump steps is in exponential(2,4,8,16,32)
   - then implement binary search
   - use for unbounded list
6. **Interpolation search** - should sorted & uniformly distributed list O(1)   
   - pos = lo + [ (x-arr[lo])*(hi-lo) / (arr[hi]-arr[Lo]) ]
7. **Sublist/pattern search** -    
   
### Sorting
1. **Bubble sort** - go through list, adjacent compare & swap..repeat O(n^2)
2. **Selection sort** -  find minimum and swap..repeat O(n^2)
3. **Insertion sort** - 
4. **Merge sort** - divide and conquer, merging
5. **Heap sort** - 
6. **Quick sort** - divide & conquer O(nlogn)
7. **Radix sort** - non comparative sorting algo, bucket values according to radix 1s,10s,20s
8. **Counting sort** - same like radi sort but for only have to single range like 0 to 100. not like 1s,10s,100s
9. **Bucket sort** - for uniformly distributed list. Create buckets, categorize values, sort it, concat buckets  
10. **Pigeonhole sort** -   
11. **Cycle sort** -  
https://www.hackerearth.com/practice/algorithms/sorting/bubble-sort/tutorial/
