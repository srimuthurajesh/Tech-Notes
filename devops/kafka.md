## Apache Kafka  
> publish subscribe based messaging system

- Developed by Linkedin, later Apache took over  
- Also used as a storage system

Note: RabbitMQ & ActiveMQ are point to point messaging system. In traditional queue each message wil go to only one consumer.  

**Advantages**:
1. Loose coupling
2. Scalable and Distributed in nature  
4. Kafka steram APIs, enable aggregation & joins of input and output stream  

| Feature           | Kafka                                              | RabbitMQ                                          |
|---------------------------------|----------------------------------------------------|--------------------------------------------------|
| **Architecture**  | Distributed streaming platform, publish-subscribe  | Traditional message broker, broker-centric model |
| **Message Model** | Messages stored in topics, offset-based consumption| Messages sent to queues via exchanges, various routing mechanisms |
| **Performance**   | High throughput, suitable for real-time streaming  | Low-latency delivery, suitable for complex routing |
| **Persistence**   | Messages persisted to disk with configurable retention | Messages can be persisted, but focus on delivery |
| **Scalability**   | Easy horizontal scaling with partitions            | Scalable but more complex, involves clustering and federation |
| **Ordering**      | Strong ordering within partitions                  | Weaker ordering guarantees, especially in clusters |
| **Msg Retention** | policy based retain only for 30 days               | msg removed once acknowledged or processed |

### Components of kafka:  
1. **Zookeeper**:  maintain/store configuration infos and leader election. Kafka brokers depend on Zookeeper for metadata and coordination 
2. **Cluster**: The full set of brokers working together in Kafka with help of zookeeper
2. **Brokers**(kafka servers): container that holds several topics, kafka cluster composed of brokers       
3. **Topic**: category/name for bucket of messages, similar to DB table    
6. **Partition**: each topic divided into several parts called partition, ordered, immutable. Replication implemented in partition level.  
every partition has one server acting as leader and rest of them are followers.    
7. **Offset**: unique id for each message/record in partition. usually 0 1 2 3 4 5 ...   
4. **Producers**: Application that publish the kafka topics
5. **Consumers**: Applications that subscribe topics and consume messages. 
8. **replication factor**: number of copies of data over multiple brokers  
9. **GroupId**: avoid multiple delivery, by giving same groupid for multiple same projects   
11. **Correlation Ids**: track messages and debug

**Kafka Core APIs**:  
1. Producer API: write data to topics    
	- Message key: data ordering if key sent or if not, then round robin    
	1. acks=0 producer wont wait for acknowledgement(dataLoss)  
	2. acks=1 default, wait for leader acknowledgement(partial dataLoss)    
	3. acks=all leader+replica acknowledgement(no dataLoss)  
	
2. Consumer API: to subscribe to one or more topics  
3. Streams API: 
allows an application to act as a stream processor, 
consuming an input stream from one or more topics and producing an output stream to one or more output topics, 
effectively transforming the input streams to output streams.
4. Connector API: allows building and running reusable producers or consumers that connect Kafka topics to existing applications or data systems. For example, a connector to a relational database might capture every change to a table.
5. Admin API: allows managing and inspecting topics, brokers and other Kafka objects. 

---

### Commands:

1. start zookeeper  
`zookeeper-server-start.bat config\zookeeper.properties`
2. start kafka server  
`kafka-server-start.bat config\server.properties`

3. create topics with 3 partition, 1 replication      
`kafka-topics --zookeeper 127.0.01:2181 --topic second_topic --create --partitions 3 --replication 1  `

4. list all topics     
`kafka-topics --zookeeper 127.0.0.1:2181 --list`  
5. detail info of given topic  
`kafka-topics --zookeeper 127.0.0.1:2181 --topic first_topic --describe`

6. create producer   
`kafka-console-producer --broker-list 127.0.0.1:9092 --topic first_topic`
 
#### Consumer
7. create consumer for topic, with default group name = console-consumer id      
`kafka-console-consumer --bootstrap-server 127.0.0.1:9092 --topic first_topic`
8. create consumer get all previous messages from beginning   
`kafka-console-consumer --bootstrap-server 127.0.0.1:9092 --topic first_topic --from-beginning`

9. consumers of same groupname will share messages from topic      
`kafka-console-consumer --bootstrap-server 127.0.0.1:9092 --topic first_topic --group my_first_app`

10. list all consumer groups  
`kafka-consumer-groups --bootstrap-server localhost:9092 --list`
11. describe lag, current offset, log end offset etc     
- `kafka-consumer-groups --bootstrap-server localhost:9092 --group my_first_app --describe`  
- `kafka-consumer-groups --bootstrap-server localhost:9092 --group mygroup --reset-offsets --topic first_topic  --to-earliest --execute `

	
## Spring Boot Kafka Consumer  
starter project - spring-web, spring-kafka  

1. **KafkaConsumerConfig.class**  (@EnableKakfa)
```java
@Configuration
@EnableKafka
public class KafkaConsumerConfig{
  @Bean
  public ConsumerFactory<String, String> consumerFactory(){
    Map<String, Object> configMap = new HashMap<>();
    configMap.put(ConsumerConfig.BOOTSTRAP_SERVERS_CONFIG, "localhost:9092");
    configMap.put(ConsumerConfig.GROUP_ID_CONFIG, "consumer-group");
    configMap.put(ConsumerConfig.KEY_DESERIALIZER_CLASS_CONFIG, StringDeserializer.class);
    configMap.put(ConsumerConfig.VALUE_DESERIALIZER_CLASS_CONFIG, StringDeserializer.class);
    return new DefaultKafkaConsumerFactory<>(configMap);	
  }
}
```
2. **KafkaConsumer.java**  (@KafkaListener)
```java
@Component
public class KafkaConsumer{
  @KafkaListener(topic="helloTopic", groupId="consumer-group")
  public void consumer(String message){
    System.out.println(message);
  }
}
```
## Spring Boot Kafka Producer  

1. HomeController.java
```java
@RestController
@RequestMapping("/produce/{message}")
public class HomeController{
  @Autowired
  private KafkaTemplate<String, String> kafkaTemplate;	
    @GetMapping
    public String publish(@PathVariable("message") String message){
      KafkaTemplate.send("helloTopic", message)
      return "Message published: "+ message;
    }
  }
```
2. KafkaConfig.java
```java
public class kafkaConfig{
  @Bean
  public kafkaTemplate<String, String> kafkaTemplate(){
    return new KafkaTemplate<>(producerFactory())	
  }
  @Bean
  public ProducerFactory<String, String> producerFactory(){
    Map<String, Object> configMap = new HashMap<>();
    configMap.put(ConsumerConfig.BOOTSTRAP_SERVERS_CONFIG, "localhost:9092");
    configMap.put(ConsumerConfig.GROUP_ID_CONFIG, "consumer-group");
    configMap.put(ConsumerConfig.KEY_DESERIALIZER_CLASS_CONFIG, StringDeserializer.class);
    configMap.put(ConsumerConfig.VALUE_DESERIALIZER_CLASS_CONFIG, StringDeserializer.class);
    return new DefaultKafkaProducerFactory(configMap);
  }
}
```

