# Algorithm: 

# Table of Contents

1. [Time Complexity](#time-complexity)
2. [Type of Cases](#type-of-cases)
3. [Searching](#searching)
    - [Binary Search](#binary-search)
4. [Sorting](#sorting)
5. [Time Complexity Breakdown](#time-complexity-breakdown)

### Overview
> step by step to solve problem


### Time Complexity  
> A measure of how the execution time of an algorithm grows with the size of the input data

| Name                  | Symbol        | code                      |
| ----------------------| --------------|---------------------------|
| constant              | O(1)          | ```arr[1];```             |
| logarithmic           | O(log n)      | binary search             |
| Logarithmic Base 2    | O(logn base 2)| ``` for(i=o;i<n;i=i/3)``` |
| Logarithmic Base 3    | O(logn base 3)| ``` for(i-0;i<n;i=i/2)``` |
| Square Root           | O(sqrt(n))    | ``` for(i=0;i*i<n;i++)``` |
| linear                | O(n)          | ``` for(i=0;i<n;i++) or for(i=n;i>0;i--) or for(i=0;i<n;i+2)``` |
| linearLogarithmic     | O(nlog n)     |                           |
| quadratic             | O(n<sup>2</sup>)  | 2 nested for loop     |
| cubic                 | O(n<sup>3</sup>)  | 3 nested forloop      |
| exponential           | O(2<sup>n</sup>)  |                       |

### Type of Cases
1. **Worst Case** (Big Oh): Represents the maximum time taken for any input size.
2. **Average Case** (Big Theta): Represents the average time taken for all possible inputs.
3. **Best Case** (Big Omega): Represents the minimum time taken for any input size.

## Searching

| Algorithm              | Avg     | Best    | Worst   | Space | Description                                                    |
|------------------------|---------|---------|---------|-------|----------------------------------------------------------------|
| Linear search          | O(n)	   | O(1)	 | O(n)	   | O(1)  | Sequential search                                              |
| Jump search            | O(√n)   | O(√n)   | O(n)	   | O(1)  | Jump steps found by square root of list length                 |
| Binary search          | O(logn) | O(logn) | O(logn) | O(1)  | should be sorted, Half interval search on sorted list          |
| Ternary search         | O(logn) | O(logn) | O(logn) | O(1)  | Three-way splitting instead of two                             |
| Exponential search     | O(logn) | O(1)	 | O(logn) | O(1)  | should be sorted, Exponential steps followed by binary search  |
| Interpolation search   | O(logn) | O(1)	 | O(n)	   | O(1)  | should be sorted, Uniformly distributed sorted list            |
| Sublist/pattern search | -       |  -      | O(n)    |       | Varies depending on algorithm                                  |

#### Binary Search
> works only if array is sorted
Notes:   
1. In leetcode thy use Non Increasing(decending), Non Decreasin(ascending).   
2. Know to find given array is ascending or decending- by comparing first and last element.   
3. To fine middle element. (startIndex+endIndex)/2. 


## Sorting

| Algorithm      | Avg    | Best   | Worst  | space | Description                                             |
|----------------|--------|--------|--------|-------|---------------------------------------------------------|
| Bubble sort    | O(n^2) | O(n)   | O(n^2) | O(1)  | go through list, compare nearyby values & swap..repeat  |
| Selection sort | O(n^2) | O(n^2) | O(n^2) | O(1)  | find minimum & swap..repeat                             |
| Insertion sort | O(n^2) | O(n)   | O(n^2) | O(1)  | compare with all values then insert O(n<sup>2</sup>)    |

| Algorithm  | Avg/Best/Worst | space | Description                 |
|------------|----------------|-------|-----------------------------|
| Merge sort | O(nlogn)       | O(n)  | divide and conquer, merging |
| Heap sort  | O(nlogn)       | O(1)  | Using heap data structure   |

| Algorithm  | Avg      | Best     | worst  | space   | Description                                                           |
|------------|----------|----------|--------|---------|-----------------------------------------------------------------------|
| Quick sort | O(nlogn) | O(nlogn) | O(n^2) | O(logn) | divide & conquer. ie.Binary sort. selecting pivot is important p=n/2  |

| Algorithm       | Avg      | Best     | Worst    | Space  | Description |
|-----------------|----------|----------|----------|--------|--------------------------------------------------------------------------------------------|
| Radix sort      | O(nk)    | O(nk)    | O(nk)    | O(n+k) | non comparative sorting algo, bucket values according to radix 1s,10s,20s                  |
| Counting sort   | O(n+k)   | O(n+k)   | O(n+k)   | O(n+k) | same like radi sort but for only have to single range like 0 to 100. not like 1s,10s,100s  |
| Bucket sort     | O(n+k)   | O(n+k)   | O(n^2)   | O(n+k) | for uniformly distributed list. Create buckets, categorize values, sort it, concat buckets |
| Pigeonhole sort | O(n+k)   | O(n+k)   | O(n+k)   | O(n+k) | Distribution sort                                                                          |
| Cycle sort      | O(n^2)   | O(n^2)   | O(n^2)   | O(1)   | Sorts in place                                                                             |
| Tree Sort       | O(nlogn) | O(nlogn) | O(n^2)   | O(n)   | performs an in-order traversal in binary search tree                                       |
| Shell Sort      | O(nlogn) | O(n)     | O(n^2)   | O(1)   | Optimizes insertion sort by comparing elements at a defined gap                            |
| Cubesort        | O(nlogn) | O(nlogn) | O(nlogn) | O(1)   | Divides input into equal-sized subarrays, sorts each recursively, then merges              |



## Time Complexity Breakdown

| Element | Access (Avg/Best/Worst) | Search (Avg/Best/Worst) | Insertion (Avg/Best/Worst) | Deletion (Avg/Best/Worst) | Space Complexity |
|---|---|---|---|---|---|
| Array | O(1) / O(1) / O(1) | O(n) / O(1) / O(n) | O(n) / O(1) / O(n) | O(1) / O(1) / O(1) | O(1) |
| Queue | O(1) / O(1) / O(1) | O(n) / O(1) / O(n) | O(1) / O(1) / O(1) | O(1) / O(1) / O(1) | O(1) |
| Singly-Linked List | O(n) / O(1) / O(n) | O(n) / O(1) / O(n) | O(1) / O(1) / O(1) | O(1) / O(1) / O(n) | O(n) |
| Doubly-Linked List | O(n) / O(1) / O(n) | O(n) / O(1) / O(n) | O(1) / O(1) / O(1) | O(1) / O(1) / O(n) | O(n) |
| Skip List | O(log n) / O(log n) / O(log n) | O(log n) / O(log n) / O(log n) | O(log n) / O(1) / O(log n) | O(log n) / O(1) / O(log n) | O(n) |
| Stack | O(1) / O(1) / O(1) | O(n) / O(1) / O(n) | O(1) / O(1) / O(1) | O(1) / O(1) / O(1) | O(1) |

