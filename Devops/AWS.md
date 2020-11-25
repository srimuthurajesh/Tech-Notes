**StreamHandler.java**  
```
public class StreamHandler implements RequestStreamHandler{
    public void handleRequest(InputStream inputStream, OutputStream outputStream, Context context) throws IOException {
        int letter;
        while((letter = inputStream.read()) != -1)
        {	
        	System.out.println(letter);
            outputStream.write(Character.toUpperCase(letter));
        }
    }
}
```
---
**ApiGatewayProxy.java**  
```
public class ApiGatewayProxy implements RequestHandler<APIGatewayProxyRequestEvent, APIGatewayProxyResponseEvent> {
	public APIGatewayProxyResponseEvent handleRequest(APIGatewayProxyRequestEvent requestEvent, Context context) {
		APIGatewayProxyResponseEvent responseEvent = new APIGatewayProxyResponseEvent();
		try {
			LambdaLogger logger = context.getLogger();
			logger.log("requestEventString:" + requestEvent.toString());
			logger.log("query string param:" + requestEvent.getQueryStringParameters());
			logger.log("headers:" + requestEvent.getHeaders());
			// fetching the value send in the request body
			String message = requestEvent.getBody();
			// Request request = gson.fromJson(message, Request.class);
			logger.log("message body:" + message);
			// setting up the response message
			responseEvent.setBody("Hello from Lambda!");
			responseEvent.setStatusCode(200);

			return responseEvent;

		} catch (Exception ex) {
			responseEvent.setBody("Invalid Response");
			responseEvent.setStatusCode(500);
			return responseEvent;
		}
	}
}
```
---
**pom.xml**  
```
<project xmlns="http://maven.apache.org/POM/4.0.0"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://maven.apache.org/POM/4.0.0 https://maven.apache.org/xsd/maven-4.0.0.xsd">
	<modelVersion>4.0.0</modelVersion>
	<groupId>sample-lamda</groupId>
	<artifactId>samplLam</artifactId>
	<version>0.0.1-SNAPSHOT</version>
	<properties>
		<maven.compiler.source>1.8</maven.compiler.source>
		<maven.compiler.target>1.8</maven.compiler.target>
		<aws.java.sdk.version>2.14.11</aws.java.sdk.version>
	</properties>
	<dependencyManagement>
		<dependencies>
			<dependency>
				<groupId>software.amazon.awssdk</groupId>
				<artifactId>bom</artifactId>
				<version>${aws.java.sdk.version}</version>
				<type>pom</type>
				<scope>import</scope>
			</dependency>
		</dependencies>
	</dependencyManagement>
	<dependencies>
		<!-- https://mvnrepository.com/artifact/com.amazonaws/aws-lambda-java-events -->
		<dependency>
			<groupId>com.amazonaws</groupId>
			<artifactId>aws-lambda-java-events</artifactId>
			<version>3.2.0</version>
		</dependency>
		<dependency>
			<groupId>com.amazonaws</groupId>
			<artifactId>aws-lambda-java-core</artifactId>
			<version>1.2.0</version>
		</dependency>
	</dependencies>
	<build>
		<plugins>
			<plugin>
				<groupId>org.apache.maven.plugins</groupId>
				<artifactId>maven-compiler-plugin</artifactId>
				<configuration>
					<source>${maven.compiler.source}</source>
					<target>${maven.compiler.target}</target>
				</configuration>
			</plugin>
			<plugin>
				<groupId>org.apache.maven.plugins</groupId>
				<artifactId>maven-shade-plugin</artifactId>
				<version>3.2.4</version>
				<executions>
					<execution>
						<phase>package</phase>
						<goals>
							<goal>shade</goal>
						</goals>
					</execution>
				</executions>
			</plugin>
		</plugins>
	</build>
</project>
```
