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
2. Base10 - generate only number output
3. Base62 - receive number input and generate alphanumeric base62

**Possible alphanumberics are:**
a-z = 26  
A-Z = 26  
0-9 = 10  
Total = 62