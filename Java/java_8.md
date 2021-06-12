## Stream API  
1. Reducing for loop code using **IntStream**  
 ```
int sumValue = IntStream.rangeClosed(0,4).sum();
 ```
2. Remove duplicates using stream  
```
List<String> names = Array.asList("raj","sam","raj");
List<String> uniqueList = names.stream().distinct().collect(Collectors.toList());
```
