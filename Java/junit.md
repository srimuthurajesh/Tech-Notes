@Test

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
