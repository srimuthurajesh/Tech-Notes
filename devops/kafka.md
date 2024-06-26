## Apache Kafka  
-open-source stream-processing software platform  
-handles real-time data storage   

| Feature           | Kafka                                              | RabbitMQ                                          |
|---------------------------------|----------------------------------------------------|--------------------------------------------------|
| **Architecture**  | Distributed streaming platform, publish-subscribe  | Traditional message broker, broker-centric model |
| **Message Model** | Messages stored in topics, offset-based consumption| Messages sent to queues via exchanges, various routing mechanisms |
| **Performance**   | High throughput, suitable for real-time streaming  | Low-latency delivery, suitable for complex routing |
| **Persistence**   | Messages persisted to disk with configurable retention | Messages can be persisted, but focus on delivery |
| **Scalability**   | Easy horizontal scaling with partitions            | Scalable but more complex, involves clustering and federation |
| **Ordering**      | Strong ordering within partitions                  | Weaker ordering guarantees, especially in clusters |

### Components of kafka:  
1. **Brokers**(kafka servers): container that holds several topics, kafka cluster composed of brokers      
2. **Topic**: category/name for records published, similar to DB table    
3. **Producers**: Application that publish the kafka topics
4. **Consumers**: Applications that subscribe topics and consume messages. 
5. **Zookeeper**: Manages and coordinate kafka broker and maintain configuration infos and leader election.  
6. **Partition**: topic splits into several parts, ordered, immutable  
7. **Offset**: unique id for each record in partition  
8. **replication factor**: number of copies of data over multiple brokers  
9. **GroupId**: avoid multiple delivery, by giving same groupid for multiple same projects   
 



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

###Commands:

#start zookeeper
zookeeper-server-start.bat config\zookeeper.properties
#start kafka server
kafka-server-start.bat config\server.properties

#create topics with 3 partition, 1 replication    
kafka-topics --zookeeper 127.0.01:2181 --topic second_topic --create --partitions 3 --replication 1  
#list all topics   
kafka-topics --zookeeper 127.0.0.1:2181 --list  
#detail info of given topic  
kafka-topics --zookeeper 127.0.0.1:2181 --topic first_topic --describe   

#create producer 
kafka-console-producer --broker-list 127.0.0.1:9092 --topic first_topic
 
### Consumer
#create consumer for topic, with default group name = console-consumer <id>   
kafka-console-consumer --bootstrap-server 127.0.0.1:9092 --topic first_topic
#create consumer get all previous messages from beginning 
kafka-console-consumer --bootstrap-server 127.0.0.1:9092 --topic first_topic --from-beginning

#consumers of same groupname will share messages from topic    
kafka-console-consumer --bootstrap-server 127.0.0.1:9092 --topic first_topic --group my_first_app

#list all consumer groups
kafka-consumer-groups --bootstrap-server localhost:9092 --list
#describe lag, current offset, log end offset etc   
kafka-consumer-groups --bootstrap-server localhost:9092 --group my_first_app --describe
kafka-consumer-groups --bootstrap-server localhost:9092 --group mygroup --reset-offsets --topic first_topic  --to-earliest --execute 

	
## Spring Boot Kafka Consumer  
starter project - spring-web, spring-kafka  

1. **KafkaConsumerConfig.class**  (@EnableKakfa)
```
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
```
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
```
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
```
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
