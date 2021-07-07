Note:   
stream cannot be reused    
Only one terminal operation we can use in one stream    

### Create operation

|  Description | Syntax  |  
|--|--|  
|creates empty stream|Stream.empty();|     
creates stream from collection |collectionList.stream();  
create stream from collection | Stream.of("a", "b", "c"); Stream.of(arr);     
Build stream | Stream.<String>builder().add("a").add("b").add("c").build();    
create stream from string | "abc".chars();
create stream from file | Files.lines(Paths.get("C:\\file.txt"));
create stream from primitive | IntStream, LongStream, DoubleStream   
create stream from array | Arrays.stream(arr)
  
### Terminal operation
|  Description | Syntax  |  
|--|--|  
||collect(Collectors.toList()|  
||collect(Collectors.toMap()|
||Collectors.joining(", ", "[", "]")|
||collect(Collectors.averagingInt(Product::getPrice)|
||collect(Collectors.summingInt(Product::getPrice))|
||collect(Collectors.groupingBy(Product::getPrice));|
||collect(Collectors.partitioningBy(element -> element.getPrice() > 15));|
