# Algorithm: 
> step by step to solve problem


### Time Complexity  
> A measure of how the execution time of an algorithm grows with the size of the input data

| Name | Symbol | code |
| ----------- | ----------- |----------- |
| constant | O(1) | ```arr[1];```|
| logarithmic | O(log n) | binary search|
| Logarithmic Base 2 | O(logn base 2) | ``` for(i=o;i<n;i=i/3)``` |
| Logarithmic Base 3 | O(logn base 3) | ``` for(i-0;i<n;i=i/2)``` |
| Square Root | O(sqrt(n))  | ``` for(i=0;i*i<n;i++)```  |
| linear | O(n) | ``` for(i=0;i<n;i++) or for(i=n;i>0;i--) or for(i=0;i<n;i+2)``` |
| linearLogarithmic | O(nlog n) ||
| quadratic | O(n<sup>2</sup>)  | 2 nested for loop |
| cubic | O(n<sup>3</sup>)  | 3 nested forloop|
| exponential | O(2<sup>n</sup>)  | |

### Type of Cases
1. **Worst Case** (Big Oh): Represents the maximum time taken for any input size.
2. **Average Case** (Big Theta): Represents the average time taken for all possible inputs.
3. **Best Case** (Big Omega): Represents the minimum time taken for any input size.

## Searching

| Algorithm            | Complexity  | Description |
|----------------------|-------------|-------------|
| Linear search        | O(n)        | Sequential search |
| Jump search          | O(√n)       | Jump steps found by square root of list length |
| Binary search        | O(log n)    | should be sorted, Half interval search on sorted list |
| Ternary search       | O(log n)    | Three-way splitting instead of two |
| Exponential search   | O(log n)    | should be sorted, Exponential steps followed by binary search |
| Interpolation search | O(1)        | should be sorted, Uniformly distributed sorted list |
| Sublist/pattern search | -         |  |

   
## Sorting

| Algorithm        | Complexity  | Description |
|------------------|-------------|-------------|
| Bubble sort      | O(n^2)      | go through list, compare nearyby values & swap..repeat  |
| Selection sort   | O(n^2)      | find minimum & swap..repeat |
| Insertion sort   | O(n^2)      | compare with all values then insert O(n<sup>2</sup>)|

| Algorithm        | Complexity  | Description |
|------------------|-------------|-------------|
| Merge sort       | O(n log n)  | divide and conquer, merging |
| Heap sort        | O(n log n)  | Using heap data structure |

| Algorithm        | Complexity  | Description |
|------------------|-------------|-------------|
| Quick sort       | O(n log n)  | divide & conquer. ie.Binary sort. selecting pivot is important p=n/2  |

| Algorithm        | Complexity  | Description |
|------------------|-------------|-------------|
| Radix sort       | O(n)        | non comparative sorting algo, bucket values according to radix 1s,10s,20s    |
| Counting sort    | O(n)        | same like radi sort but for only have to single range like 0 to 100. not like 1s,10s,100s |
| Bucket sort      | O(n^2)      | for uniformly distributed list. Create buckets, categorize values, sort it, concat buckets  |
| Pigeonhole sort  | O(n+2k)     | Distribution sort |
| Cycle sort       | O(n^2)      | Sorts in place |
