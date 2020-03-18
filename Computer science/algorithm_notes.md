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
1.```for(i=0;i<n;i++) or for(i=n;i>0;i--) or for(i=0;i<n;i+2)```these all O(n)  
2.```for(..){for(..)}``` these is O(n^2)  
3.``` for(i=1;p<n;i++){p+=i;}//dynamic increment value``` O(sqrt(n))
