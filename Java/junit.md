 - @Test
 - @DisplayName("we can change method name")
 - @Disabled     - obmit this method
 - @RepeatedTest(n) - test execute n times
 - @Tag(tag1, tag2) - will use execute test functions based on tag exist

AssertEqual functions:
1. assertEquals(expected, actual);
2. assertArrayEquals(expectedArray, actualArray);
3. assertIterableEquals(expectedArray, actualArray);
4. assertTrue(boolean condition)
5. void assertFalse(boolean condition)
6. void assertNotNull(Object object)
7. void assertNull(Object object)
8. void assertSame(object1, object2)
9. void assertNotSame(object1, object2)

#handle exception
assertThrows(ArithmeticException.class, ()->className.functionName, "test message to display");

### Test Lifecycle:
 - @Before  - executed before each test
 - @BeforeClass - execute it only once before running all tests. should be static
 - @BeforeEach and @BeforeAll are the JUnit 5 equivalents of @Before and @BeforeClass


### Test instance:
 - @TestInstance(TestInstance.Lifecycle.PER_CLASS)  - Object is same for whole class  
 - @TestInstance(TestInstance.Lifecycle.PER_METHOD) - each function each object will get created  

### Conditional Execution:
 - @EnabledOnOs({OS.LINUX, OS.WINDOWS})
 - @DisabledOnOs(OS.WINDOWS)
 - @EnabledOnJre(JRE.JAVA_9)
 - @EnabledIfSystemProperty(named = "java.vm.name", matches = ".*OpenJDK.*")
 - @EnabledIfEnvironmentVariable(named = "PROCESSOR_IDENTIFIER", matches = ".*Intel64 Family 6.*")

### AssertAll:
  assertAll( ()->assertEqual(expected,actual),()->assertEqual(expected,actual)); #testcase inside testcase
  NOte: put @Nested before a nested class, to acheive nested testcase
