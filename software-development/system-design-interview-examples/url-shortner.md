# URL Shortner

### Data capacity Model

| Column 	    | memory    | capacity  |
|---------------|-----------|-----------|
| Long Url	    | 2 kb		| 2048 chars|
| Short Url	    | 17b		| 17 chars  |
| Created at	| 7 bytes	| 7 chars   |
| Expired at	| 7 bytes	| 7 chars   |
| Total         | 2.031 kb  |           |

Note: for 30 Million users we generate  
60.7 GB/month   
0.7 TB/year    
3.6 TB/5year  


### size of short url
`www.us.com/abc1234`

Random id generator:
1. MD5 hash - receive string and lengthy output. but lot of collision if we choose first 7 chars of it.
2. Base10 - generate only number output. 10^7=10million
3. Base64 - 2^36=68000 million(0.07trillion)
3. Base62 - receive number input and generate alphanumeric base62. 62^7=3.5trillion

Note: if we have 1000 hits/sec. it need 110 years to reach 3.5trillion  
**Possible alphanumberics are:**
a-z = 26  
A-Z = 26  
0-9 = 10  
Total = 62

### Code
```java
public class Base62 {
    private static final char[] ALPHABET = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".toCharArray();

    public static String encode(long num) {
        StringBuilder sb = new StringBuilder();
        while (num > 0) {
            sb.append(ALPHABET[(int) (num % 62)]);
            num /= 62;
        }
        return sb.reverse().toString();
    }

    public static void main(String[] args) {
        long input = 1234567890L;
        String base62Code = encode(input);
        System.out.println("Base62 code: " + base62Code);
    }
}
```
