## Apache Kafka  
-open-source stream-processing software platform  
-handles real-time data storage   

**Brokers**(kafka servers): container that holds several topics, kafka cluster composed of brokers      
**Topic**: category/name for records published, similar to DB tablr    
**Partition**: topic splits into several parts, ordered, immutable  
**Offset**: unique id for each record in partition  
**replication factor**: number of copies of data over multiple brokers  
**GroupId**: avoid multiple delivery, by giving same groupid for multiple same projects    



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

**KafkaConsumerConfig.class**
```
@Configuration
@EnableKafka
class KafkaConsumerConfig{
  @Bean
  public ConsumerFactory<String, String> consumerFactory(){
    Map<String, Object> configMap = new HashMap<>();
    configMap.put(ConsumerConfig.BOOTSTRAP_SERVERS_CONFIG, "localhost:8092");
    configMap.put(ConsumerConfig.GROUP_ID_CONFIG, "consumer-group");
    configMap.put(ConsumerConfig.KEY_DESERIALIZER_CLASS_CONFIG, StringDeserializer.class);
    configMap.put(ConsumerConfig.VALUE_DESERIALIZER_CLASS_CONFIG, StringDeserializer.class);
    return new DefaultKafkaConsumerFactory<>(configMap);	
  }

}
```
