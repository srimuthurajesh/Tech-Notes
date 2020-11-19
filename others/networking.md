### Networking – connecting devices

#### TYPE OF NETWORKS:
1. Local Arear Network (LAN) – connect short distances   
2. Wide Area Network(WAN) – connect large geographical area  
3. Metropolitan Area Network(MAN) – connect for town or city   
4. Storage Area Network (SAN) – share storage area to multiple devices  

NETWORKING DEVICES:
    1. Hub – connect computers as single lan network, 4,8,12,24,48 ports are availble
        1a. Passive hub: Forward signal to all ports except incoming port
        1b. Active hub: same like passive, improve quality by amplifying it (repeater)
    2. Bridge – seperating LAN to small segments 
    3. Modem – Analog to Digital and Digital to analog
    4. Switch – Not broadcast to all ports, it control of broadcasting
    5. Router – Layer 3 device. Based on routing table signals sents to devices

IP ADDRESS: - Internet protocol. To identify a device or server
    Two types of IP:
        a. Public IP
        b. Private IP
    Two portions:
        a. Network Portion
            b. Host Portion
Two version of IP:
    a. IPV4
        -made up of 32 bits
        -Broken into 4 octets  (1octet=8bit)
        -each octets ranges 0 to 255 in decimel or 00000000 to 11111111 in binary
        -eg.194.68.10.11
        -subnet is an logical subdivision of an IP network. 
        -subnet mask:     32bit number to identify network & host portion in IP
            it is made of putting network bit as 1 and host bit as 0    
            11111111.00000000.00000000.00000000 ==== 255.0.0.0
    Five classes in IPV4:
    --------------------------------------------------------------------------------------
    | Class | Public Network-Range        | Supports                    | subnet mask    |
    |-------|-----------------------------|-----------------------------|----------------|
    | A     | 1.0.0.1 - 126.255.255.255   | 16,777,214 host  126 n/w    | 255.0.0.0      | 
    | B     | 128.0.0.1 - 191.255.255.255 | 65,534 host  16,382 n/w     | 255.255.0.0    |
    | C     | 192.0.0.1 - 223.255.255.255 | 254 host  20,97,150 n/w     | 255.255.255.0  |
    | D     | 224.0.0.1 - 239.255.255.255 | Reserved for Multicasting                    |
    | E     | 240.0.0.1 - 254.255.255.254 | Reserved for Reasearch & Development         |
    --------------------------------------------------------------------------------------

    Private Ip Addressing(can use in local office)
    ---------------------------------------------------------------------------------------------------------
    | Class   | Private Network                   | Subnet mask         | Address range                     |
    |---------|-----------------------------------|---------------------|-----------------------------------|    
    | A       | 10.0.0.0 to 10.255.255.255        | 255.0.0.0           | 10.0.0.0 – 10.255.255.255         |
    | B       | 172.16.0.0 to 172.31.255.255      | 255.240.0.0         | 172.16.0.0 – 172.31.255.255       |
    | C       | 192.168.0.0 to 192.168.255.255    | 255.255.0.0         | 192.168.0.0 – 192.168.255.255     |
    ---------------------------------------------------------------------------------------------------------
    
    Reserved address:
    -----------------------------------------------------------------
    | 0.0.0.0             | Default route                           |
    | 127.0.0.0           | loopback address(testing)               |
    | 169.254.0.0         | apipa(automatic private ip address      |
    | 255.255.255.255     | broadcast address                       |
    -----------------------------------------------------------------
    Question: 85.100.200.178.  this type a because 85 is A
    How to find network id-  85.0.0.0
    How to find first host- 85.0.0.1
    How to find last host – 85.255.255.254
    How to find network id – 85.255.255.255


    IPV6    


    IP ROUTING: specifying the via route, how data gonna transfer.
    			directly connected two points, no need of routing.
    1. Static Routing    
    2. Dynamic Routing
            2.a. Interior Fateway Protocol (IGP)
                2.a.1. Link state Routing protocol eg.OSPF,ISIS
                2.a.2. Distance Vector Routing protocol eg.RIP,IGRP
                2.a.3. Hybrid Routing Protocol eg. EIGRP
            2.b, Exterior Gateway Protocol (BGP)    


    TOPLOGIES:
    ------------------------------------------------------------------------------
    | 1.Bus Topology  | utilise a common backbone                                |
    | 2.Ring Topology | Each device has 2 neighbour(circle)                      |    
    | 3.Star Topology | has a central hub                                        |
    | 4.Tree Topology | combination of bus and star topology                     |
    | 5.Mesh Topology | interconnected to all other devices(like star symbol)    |
    ------------------------------------------------------------------------------      

OSI Layers: Open systems Interconnect Model
    defined by ISO internation organisation  for standard 
    basic standard for all network devices

-----------------------------------------------------------------------------------------------------
|                 | Layer              | Description                                   | Data units |    
|-----------------|--------------------|-----------------------------------------------|------------|
| Lower layer     | Physical layer     | hardware                                      | Bits       |
|                 | Data link layer    | control physical layer, mac addressing(48bit) | Frames     |
|                 | Network layer      | ipv4,ipv6                                     | Packets    |
|                 | Transport layer    | tcp,udp                                       | Segments   |
|-----------------|--------------------|------------------------------------------------------------|
| Upper layer     | session layer      | session storage like PPTP,SIP,SAP,NetBIOS     | Data       |    
|                 | presentation layer | ascii SSL,TLS                                 |   "       	|
|                 | application layer  | http,smtp,ftp,DNS,TELNET,DNCP,SNMP            |   "        |    
-----------------------------------------------------------------------------------------------------

1.Lower layer:
    1.physical layer(hardware)
    2.data link layer(control physical layer, mac addressing)
    3.network layer(ipv4,ipv6,routers)
    4.transport layer(tcp,udp)
2.Upper layer
    1.sessions layer(session storage)
    2.presentation layer(ascii)
    3.application layer  (http,smtp,ftp)

PORTS:
1 to 65,535
0 to 1023 standard and predefined
1024 to 49151 registered and paid
49151 to 65,535 private port numbers

HTTP TCP port 80
SMTP TCP port 25 & POP TCP port 110
    

-----------------------------------------
| Protocol   | Port number | TCP or UDP | Info |
|------------|-------------|------------|-------|
| HTTP       | 80          | TCP        | send data in plain text|
| HTTPS      | 443         | TCP        | send data as encrypted |
| DNS        | 53          | UDP        |  |
| RDP        | 3389        |            | remote service |
| SSH        | 22          | TCP        | remote service encrypted |
| FTP        | 20,21       | TCP        | transfer files,20 for transfering data, 21 is for flow control |    
| TELNET     | 23          |            | virtual terminal, data trasnfer in plain text |
| SMTP       | 25          | TCP        | transmit email, cannot download email |
| IMAP4      | 143         | TCP        | can download email |
| POP3       | 110         | TCP        | an download email from email server |
| DHCP       | 67,68       |            | |
| TFTP       | 53          | UDP        | |
-------------------------------------------

LDAP - PORT 389	- Lightweight directory access protocol
NFS  - PORT 2049 - Network file system
MAC ADDRESS:
    Media Access Control- physical address identifies hardware interface
    48 bit Hexadecimal
    MM:MM:MM:SS:SS:SS    M-manufacturer id, series number of NIC(network interface card)


ADDRESS RESOLUTION PROTOCOL(ARP) - finding physical(mac) address using ip address
DYNAMIC HOST CONFIGURATION PROTOCOL(DHCP) -PORT 67(Server),68(Client) -  if a new device introduced in network, the server itself assign Network configurations like ip address,subnetmask,DNS IP, gatewaay informations. It uses DORA process.
DORA - Discover,Offer,Request,Acknowledgement



 



