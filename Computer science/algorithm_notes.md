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
2. **Jump search** -   
  -list should be sorted  
  -equal steps of jumping, then do linear search
3. **Binary search**
4. **Exponential search**
