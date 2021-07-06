
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
  
